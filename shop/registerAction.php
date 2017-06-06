<?php
//require_once 'include.php';
include 'configs/conn.php';
require_once 'lib/string.func.php';
//session_start();
//require_once "configs/configs.php";
//$conn= mysqli_connect(DB_HOST,DB_USER,DB_PWD)or die("Failed to connect the database".mysqli_errno().":".mysqli_error());
//mysqli_select_db($conn,DB_DBNAME)or die("Failed to open the specified database");
error_reporting(E_ALL^E_NOTICE);
$user_name=$_POST[user_name];
$user_pass=$_POST[user_pass];
$user_pass2=$_POST[user_pass2];
$user_password=md5($user_pass);
$user_tele=$_POST[user_tele];
if($user_name=="")
{
    echo "<script>alert('请输入名称!');history.back();</script>";
    exit;
}
if($user_pass=="")
{
    echo "<script>alert('密码不能为空!');history.back();</script>";
    exit;
}
if($user_tele=="")
{
    echo "<script>alert('手机号码不能为空!');history.back();</script>";
    exit;
}
if(strlen(trim($user_tele))!=11)
{
    echo "<script>alert('手机号码不对!');history.back();</script>";
    exit;
}
if($user_pass!=$user_pass2)
{
    echo "<script>alert('密码与重复密码不同!');history.back();</script>";
    exit;
}
if(strlen($user_pass)<6||strlen($user_pass)>18)
{
    echo "<script>alert('密码长度只能6-18位!');history.back();</script>";
    exit;
}
if(!checkString($user_name)||!checkString($user_pass))
{
    exit;
}
if(!checkPhoneNumber($user_tele))
{
    echo "<script>alert('手机号码存在非数字!');history.back();</script>";
    exit;
}
$sql=mysqli_query($conn,"select * from my_user where user_name= '".$user_name."'");
$info=mysqli_fetch_array($sql);
if($info==true)
{
    echo "<script>alert('该用户名已经存在!');history.back();</script>";
    exit;
}
else {
    $sql="insert into my_user (user_name,user_telephone,user_password)values('{$user_name}','{$user_tele}','{$user_password}')";
    var_dump($sql);
   $res= mysqli_query($conn,"insert into my_user (user_name,user_telephone,user_password)values('{$user_name}','{$user_tele}','{$user_password}')");
    if($res){
    echo "<script>alert('恭喜，注册成功!');window.location='Pro/cakelist.php?cate=Fondant';</script>";}
    var_dump($res);
}
