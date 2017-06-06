function tips(){  
    var html = '<div class="mask"></div><div class="alertBox"><div class="altit"><h2>成功加入购物车</h2></div><div class="albtn"><br/><br/><a href="../Pro/cakelist.php?cate=Chocolate" class="carbtn">继续购物</a><a href="../Pro/cart1.php" class="carbtn bg">去购物车结算</a></div></div>';    
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
    $(".alertBox").stop().animate({left:boxLeft+20,top:boxTop,opacity:1},2000);  
}  
  
function alertbox(){  
    tips();  
    showBox();  
}  
