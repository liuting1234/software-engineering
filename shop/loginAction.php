<?php
//require_once 'lib/mysql.func.php';
session_start();
include '/configs/conn.php';
error_reporting(E_ALL^E_NOTICE);
$user_name=$_POST[user_name];
$user_pass=$_POST[user_pass];
if($user_name=="")
{
    echo "<script>alert('请输入名称!');history.back();</script>";
    exit;
}
if($user_pass=="")
{
    echo "<script>alert('请输入密码!');history.back();</script>";
    exit;
}
$user_password=md5($user_pass);
$sql=mysqli_query($conn,"select * from my_user where user_name= '".$user_name."'");
$info=mysqli_fetch_array($sql);
if($info==false)
{
    echo "<script language ='javascript'>alert('不存在此用户！');history.back();</script>";
    exit;
}
else if($user_password==$info[user_password]){
    echo "<script language ='javascript'>alert('登录成功！');</script>";
    
    $_SESSION[user_name]=$info[user_name];
    header("location:Pro/cakelist.php?cate=Fondant");
    exit;
}
else{
    echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";
    exit;
}

?>