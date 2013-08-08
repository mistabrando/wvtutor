<?php
session_start();
//grab token
$token = $_GET['access_token'];
$url = "https://graph.facebook.com/me?access_token=".$token;
if(file_get_contents($url))
{
    $user = json_decode(file_get_contents($url),true);
}
else
{
    header("Location: fail.php");
}

if(isset($user['error']))
{
    header("Location: fail.php");
}

$size = sizeof($user['education']) - 1;
$temp1 = $user['education'];
$temp2 = $temp1[$size];
$school = $temp2['school'];
$schoolname = $school['name'];
if(isset($schoolname))
{
    $_SESSION['user'] = $user;
    header("Location: chat.php");
}
else
{
    header("Location: fail.php");
}
?>
