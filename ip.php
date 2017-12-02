<?php
if(!isset($_GET['ip']))die('bad Request');

function curl($url,$data=null){
    $curl=curl_init();
    curl_setopt($curl,CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, Array('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.110 Safari/537.36','Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8','Referer: http://www.ipip.net/'));
    if($data){
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        curl_setopt($curl,CURLOPT_POST,1);
    }
    $result=curl_exec($curl);
    curl_close($curl);
    return $result;
}

$data=json_decode(curl_get('https://ip.nowtool.cn/api.php?do=ipbach&ip='.$_GET['ip']));

if($data['code']=='200'){
  echo $data['data']['location'];
}elseif($data['data']['code']=='404'){
  echo 'IP 地址为空或IP地址不合法';
}else{
  echo '服务器与 ip.NowTool.cn 通信失败，请稍后再试！';
}
