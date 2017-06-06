<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../include.php';
$id=$_REQUEST['cake_id'];
//$id=1;
$sql="SELECT * from cake_info where cake_id={$id}";
$rows=fetchOne($sql);
if(!$rows){
    echo"error";
}

$proImgs=getProImgsById($id);
if(!($proImgs &&is_array($proImgs))){
    alertMes("商品图片错误","cakelist.php");
}

$str1=$rows['Description1'];
$str1=strip_tags($str1);

$str2=$rows['Description2'];
$str2=strip_tags($str2);

$star=array("../images/star.png","../images/star2.png","../images/star3.png");
$sql1="SELECT * from cake_info";
$totalNum = getResultNum($sql1);
$arr = randNum(1,$totalNum,4);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=1010, initial-scale=0.75"/>
<link href="../styles/css1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/jquery1.js"></script>
<script type="text/javascript" src="../scripts/global.js"></script>
<script type="text/javascript" src="../scripts/buy.js"></script>
<script type="text/javascript" src="../scripts/productlist.js"></script>
<link href="../styles/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/slider.js"></script>
<script type="text/javascript" src="../scripts/mycat.js"></script>
<link href="../styles/test.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/test.js"></script>
<meta name="keywords" /><meta name="description" /></head>
</head>
<body>
<script type="text/javascript">
    $(function () {
        $('.menu dd[rev=goods]').addClass('active');
    });
</script>

<div class="dangao_show_k1">
<div class="dangao_show_k1_left">
<div class="dangao_show_tt"><?php echo $rows['Cname'];?><span><?php echo $rows['Ename']?></span></div>
<div class="dangao_show_cl"><?php echo $rows['Details']?></div>
</div>

</div>
<div class="dangao_show_img">
<div class="daogan_show_img_left">
<div class="daogan_show_img_left_k1">
<div class="weiyun" style="overflow:hidden;">
<div id="_banners" class="banners">

<div class="banner"><img width="700" height="428" src="../image_800/<?php echo $proImgs[0]['albumPath'];?>" /></div>

</div>
<div id="_focus" class="focus">

<a data-index="0" href="javascript:void(0);"><span class="bg-b"></span><span class="inner"></span></a>

</div>
<script type="text/javascript">
                    $('#_focus a:first').addClass('on');
                    var player1 = new glume('_banners', '_focus');
 </script>

</div>
<script type="text/javascript">
$('#_focus a:first').addClass('on');
var player1 = new glume('_banners', '_focus');
</script>
</div>
<div class="daogan_show_img_left_k2">
<div class="daogan_show-img_left_k2k">
<strong>口味：</strong><br /><?php echo $rows['Taste']?>
</div>
<div class="daogan_show-img_left_k2k">
<strong>甜度：</strong><br /><img src="<?php echo $star[$rows['Sweety']-1]?>">
</div>
<div class="daogan_show-img_left_k2k">
<strong>适合人群：</strong><br /><?php echo $rows['People']?>
</div>
<div class="daogan_show-img_left_k2k">
<strong>适合氛围：</strong><br /><?php echo $rows['Atmos']?>
</div>
</div>
<div class="daogan_show_img_left_kk">
<div class="daogan_show_img_left_kkleft"><img id="imgSmallPhoto2" src="../image_220/<?php echo $proImgs[1]['albumPath'];?>" style="height:92px;width:109px;border-width:0px;" /></div>
<div class="daogan_show_img_left_kkright">
<div class="daogan_show_img_left_k3"><?php echo $str1?>
<br /></div>
<div class="daogan_show_img_left_k4"><?php echo $str2?></div>
</div>
</div>
 
<br style="clear: both;" />
</div>
<div class="daogan_show_img_right">
<div class="daogan_show_img_right_k1">
<img id="imgSmallPhoto1" src="../image_220/<?php echo $proImgs[1]['albumPath']?>" style="height:240px;width:280px;border-width:0px;" />
<div class="daogan_show_right_bang">
<dl class="cake-spec-list" style="padding-top:0px;" id="cake1019">
<br style="clear: both;" />
<dd rev="1"><a href="javascript:void(0);"><label><?php echo $rows['Size1']?></label><span>【￥<?php echo $rows['Price1']?>】</span></a></dd><dd rev="2"><a href="javascript:void(0);"><label><?php echo $rows['Size2']?></label><span>【￥<?php echo $rows['Price2']?>】</span></a></dd></dl>
<br style="clear: both;" />
<br style="clear: both;" />
<div class="jiarucart"><!-- a href="javascript:void(0)" onclick="alertbox()"--><a href="../admin/doAdminAction.php?act=addToCart&cake_id=<?php echo $rows['cake_id'];?>"><img src="../images/jrcart.jpg" style="border-style:None;border-width:0px;" /></a></div>
</div>
</div>
<div class="clear"></div>
<!-- a href="../admin/doAdminAction.php?act=addToCart&&cake_id1=<!--?php echo $rows['cake_id'];?>" -->
<p><strong>温馨提示：</strong><br />
<ol style="margin-left:-13px;">
 
<li>蛋糕属于易碎品需您平稳提拿，避免晃动。 </li>
<li>提拿蛋糕盒时请勿提环形拉绳，否则容易造成蛋糕脱绳侧翻。</li>
<li>蛋糕在收到后2-3小时内食用最佳，避免长时间搁置造成产品变质。</li>
</ol>
<div class="daogan_show_img_right_k2">
<strong>食用与储存：</strong><br />
<img src="../images/21.jpg" width="280" height="71" align="right" /><br />
</div>
<br style="clear: both;" />
</div>
</div>

<br style="clear: both;" />
 <br style="clear: both;" />
<div class="dangao_show_line"></div>
    <div class="you_like">You may like/您可能会喜欢：<br/></div>
     <br/>
<dl class="product-list">
           <?php foreach ($arr as $values):
             
             $sql2 = "SELECT * from cake_info where cake_id = {$values}";
             $rows1=fetchOne($sql2);
            
             $proImg = getProImgById($values);
             if(!$rows1){
                 continue;
             }
           ?>
                <dd>
                    <div class="cover"><img src="../image_220/<?php echo $proImg['albumPath']?>" class="img" /></div>
                    <div class="infor">
                        <a href="showPro.php?cake_id=<?php echo $rows1['cake_id']?>" target="_blank" class="pt222_tt"><?php echo $rows1['Cname']?><span></span></a>
                        <a href="showPro.php?cake_id=<?php echo $rows1['cake_id']?>" target="_blank" class="pt222_ms"><?php echo $rows1['Details']?></a>
                        <div class="pt222_bang_k">
                            <div class="bang"><input name="spec1138" type="radio" class="bang_k" value="1" /><?php echo substr($rows1['Size1'],0,3)?>磅/<?php echo $rows1['Price1']?>元 </div><div class="bang"><input name="spec1138" type="radio" class="bang_k" value="2" /><?php echo substr($rows1['Size2'],0,3)?>磅/<?php echo $rows1['Price2']?>元 </div>
                        <div class="pt222_line"></div>
                        <div class="pt222_xiang"><a href="showPro.php?cake_id=<?php echo $rows1['cake_id']?>" target="_blank" class="xiang">详情&gt;&gt;</a><a href="javascript:void(0);" class="buy action-buy" rev="1138">立即购买</a></div>
                    </div>
                    </div>
                </dd>
            <?php endforeach;?>
            </dl>
               

</body>

</html>
