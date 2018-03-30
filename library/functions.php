<?php
function mkdirs($dir, $mode = 0777){
  if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
  if (!mkdirs(dirname($dir), $mode)) return FALSE;
  return @mkdir($dir, $mode);
}

function devices_type(){
	$agent=strtolower($_SERVER['HTTP_USER_AGENT']);
	if($agent=='Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)' || $agent='Apache-HttpClient/UNAVAILABLE (java 1.4)' || $agent='Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0'){
		$pc='pc';
	}elseif(strpos($agent,'iphone') || strpos($agent,'ipad')){
		$type='ios';
	}elseif(strpos($agent, 'android')){
		$type='android';
	}else{
    $type='unknown';
  }
}

function get_client_ip(){
  if(isset($_SERVER)){
    if(isset($_SERVER['HTTP_X_REAL_IP'])){
      $realip = $_SERVER['HTTP_X_REAL_IP'];
    }elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $realip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }elseif(isset($_SERVER['HTTP_CLIENT_IP'])) {
      $realip = $_SERVER['HTTP_CLIENT_IP'];
    }else{
      $realip = $_SERVER['REMOTE_ADDR'];
    }
  }else{
    //不允许就使用getenv获取
    if(getenv("HTTP_X_FORWARDED_FOR")){
      $realip = getenv( "HTTP_X_FORWARDED_FOR");
    }elseif(getenv("HTTP_CLIENT_IP")) {
      $realip = getenv("HTTP_CLIENT_IP");
    }else{
      $realip = getenv("REMOTE_ADDR");
    }
  }

  return $realip;
}
