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
		$( "#datepick" ).datepicker();
	});
$(document).ready(function(){
	if($('input:radio[id="way"]:checked').val() == 2){
		$("#media").show();		
	}
	$("input:radio").click(function(){
		var a = $('input:radio[id="way"]:checked').val();
		if(a == 2){
			$("#media").show();			
		}else{
			$("#media").hide();
		}
	})
	var right = '50'
	if( <?=RAIN_U_RIGHT?> < right){
		$("input").attr("disabled","disabled");
		//$("textarea").attr("disabled","disabled");
		$("select").attr("disabled","disabled");
		$("#submit").attr("disabled",false);
	}
});	
</script> 
</head>

<body>
<div class="title"><span>编辑预约信息</span><a href="javascript:history.go(-1);">返回</a></div>
<div class="addpatient">
    <form class="add" action="/?m=editpatient&a=save&id=<?=$id?>" method="post">
    <div class="add-lan"><span>姓名</span><input type="text" name="name" value="<?=$name?>"/></div>
    <div class="add-lan"><span>预约号</span><input type="text" name="yyh" value="<?=$yyh?>"/></div>
    <div class="add-lan"><span>性别</span>
        <input id="sex" type="radio" name="sex" value="1" <?php if($sex==1)echo 'checked="checked"'; ?> /><font>女士</font>
        <input id="sex" type="radio" name="sex" value="2" <?php if($sex==2)echo 'checked="checked"'; ?>/><font>男士</font></div>
    <div class="add-lan"><span>年龄</span><input type="text" name="age" value="<?=$age?>"/></div>
    <div class="add-lan"><span>联系电话</span><input type="text" name="contact" value="<?=$contact?>"/></div>
    <div class="add-lan"><span>预约方式</span>
        <input id="way" type="radio" name="way" value="1" <?php if($way==1)echo 'checked="checked"'; ?>  /><font>电话</font>
        <input id="way" type="radio" name="way" value="2" <?php if($way==2)echo 'checked="checked"'; ?> /><font>网络</font></div>
    <div id="media" class="add-lan">
        <span>媒体来源</span><select name="source"><?php if(isset($source2) and is_array($source2)){ foreach($source2 as $k=>$v) {?><option value="<?=$v['title']?>" <?php if($v['title'] == $source)echo 'selected="selected"'; ?>><?=$v['title']?></option><?php } } ?></select>
        <span>网站</span><select name="website"><?php if(isset($website2) and is_array($website2)){ foreach($website2 as $k=>$v) {?><option value="<?=$v['title']?>" <?php if($v['title'] == $website)echo 'selected="selected"'; ?>><?=$v['title']?></option><?php } } ?></select>
        <span>关键词</span><input type="text" name="keyword" value="<?=$keyword?>" />
    </div>
    <div class="add-lan"><span>病种分类</span><select name="class"><?php if(isset($illness2) and is_array($illness2)){ foreach($illness2 as $k=>$v) {?><option value="<?=$v['title']?>" <?php if($v['title'] == $class)echo 'selected="selected"'; ?>><?=$v['title']?></option><?php } } ?></select></div>
    <div class="add-lan"><span>预约时间</span><input id="datepicker" type="text" name="appdate" value="<?php if($appdate==''){echo '待定';}else{echo $appdate;}?>" /></div>
    <div class="add-lan"><span>到院时间</span><input id="datepick" type="text" name="arrive" value="<?php if($arrive=='0000-00-00'){echo '待定';}else{echo $arrive;}?>" /></div>
    <div class="add-lan"><span>备注</span><textarea name="memo"><?=$memo?></textarea></div>
    <div class="add-lan"><span>患者地址</span><textarea name="address"><?=$address?></textarea></div>
    <div class="add-lan"><span>预约医生</span>
        <select name="doctor">
        <option value="" <?php if($v['title'] == '')echo 'selected="selected"';?>>无</option>
	    <?php if(isset($doctor2) and is_array($doctor2)){ foreach($doctor2 as $k=>$v) {?>
        <option value="<?=$v['title']?>" <?php if($v['title'] == $doctor)echo 'selected="selected"'; ?>><?=$v['title']?></option><?php } } ?>
        </select>
    </div>
    <div class="add-lan"><input id="submit" type="submit" value="保存" />
	<?php 
	if(RAIN_U_RIGHT==100){
		echo '<a id="submit" href="index.php?m=editpatient&a=del&id='.$id.'">删除</a>';
	}else if($arrive == '' and RAIN_U_RIGHT==10){
		echo '<a id="submit" href="index.php?m=editpatient&a=arrive&id='.$id.'">到院</a> ';
	}else if($arrive == '0000-00-00' and RAIN_U_RIGHT==50){
		echo '<a id="submit" href="index.php?m=editpatient&a=arrive&id='.$id.'">到院</a> ';
	}
	?>
    </div>
    </form>
</div>
</body>
</html>
