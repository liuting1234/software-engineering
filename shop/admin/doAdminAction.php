<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../include.php';
$act = $_REQUEST['act'];
$id = $_REQUEST['admin_id'];
$cake_id= $_REQUEST['cake_id'];
$cake_id1= $_REQUEST['cake_id1'];
$cake_id2=$_REQUEST['cake_id2'];
if($act == "logout"){
    logout();
}elseif($act =="addAdmin"){
   $mes=addAdmin();
}elseif($act =="editAdmin"){
    $mes=editAdmin($id);
}elseif($act =="delAdmin"){
    $mes=delAdmin($id);
}elseif($act=="addPro"){
	$mes=addPro();
}elseif($act=="delPro"){
    $mes=delPro($cake_id);
}elseif($act=="editPro"){
    $mes=editPro($cake_id);
}elseif($act=="addToCart"){
    $mes=addToCart($cake_id);
}elseif($act=="delCartPro"){
    $mes=delCartPro($cake_id2);
}elseif($act=="delAllPro"){
    $mes=delALLPro();
}elseif($act=="addOrder"){
    //$mes=addOrder();
  addOrder();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php
if($mes){
    echo $mes;
}
?>
</body>
</html>