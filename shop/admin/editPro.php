<?php 
require_once '../include.php';
checkLogined();
$rows=array("Cheese","Chocolate","Fondant","Terrorist","Fruit","Chestnut","Ice-cream");
$id=$_REQUEST['cake_id'];
$proInfo=getProById($id);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="./scripts/jquery-1.6.4.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
        $(document).ready(function(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$filename = $path.substring($path.lastIndexOf("\\")+1);
        		$attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="#" title="删除附件">删除</a></div></div>');
        		$attachItem.find(".left").html($filename);
        		$("#attachList").append($attachItem);		
        		});
        	});
        	$("#attachList>.attachItem").find('a').live('click',function(obj,i){
        		$(this).parents('.attachItem').prev('input').remove();
        		$(this).parents('.attachItem').remove();
        	});
        });
</script>
</head>
<body>
<h3>Edit</h3>
<form action="doAdminAction.php?act=editPro&cake_id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
<table width="70%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">蛋糕名称</td>
		<td><input type="text" name="Cname"  value="<?php echo $proInfo['Cname'];?>"/></td>
	</tr>
	<tr>
	   <td align="right">Name</td>
		<td><input type="text" name="Ename"  value="<?php echo $proInfo['Ename'];?>"/></td>
	</tr>
	<tr>
		<td align="right">蛋糕分类</td>
		<td>
		<select name="cate">
		
			<?php foreach($rows as $row):?>
				<option value="<?php echo $row;?>"><?php echo $row;?></option>
			<?php endforeach;?>
	
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">蛋糕 规格</td>
		
		<td><input type="text" name="Size1"  value="<?php echo $proInfo['Size1'];?>"/></td>
		<td><input type="text" name="Size2"  value="<?php echo $proInfo['Size2'];?>"/></td>
	</tr>
	<tr>
		<td align="right">蛋糕价格</td>
		<td><input type="text" name="Price1"  value="<?php echo $proInfo['Price1'];?>"/></td>
		<td><input type="text" name="Price2"  value="<?php echo $proInfo['Price2'];?>"/></td>
	</tr>
	<tr>
		<td align="right">蛋糕口味</td>
		<td><input type="text" name="Taste"  value="<?php echo $proInfo['Taste'];?>"/></td>
		
	</tr>
	<tr>
		<td align="right">甜度（1-5）</td>
		<td><input type="text" name="Sweety"  value="<?php echo $proInfo['Sweety'];?>"/></td>
		
	</tr>
	<tr>
		<td align="right">适合人群</td>
		<td><input type="text" name="People"  value="<?php echo $proInfo['People'];?>"/></td>
		
	</tr>
	<tr>
		<td align="right">适合氛围</td>
		<td><input type="text" name="Atmos"  value="<?php echo $proInfo['Atmos'];?>"/></td>
		
	</tr>
	<tr>
		<td align="right">蛋糕描述</td>
		<td>
			<textarea name="Description1" id="editor_id" style="width:100%;height:150px; value="<?php echo $proInfo['Description1'];?>"></textarea>
		</td>
		
	</tr>
	<tr>
	<td align="right">Description</td>
	<td>
			<textarea name="Description2" id="editor_id" style="width:100%;height:150px;value="<?php echo $proInfo['Description2'];?>"></textarea>
		</td>
		</tr>
	<tr>
		<td align="right">蛋糕图片</td>
		<td>
			<a href="javascript:void(0)" id="selectFileBtn">添加图片</a>
			<div id="attachList" class="clear"></div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑商品"/></td>
	</tr>
</table>
</form>
</body>
</html>