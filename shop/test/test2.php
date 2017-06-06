<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>加入购物车JS弹窗</title>  
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>  
</head>  
<body style="height:1500px;">  
<style type="text/css">  
*{margin:0px; padding:0px;}  
body{margin:0px; padding:0px; font-size:12px; font-family:'Microsoft Yahei';}  
a{ text-decoration:none;}  
.carbtn{float:left;padding:0 20px; height:35px; background:#096; color:#FFF; font-size:14px; text-align:center; line-height:35px; margin-top:10px; border-radius:3px;}  
.carbtn:hover{color:#FFF;}  
.carbtn.bg{ background:#F63; margin-left:10px;}  
  
.mask{background:#000; opacity:0.2; position:absolute; left:0px; top:0px; z-index:1000; width:100%; height:100%; display:none; }  
.alertBox{width:404px; height:170px; position:fixed; background:#FFF;z-index:1001; left:50%; margin-left:-202px; top:0px; display:none;opacity:0; }  
.alertBox .altit{height:35px; line-height:35px; background:#08a9d8;}  
.alertBox .altit h2{float:left; padding-left:12px; font-size:14px; color:#FFF;}  
.alertBox .altext{padding:20px; line-height:22px; font-size:14px;}  
.alertBox .altext b{ font-size:18px; color:#e00471}  
.alertBox .albtn{ text-align:center; width:100%;}  
.alertBox .albtn a{ float:none; display:inline-block; margin:0 10px;}  
.alertBox .albtn a.bg{ background:#e00471;}  
</style>  
  
  
<script type="text/javascript">  
  
function tips(num,price){  
    var html = '<div class="mask"></div><div class="alertBox"><div class="altit"><h2>成功加入购物车</h2></div><div class="altext">您的购物车共有'+num +'个商品,合计:<b>￥'+price+'元</b></div><div class="albtn"><a href="" class="carbtn">继续购物</a><a href="" class="carbtn bg">去购物车结算</a></div></div>';    
      $(document.body).append(html);  
}  
  
function showBox(){   
    var W = document.body.scrollWidth;  //获取浏览器包括滚动条宽度  
    var H = document.body.scrollHeight; //获取浏览器包括滚动条高度  
    var vH = $(window).height(); //获得可视区域高度   
    var boxW = $(".alertBox").width();  //获取弹出窗口宽度  
    var boxH = $(".alertBox").height(); //获取弹出窗口高度    
    var boxLeft = (W-boxW)/2;     
    var boxTop = (vH-boxH)/2;     
    $(".mask").height(H);  
    $(".mask").width(W);      
    $(".mask").fadeIn(200);   
    $(".alertBox").show();    
    $(".alertBox").stop().animate({left:boxLeft+20,top:boxTop,opacity:1},10000);  
}  
  
function alertbox(){  
    tips(1,10);  
    showBox();  
}  
</script>   
  
<a href="javascript:void(0)" class="carbtn" onclick="alertbox()">加入购物车</a>  
</body>  
</html>  