<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cake4 蛋糕预订-网上预订</title>
<meta name="keywords" content="Cake">
<meta name="description" content="Cake4蛋糕订购网主营慕斯，提拉米苏，芝士，翻糖等美味蛋糕；广州市内免费配送，订购热线：18826076155">
<link rel="shortcut icon" href="/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="styles/css.css">
<script type="text/javascript" src="styles/jQuery.js"></script>
<script type="text/javascript" src="styles/left_menu.js"></script>
<!-- 图片延迟加载开始 -->
<script type="text/javascript" src="styles/jquery.lazyload.js"></script>
<script type="text/javascript">
$(function()){
	$(".lazy").attr('src','images/lazy.gif');
	$("img.lazy").lazyload();
}
</script>
<!-- 图片延迟加载结束 -->


</head>

<body>
<div id="header">
    <div class="box">
         <div class="header-left">Cake4蛋糕配送<a href="javascript:;" onclick="AddFavorite(window.location,document.title)"
         class="collect">收藏本站</a></div>
         <div class="header-right">
         欢迎您来到cake4蛋糕预定网&nbsp;&nbsp;
				  <a href=""><b>登录</b></a>
				│ <a href=""><b>注册</b></a>
         </div>
    </div>
</div>
<div class="box" id="top">
     <div id="logo"><a href="/"><img src="images/fantang2.jpg" alt="Cake4蛋糕店"></a></div>
     <div class="search">
     <form name="so" id="so" method="get" action="">
     <input type="text" name="kw" id="kw" class="search-input" value="味多美" onfocus="if(this.value=='味多美') this.value=''" onblur="if(this.value=='') this.value='味多美'">
			  <input type="submit"  id="button" value="" class="search-submit">
     </form>
     </div>
</div>
</body>
</html>
