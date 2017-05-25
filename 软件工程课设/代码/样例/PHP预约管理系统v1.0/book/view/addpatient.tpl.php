<? if(!defined('RAIN') || !defined('RAIN_USER')) header("Location:index.php?m=user");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>addpatient</title>
<link href="<?=API_VIEW?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?=API_VIEW?>css/ui/base/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<link href="<?=API_VIEW?>css/ui/demos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=API_VIEW?>js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="<?=API_VIEW?>js/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?=API_VIEW?>js/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="<?=API_VIEW?>js/ui/jquery.ui.widget.js"></script>
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
$(document).ready(function(){
	$("input:radio").click(function(){
		var a = $('input:radio[id="way"]:checked').val();
		if(a == 2){
			$("#media").show();			
		}else{
			$("#media").hide();
		}
	})
});	
</script> 
</head>

<body>
<div class="title"><span>添加预约信息</span><a href="javascript:history.go(-1);">返回</a></div>
<div class="addpatient">
    <form class="add" action="/?m=addpatient&a=add" method="post">   
    <div class="add-lan"><span>姓名</span><input type="text" name="name" /></div>
    <div class="add-lan"><span>预约号</span><input type="text" name="yyh" /></div>
    <div class="add-lan">
        <span>性别</span><input id="sex" type="radio" name="sex" value="1" checked="checked" /><font>女士</font><input id="sex" type="radio" name="sex" value="2" /><font>男士</font>    </div>
    <div class="add-lan"><span>年龄</span><input type="text" name="age" /></div>
    <div class="add-lan"><span>联系电话</span><input type="text" name="contact" /></div>
    <div class="add-lan">
        <span>预约方式</span>
        <input id="way" class="radio"  type="radio" name="way" value="1" checked="checked" /><font>电话</font><input id="way" type="radio" name="way" value="2" /><font>网络</font>
    </div>
    <div id="media" class="add-lan">
        <span>媒体来源</span>
        <select name="source">
		    <?php if(isset($source) and is_array($source)){ foreach($source as $k=>$v) {?><option value="<?=$v['title']?>"><?=$v['title']?></option><?php } } ?>
        </select>
        <span>网站</span>
        <select name="website">
		    <?php if(isset($website) and is_array($website)){ foreach($website as $k=>$v) {?><option value="<?=$v['title']?>"><?=$v['title']?></option><?php } } ?>
        </select>
        <span>关键词</span>
        <input type="text" name="keyword" />
    </div>
    <div class="add-lan">
        <span>病种分类</span>
        <select name="class">
		    <?php if(isset($illness) and is_array($illness)){ foreach($illness as $k=>$v) {?><option value="<?=$v['title']?>"><?=$v['title']?></option><?php } } ?>
        </select>
    </div>   
    <div class="add-lan"><span>预约时间</span><input id="datepicker" type="text" name="appdate" /></div>
    <div class="add-lan"><span>备注</span><textarea name="memo"></textarea></div> 
    <div class="add-lan"><span>患者地址</span><textarea name="address"></textarea></div>
    <div class="add-lan">
        <span>预约医生</span>
        <select name="doctor">
            <option value="">无</option>
		    <?php if(isset($doctor) and is_array($doctor)){ foreach($doctor as $k=>$v) {?><option value="<?=$v['title']?>"><?=$v['title']?></option><?php } } ?>
        </select>
    </div>            
    <div class="add-lan"><input id="submit" type="submit" value="提交" /></div>
    </form>
</div>
</body>
</html>
