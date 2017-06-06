<?php
include '../configs/conn.php';
require_once '../include.php';
//$search_str=$_POST["search_str"];
$search_str=$_POST["search_str"];

if ($search_str=="")
{
    echo "<script>history.back();</script>";
    exit;
}
if(strlen($search_str)>0)
{
    $term=trim("select * from cake_info where concat(Cname,Ename,Details,Taste,Atmos,Description1,Description2) like '%").trim($search_str).trim("%' order by cake_id desc");
    $sql=mysqli_query($conn,trim($term));
    while (@$row=mysqli_fetch_array($sql))
    {
        $info[]=$row;
    }
}
if($info=="")
{
    echo "<script>alert('本站暂无类似产品!');history.go(-1);</script>";
    //$response="no product";
}
?>
<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">

		<title>Cake Lists</title>

		<meta name="description" content="A three dimensional and space efficient menu created with JavaScript and CSS 3.">
		<meta name="author" content="Hakim El Hattab">

		<meta name="viewport" content="width=800, user-scalable=no">
        
		<link rel="stylesheet" href="../styles/list_demo.css">
        	  
        <!--header-->
    	<link rel="stylesheet" href="../styles/header_style.css"> <!-- Gem style -->
        
        <!--end-->
        
        <!--seaching-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
     
        <!--end-->
        <link href="../styles/css1.css" rel="stylesheet" type="text/css" />
        <link href="../styles/slideshow.css" rel="stylesheet" />
        <script type="text/javascript" src="../scripts/jquery1.js"></script>
        <script type="text/javascript" src="../scripts/global.js"></script>
    	<script type="text/javascript" src="../scripts/buy.js"></script>
    	
        <!--悬浮框-->
        <link rel="stylesheet" type="text/css" href="../styles/component.css" />
    	<link rel="stylesheet" type="text/css" href="../styles/content.css" />
    	<script src="../scripts/modernizr.custom.js"></script>
    	
	</head>

	<body>

		<div class="meny">
			<h2>ITEM LISTS</h2>
			<ul>
				<li><a href="cakelist.php?cate=Fondant" target="_parent">Fondant Cakes</a></li>
				<li><a href="cakelist.php?cate=Cheese">Cheese Cakes</a></li>
				<li><a href="cakelist.php?cate=Chocolate">Chocolate Cakes</a></li>
				<li><a href="cakelist.php?cate=Ice-cream">Ice-cream Cakes</a></li>
				<li><a href="cakelist.php?cate=Fruit">Fruit Cakes</a></li>
				<li><a href="cakelist.php?cate=Chestnut">Chestnut Cakes</a></li>
				<li><a href="cakelist.php?cate=Terrorist">Terrorist Cakes</a></li>

			</ul>
		</div>
                
		<div class="meny-arrow"></div>
        <div class="contents">
                
                <!--header-->
        <header>
                <div></div>
        		<div id="cd-cart-trigger"><a class="cd-img-replace" href="cart2.php">Cart</a></div>
        </header>
        <nav id="main-nav">
        <ul>
        <li><div class="search d5">
        <form name="search_form" method="post" action="searchCake.php">
          <input type="text" name="search_str" placeholder="Search...">
          <!-- <button type="submit"></button> -->
          <!-- <p>返回值: <span id="txtHint"></span></p> -->
        </form>
        </div>
        
        </li>
        <?php 
        if($_SESSION[user_name]!=""){
            echo "<li><a id='user_info' href='my_order.php' style='dispaly:all'>欢迎您! $_SESSION[user_name]</a></li>";
            echo "<li><a id='logout_href' href='../logout.php' style='display: all'>Logout</a></li>";
        }
        ?>
        <?php 
        if($_SESSION[user_name]==""){
            echo "<li><a id='login_href' href='../login.php' style='display: all'>Login</a></li>";
            echo "<li><a id='register_href' href='../register.php' style='display: all'>Register</a></li>";
        }   
        ?>
        
        </ul>
        </nav>
        <!--end-->
        <script type="text/javascript">
        $(function () {
        $('.cake-class dd[rev=20]').addClass('active');
        });
        </script>
        <!--放置商品图片和信息-->
           <div class="list-container">
             
            <!--item1-->
            <?php foreach($info as $row): 
              $proImg = getProImgById($row['cake_id']);
            ?>
              
              <div class="dangao_list_k">
              <div class="dangao_list_k1">
                    <div class="dangao_list_img"><a href="showPro.php?cake_id=<?php echo $row['cake_id']?>" target="_blank"><img src="../image_220/<?php echo $proImg['albumPath']?>" width="207" height="180" border="0" title="<?php echo $row['Cname']?>/<?php echo $row['Ename']?>" /></a></div>
                    <div class="dangao_list_neirong">
                        <a href="showPro.php?cake_id=<?php echo $row['cake_id']?>" target="_blank" class="dangao_list_tt"><?php echo $row['Cname']?> <span><?php echo $row['Ename']?></span></a>
                        <span class="dangao_list_ms"><?php echo $row['Details']?></span>
                        <span class="dangao_list_shm"><?php echo $row['Description2']?></span>
                    </div>
                    <dl class="cake-spec-list" id="<?php echo $row['cake_id']?>">
                    
                        <dd rev="1"><a href="javascript:void(0);"><label><?php echo $row['Size1']?></label><span>【￥<?php echo $row['Price1']?>】</span></a></dd><dd rev="2"> <a href="javascript:void(0);"><label><?php echo $row['Size2']?></label><span>【￥<?php echo $row['Price2']?>】</span></a></dd></dl>
                    <div class="clear"></div>
                </div>
                
            </div>
           
              <?php endforeach;?>
    
              </div>
              </div>
</body>
<!--background-->
		<script src="../scripts/meny.js"></script>
		<script>
			// Create an instance of Meny
			var meny = Meny.create({
				// The element that will be animated in from off screen
				menuElement: document.querySelector( '.meny' ),

				// The contents that gets pushed aside while Meny is active
				contentsElement: document.querySelector( '.contents' ),

				// [optional] The alignment of the menu (top/right/bottom/left)
				position: Meny.getQuery().p || 'left',

				// [optional] The height of the menu (when using top/bottom position)
				height: 200,

				// [optional] The width of the menu (when using left/right position)
				width: 260,

				// [optional] Distance from mouse (in pixels) when menu should open
				threshold: 40,

				// [optional] Use mouse movement to automatically open/close
				mouse: true,

				// [optional] Use touch swipe events to open/close
				touch: true
			});

			// Embed an iframe if a URL is passed in
			if( Meny.getQuery().u && Meny.getQuery().u.match( /^http/gi ) ) {
				var contents = document.querySelector( '.contents' );
				contents.style.padding = '0px';
				contents.innerHTML = '<div class="cover"></div><iframe src="'+ Meny.getQuery().u +'" style="width: 100%; height: 100%; border: 0; position: absolute;"></iframe>';
			}
		</script>
<!--background-->



	</body>
</html>
