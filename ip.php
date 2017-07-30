<?php
function curl($url,$data=null){
    $curl=curl_init();
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
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
function getSubstr($str, $leftStr, $rightStr)
{
    $left = strpos($str, $leftStr);
    $right = strpos($str, $rightStr,$left);
    if($left < 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}

$data = curl('http://www.ipip.net/ip.html','ip='.$_GET['ip']);
$ip = getSubstr($data,'<span id="myself">','</span>');

echo $ip;
