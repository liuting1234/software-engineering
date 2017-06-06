<?php
error_reporting(E_ALL ^ E_NOTICE);
/*check whether admin exists*/
require_once '../include.php';
function checkAdmin($sql){
    return fetchOne($sql);
}

/*检查是否有管理员登录*/
function checkLogined(){
    if($_SESSION['admin_id']=="" && $_COOKIE['admin_id']){
        alertMes("没有登录，请先登录", "login.php");
    }
}

//注销管理员
function logout(){
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    session_destroy();
    header("location:login.php");
}

//添加管理员
function addAdmin(){
    $arr = $_POST;

    if(!insert("admin",$arr)){
        $mes ="添加成功！<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
        
    }else{
        $mes="添加失败！<br/><a href='addAdmin.php'>重新添加</a>";
    }
    return $mes;
}

function getAllAdmin(){
    $sql = "SELECT admin_id,admin_name,Email from admin";
    $rows = fetchAll($sql);
    return $rows;
}


function editAdmin($id){
    $arr=$_POST;
  /*  if($arr['admin_username']==null||$arr['password']==null){
        $mes="用户名或密码不能为空<br/><a href='editAdmin.php'>请重新修改</a>";
    }*/
    if(update("admin",$arr,"admin_id={$id}")){
        $mes="编辑成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
        
    }else{
        $mes="编辑失败！<br/><a href='listAdmin.php'>请重新修改</a>";
    }
    
    return $mes;
}


function delAdmin($id){
    if(del("admin","admin_id='{$id}'")){
        $mes="删除成功！<br/><a href='listAdmin.php'> 查看管理员列表</a>";
    }else{
        $mes="删除失败！<br/><a href='listAdmin.php'>请重新操作</a>";
    }
    return $mes;
}