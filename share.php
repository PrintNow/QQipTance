<?php
date_default_timezone_set('Asia/Shanghai');
include_once(dirname(__FILE__)."/library/functions.php");

$token=isset($_GET['token'])?$_GET['token']:false;
$image_url=isset($_GET['image_url'])?base64_decode($_GET['image_url']):false;
$share_user_ip=isset($_GET['share_user_ip'])?$_GET['share_user_ip']:false;
$share_time=isset($_GET['share_time'])?$_GET['share_time']:false;
$share_type=isset($_GET['share_type'])?$_GET['share_type']:false;

if($token && $image_url && $share_user_ip && $share_time && $share_type){
	$ip = get_client_ip();
	$ua = isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:NULL;

	//创建缓存目录
	mkdirs(dirname(__FILE__).'/cache/data/'.date('Y/m/d',$share_time));
	mkdirs(dirname(__FILE__).'/cache/ip/'.date('Y/m/d',$share_time));

	$cache_data_path = dirname(__FILE__).'/cache/data/'.date('Y/m/d',$share_time).'/'.$token.'.json';
	$cache_ip_path = dirname(__FILE__).'/cache/ip/'.date('Y/m/d',$share_time).'/'.$token.'.ip';

	/********************************************/
	if($ua=='Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)' || $ua=='Apache-HttpClient/UNAVAILABLE (java 1.4)' || $ua=='Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0'){
		$data['ua_type']='PC';
	}elseif(preg_match('/Darwin/',$ua)){
		$data['ua_type']='iOS';
	}elseif(preg_match('/Dalvik\//',$ua)){
		$data['ua_type']='Android';
	}elseif($ua=='Mozilla/5.0 (iPhone; CPU iPhone OS 8_4 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12H143 Safari/600.1.4'){
		$data['ua_type']='iOS';
	}else{
		$data['ua_type']='Unknown';
	}
	$data['ip']=$ip;
	$data['ua']=$ua;
	$data['get_time']=time(true);
	/********************************************/

	if(file_exists($cache_data_path) && file_exists($cache_ip_path)){
		if(in_array($ip,explode("\n",file_get_contents($cache_ip_path)))){
			////存在该IP，不重复记录数据，直接跳转
		}else{
			file_put_contents($cache_ip_path,"\n".$ip,FILE_APPEND);
			$original=file_get_contents($cache_data_path);
			$de_file=json_decode($original,true);
			if(count($de_file)>='1'){
				$one=str_replace(']','',$original);
				file_put_contents($json_path,$one.','.json_encode($data).']');
			}else{
				file_put_contents($json_path,'['.json_encode($data).']');
			}
		}
	}else{
		file_put_contents($cache_ip_path,$ip);
		file_put_contents($cache_data_path,'['.json_encode($data).']');
	}
	//header("Location: {$image_url}");
}else{
	echo "500";
}
