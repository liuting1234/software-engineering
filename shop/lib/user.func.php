<?php
require_once 'common.func.php';
error_reporting(E_ALL^E_NOTICE);

//检查用户是否处于登录状态
function checkUserLogined(){
    if ($_SESSION[user_name]==""){
        alertMes("没有登录，请先登录！", "./login.php");
    }
}

//用户登出
function userLogout(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    session_destroy();
    alertMes("成功退出", "../Pro/cakelist.php?cate=Fondant");
    //header("location:../Pro/cakelist.php");
}

//修改手机号


//修改密码


//修改用户名