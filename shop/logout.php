<?php
require_once 'lib/common.func.php';
session_start();
session_destroy();
//alertMes("成功退出", "Pro/cakelist.php?cate=Fondant");
//header("location:Pro/cakelist.php?cate=Fondant");
echo "<script>alert('成功退出!');window.location='Pro/cakelist.php?cate=Cheese';</script>";