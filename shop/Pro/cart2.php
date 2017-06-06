<?php 
require_once '../include.php';
session_start();

if($_SESSION['user_name']==""){
    $mes=alertMes("请先登录", "../login.php");
}
$user_name=$_SESSION['user_name'];
$sql="select * from cake_info join cart on cart.user_name='{$user_name}' and cart.cake_id = cake_info.cake_id";
$rows=fetchAll($sql);

if(!$rows){
   $mes=alertMes("您还没有购买任何商品，请去购买！", "cakelist.php?cate=Cheese");
    
    exit;
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的购物车</title>
    <link rel="stylesheet" href="../styles/style1.css"/>
    <link rel="stylesheet" href="../styles/header_style.css"/>
    <script type="text/javascript" src="../scripts/demo.js"></script>
</head>

<body>
<header>
		<div id="cd-cart-trigger"><a class="cd-img-replace" href="cart2.php">Cart</a></div>
</header>
<div class="list-container">
<table id="cartTable">
    <thead>
        <tr>
            <th><label><input class="check-all check" type="checkbox"/>&nbsp;全选</label></th>
            <th>商品</th>
            <th>单价</th>
            <th>数量</th>
            <th>小计</th>
            <th>操作</th>
        </tr>
    </thead>
   
     <tbody id="cakes">
     <?php foreach ($rows as $row):
    $id=$row['cake_id'];
    $proImgs=getProImgById($id);
    $price=$row['Price1'];
    
    ?>
        <tr cakeId="<?php echo $id;?>">
            <td class="checkbox"><input class="check-one check" type="checkbox"/></td>
            <td class="goods"><img src="../image_220/<?php echo $proImgs['albumPath'];?>" alt=""/><span><?php echo $row['Cname']?><br/><?php echo $row['Size1'];?></span></td>
            <td class="price"><?php echo $row['Price1'];?></td>
            <td class="count"><span class="reduce"></span><input class="count-input" type="text" value="1"/><span class="add">+</span></td>
            <td class="subtotal"><?php echo $row['Price1'];?></td>
            <td class="operation"><a href="../admin/doAdminAction.php?act=delCartPro&cake_id2=<?php echo $row['cake_id'];?>">删除</a></td>
        </tr>
   
     <?php endforeach;?>
    </tbody>
</table>
</div>
<div class="foot" id="foot">
    <label class="fl select-all"><input type="checkbox" class="check-all check"/>&nbsp;全选</label>
    <a href="../admin/doAdminAction.php?act=delAllPro" class="fl delete" id="deleteAll">删除</a>
     <div class="fr closing" onclick="buy()">结算</div>
    <div class="fr closing"><a href="cakelist.php?cate=Chocolate">继续购物</a></div>
    <div class="fr total">合计：￥<span id="priceTotal">0.00</span></div>
    <div class="fr selected" id="selected">已选商品<span id="selectedTotal">0</span>件<span class="arrow up">︽</span><span class="arrow down">︾</span></div>
    <div class="selected-view">
        <div id="selectedViewList" class="clearfix">
            <div><img src="images/1.jpg"><span>取消选择</span></div>
        </div>
        <span class="arrow">◆<span>◆</span></span>
    </div>
</div>


</body>
</html>