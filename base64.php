<?php 
session_start();
$userinfo = array(
    'uid'  => 10000,
    'name' => 'spark',
    'email' => 'spark@imooc.com',
    'sex'  => 'man',
    'age'  => '18'
);
header("content-type:text/html; charset=utf-8");

$_SESSION['uid'] = $userinfo['uid'];
$_SESSION['name'] = $userinfo['name'];
$_SESSION['userinfo'] = $userinfo;
//* 将用户数据保存到cookie中的一个简单方法 */
$secureKey = 'ysh'; //加密密钥
$str = serialize($userinfo); //将用户信息序列化
//用户信息加密前
$str = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($secureKey), $str, MCRYPT_MODE_ECB));
//用户信息加密后
//将加密后的用户数据存储到cookie中
setcookie('userinfo', $str);
print_r($str);
echo '***************************';
//当需要使用时进行解密
$str = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($secureKey), base64_decode($str), MCRYPT_MODE_ECB);
$uinfo = unserialize($str);
echo "解密后的用户信息：<br>";
print_r($uinfo);

/*CdmfrXfKgtM9MlvrOqFHqdb39xq0PRL9TLHDZUQF/sVaaCuUn39zE2IO8YonCYSmMZYG53xmf+A0we1gpiY1qt49m1LjBx96o3Ft7brC2NjquE57gNFPR5VwVCMXQ34Dvxy4SQ/TdBqr/fmJhefAAkkeKJlge9h8kb1mowu+4q4=***************************解密后的用户信息：
Array ( [uid] => 10000 [name] => spark [email] => spark@imooc.com [sex] => man [age] => 18 )
*/




 ?>