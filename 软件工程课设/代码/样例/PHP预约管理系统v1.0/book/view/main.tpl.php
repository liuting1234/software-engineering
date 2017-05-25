<? if(!defined('RAIN') || !defined('RAIN_USER')) header("Location:index.php?m=user");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=API_VIEW?>css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=API_VIEW?>js/jquery-1.6.1.min.js"></script>
<title>main</title>
<script>
$(document).ready(function(){
	function loadingdraw(){
		$.ajax({
		    type: "POST",
		    dataType: "html",
		    url: "index.php",
		    data: "m=main&a=draw",
		    timeout:10000,
		    cache: false,
		    success: function(data){
			    $(".draw").html(data);
		    }
	    });
	};
    //loadingdraw();
		
	/*$("input:radio").click(function(){
		var a = $('input:radio[id="status"]:checked').val();
		if(a == 1){
			$("#arrive").show();
			$( "#datepicker3" ).attr("value","");
			$( "#datepicker4" ).attr("value","");	
		}else{
			$("#arrive").hide();
		}
	});
	
	$(".rt-bar").click(function(){		
		$(".rt-s").slideToggle();
	})*/
});	
</script>
</head>

<body>
<div class="main">
<div class="title"><span>系统首页</span></div>
<img src="index.php?m=main&a=draw&way=2" /><img src="index.php?m=main&a=draw&way=2&pie=1" /><img src="index.php?m=main&a=draw&way=1" />
</div>
</body>
</html>
