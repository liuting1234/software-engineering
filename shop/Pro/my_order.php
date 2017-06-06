<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once '../include.php';
	
$user_id=5;
//$user_id = $_REQUEST['user_id'];
		    
$result="SELECT * FROM my_order join cake_info join my_user on my_order.cake_id=cake_info.cake_id and my_user.user_id=my_order.user_id  WHERE my_order.user_id = '{$user_id}'";
	
$rows=fetchAll($result);
if(!rows)
{
   
    exit;
}



?>

<!DOCTYPE html>
<html lang="zh" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" type="text/css" href="../styles/order_demo.css" />
		<link rel="stylesheet" type="text/css" href="../styles/order_component.css"/>
        
		<script src="../scripts/order_modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<div id="splitlayout" class="splitlayout">
				
				<div class="page page-right">
					<div class="page-inner">
						<section>
							
							
                            <div class="list-container">
                           
							<?php foreach($rows as $row): 
                               $proImg = getProImgById($row['cake_id']);
                            ?>
        
                            <div class="item_container">
                             <a href="showPro.php?cake_id=<?php echo $row['cake_id']?>" target="_blank"><img style="width:230px;height:200px;float:left;" src="../image_220/<?php echo $proImg['albumPath']?>" width="207" height="180" border="0" /></a><hr>
                           
                             <p style="font-size:20px;color:#000;font-style:italic;"><?php echo $row['Cname']?> </p>
		                     
                             <p style="font-size:16px;color:#000;font-style:inherit;"><?php echo $row['Details']?></p>
                           
                             <p style="font-size:18px;color:#000;font-style:inherit;">cake size :<?php echo $row['cake_size'] ?></p>
     </div>
     
                             <?php endforeach;?>
						</section>
					</div><!-- /page-inner -->
				</div><!-- /page-right -->

<div class="intro">
					<div class="side side-left">
						<header class="codropsheader clearfix">
							<h1><a class="current" href="cakelist.php?cate=Fondant">Back</a></h1>
                            
							<div class="demos">
								
								
							</div>
						</header>
						<div class="intro-content">
							<h2 ><span><?php echo $row['user_name']?><br>
                            <?php echo $row['user_telephone']?>
							</span></h2>
						</div>
						<div class="overlay"></div>
					</div>
                    
					<div class="side side-right">
						<div class="intro-content">
							<div class="profile"><img src="../images/back1.png" alt="profile2"></div>
							<h2><span>My Order </span></h2>
						</div>
						<div class="overlay"></div>
					</div>
				</div><!-- /intro -->
				<a href="#" class="back back-right" title="back to intro">&rarr;</a>
				<a href="#" class="back back-left" title="back to intro">&larr;</a>
			</div><!-- /splitlayout -->
		</div><!-- /container -->
		<script src="../scripts/order_classie.js"></script>
		<script src="../scripts/order_cbpSplitLayout.js"></script>
	</body>
</html>
