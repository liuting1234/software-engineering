<?php 
function alertMes($mes,$url){
	echo "<script>alert('{$mes}');</script>";
	echo "<script>window.location='{$url}';</script>";
}
function randNum($begin,$end,$limit){
    $number=range($begin,$end);
    shuffle($number); //调用现有的数组随机排列函数
    return array_slice($number, 0,$limit);
    
}
