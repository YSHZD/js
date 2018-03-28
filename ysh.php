<?php
header('Content-type: text/html; charset=utf-8');
echo time();
//<!--JS 页面自动刷新 -->
echo ("<script type=\"text/javascript\">");
echo ("function fresh_page()");    
echo ("{");
echo ("window.location.reload();");
echo ("}"); 
echo ("setTimeout('fresh_page()',1000);");      
echo ("</script>");
//生成随机的IP
$ip = rand(101, 255).'.' . rand(1, 255).'.' . rand(1, 255).'.' . rand(1, 255);
//定义模拟IP
echo "<br>".$ip;
$CIp = 'CLIENT-IP:'.$ip;
$XIp = 'X-FORWARDED-FOR:'.$ip;
//设置刷票目标地址和网站referer地址
$url = 'http://wt.centv.cn/index.php?m=content&c=like_dislike&a=news_like&id=16802&modelid=1';
$referer = 'http://wt.centv.cn/index.php?m=content&c=index&a=show&catid=685&id=16802';
//使用curl提交
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array($xforwarded, $CIp));  //伪造提交请求IP地址
curl_setopt($ch, CURLOPT_REFERER, $referer); //伪造刷票来源
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$result = curl_exec($ch);
curl_close($ch);
var_dump($result) ;
?>