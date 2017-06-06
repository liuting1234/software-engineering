<?php 
require_once '../include.php';

$arr=Array("","mei",1,"11",123,"","weifahouo");
$sql="insert into my_order(user_name,cake_id,size,quantity,price,address,delivered)values('mei',2,'11',2,123,' ','weifahouo')";
$res=mysqli_query(connect(),$sql);
if(!$res){
    echo "Failed";
}else{
    echo "sss";
}


?>