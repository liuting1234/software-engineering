<?php
require_once 'include.php';
$act=$_REQUEST['act'];
if($act=="reg"){
    
}elseif($act=="login"){
    $mes=login();
}