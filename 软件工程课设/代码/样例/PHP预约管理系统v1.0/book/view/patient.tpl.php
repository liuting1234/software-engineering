<? if(!defined('RAIN') || !defined('RAIN_USER')) header("Location:index.php?m=user");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>patient</title>
<link href="<?=API_VIEW?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?=API_VIEW?>css/ui/base/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<link href="<?=API_VIEW?>css/ui/demos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=API_VIEW?>js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="<?=API_VIEW?>js/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?=API_VIEW?>js/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="<?=API_VIEW?>js/ui/jquery.ui.widget.js"></script>
<script>
	$(function() {
		$( "#datepicker1" ).datepicker();
	});
		$(function() {
		$( "#datepicker2" ).datepicker();
	});
		$(function() {
		$( "#datepicker3" ).datepicker();
	});
		$(function() {
		$( "#datepicker4" ).datepicker();
	});
$(document).ready(function(){
	$("input:radio").click(function(){
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
	})
});		
</script>
</head>

<body>
<div class="title"><span>预约人员报表</span><a href="javascript:history.go(-1);">返回</a></div>
<div class="patient">
<input type="button"class="rt-bar" value="条件搜索">
<form class="rt-s" action="index.php?m=patient" method="post">
    <div class="rt-s-b"><span>预约方式</span><select name="way"><option value="">不限</option><option value="1">电话</option><option value="2">网络</option></select></div>
    <div class="rt-s-b"><span>媒体来源</span>    
    <select name="source">
        <option value="">不限</option>
		<?php if(isset($source2) and is_array($source2)){ foreach($source2 as $k=>$v) {?><option value="<?=$v['title']?>"><?=$v['title']?></option><?php } } ?>
    </select>
    </div>
    <div class="rt-s-b">
    <span>网站</span>    
    <select name="website">
        <option value="">不限</option>
		<?php if(isset($website2) and is_array($website2)){ foreach($website2 as $k=>$v) {?><option value="<?=$v['title']?>"><?=$v['title']?></option><?php } } ?>
    </select>
    </div>
    <div class="rt-s-b">
    <span>病种分类</span>
    <select name="class">
        <option value="">不限</option>    
		<?php if(isset($illness2) and is_array($illness2)){ foreach($illness2 as $k=>$v) {?><option value="<?=$v['title']?>"><?=$v['title']?></option><?php } } ?>
    </select>
    </div>
    <div class="rt-s-b">
    <span>预约医生</span>
    <select name="doctor">
        <option value="">不限</option>
		<?php if(isset($doctor2) and is_array($doctor2)){ foreach($doctor2 as $k=>$v) {?><option value="<?=$v['title']?>"><?=$v['title']?></option><?php } } ?>
    </select>
    </div>
    <div class="rt-s-b">
        <span>预约时间</span><input id="datepicker1" type="text" name="appdate1" /><font>到</font><input id="datepicker2" type="text" name="appdate2" />
    </div>
    <div class="rt-s-b" style="width:100%;">
        <span>到院情况：</span><input id="status" type="radio" name="status" checked="checked" value="" /><font>不限</font>
        <input id="status" type="radio" name="status" value="0" /><font>未到</font><input id="status" type="radio" name="status" value="1" /><font>到院</font>
        <div id="arrive"><span>到院时间</span><input id="datepicker3" type="text" name="arrive1" /><font>到</font><input id="datepicker4" type="text" name="arrive2" /></div>
    </div>
    <div class="rt-s-b">    
    <span>咨询员</span>
    <select name="consult">
        <option value="">不限</option>
		<?php if(isset($name5) and is_array($name5)){ foreach($name5 as $k=>$v) {?><option value="<?=$name5[$k]?>"><?=$name5[$k]?></option><?php } } ?>
    </select>
    </div>
    <input id="rt-s-submit" type="submit" value="搜索" />
</form>

<table class="rt" width="100%" border="0" align="center" cellspacing="1" cellpadding="0">
  <tr>
    <th><a href="?m=patient&select=<?=$this->select?>&order=id&des=<?php if($this->des=='desc'){echo 'asc';}else{echo 'desc';}?>">预约号码<?php if($this->order=='id'){if($this->des=='desc'){echo '↓';}else{echo '↑';}}?></a></th>
    <th>姓名</th>
    <th>性别</th>
    <th><a href="?m=patient&select=<?=$this->select?>&order=age&des=<?php if($this->des=='desc'){echo 'asc';}else{echo 'desc';}?>">年龄<?php if($this->order=='age'){if($this->des=='desc' && $this->order=='age'){echo '↓';}else{echo '↑';}}?></a></th>
    <th>电话</th>
    <th>预约方式</th>
    <th>媒体来源</th>
    <th>网站</th>
    <th>关键词</th>
    <th>病种分类</th>
    <th>预约时间</th>
    <th>预约医生</th>
    <th>备注</th>
    <th><a href="?m=patient&select=<?=$this->select?>&order=arrive&des=<?php if($this->des=='desc'){echo 'asc';}else{echo 'desc';}?>">到院时间<?php if($this->order=='arrive'){if($this->des=='desc' && $this->order=='arrive'){echo '↓';}else{echo '↑';}}?></a></th>
    <th><a href="?m=patient&select=<?=$this->select?>&order=consult&des=<?php if($this->des=='desc'){echo 'asc';}else{echo 'desc';}?>">咨询员<?php if($this->order=='consult'){if($this->des=='desc' && $this->order=='consult'){echo '↓';}else{echo '↑';}}?></a></th>
    <th>登记时间</th>
    <th>患者地址</th>
    <th width="50px">操作</th>
  </tr>
   <?php if(isset($id) and is_array($id)){ foreach($id as $k=>$v) {?> 
  <tr align="center" id="tr">
    <td><?=$yyh[$k]?></td>
    <td><?=$name[$k]?></td>
    <td><?php if($sex[$k]==1){echo '女';}else{echo '男';}?></td>
    <td><?=$age[$k]?></td>
    <td><?=$contact[$k]?></td>
    <?php if($way[$k]==1){echo '<td>电话</td>';}else{echo '<td style="background:#9CF;">网络</td>';}?>
    <td><?=$source[$k]?></td>
    <td><?=$website[$k]?></td>
    <td><?=$keyword[$k]?></td>
    <td><?=$class[$k]?></td>
    <td><?php if($appdate[$k]==''){echo '待定';}else{echo $appdate[$k];}?></td>
    <td><?=$doctor[$k]?></td>
    <td><?=$memo[$k]?></td>
    <?php if($arrive[$k]=='0000-00-00'){echo '<td>未到</td>';}else{echo '<td style="background:#1DA848;color:#FFF">'.$arrive[$k].'</td>';}?>
    <td><?=$consult[$k]?></td>
    <td><?=$addtime[$k]?></td>
    <td><?=$address[$k]?></td>
    <td><a href="index.php?m=editpatient&id=<?=$id[$k]?>">编辑</a></td>
  </tr>
   <?php } } ?>
</table>
<div class="page">
    <div class="pagebox">
	    <?php show_page($this->total,$this->page,$this->select,$this->order,$this->des);?><span class="pagecount"><?php echo '共'.$this->total.'页|';?><?php echo $this->countnum.'条数据';?></span>
    </div>
</div>
<div class="exportdata">
    <a href="index.php?m=patient&a=export&select=<?=$this->select?>">导出当前数据</a>
</div>

</div>
</body>
</html>
