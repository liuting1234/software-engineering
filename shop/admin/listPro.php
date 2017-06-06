<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once '../include.php';
checkLogined();
$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by p.".$order:null;
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where p.Cname like '%{$keywords}%'":null;
//得到数据库中所有商品
$sql="select * from cake_info as p {$where}";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from cake_info as p {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);

if(!$rows){
 $keywords=null;
 alertMes("没有对应蛋糕", "listPro.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
<link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<div id="showDetail"  style="display:none;">

</div>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
                        </div>
                     <div class="fr">
                     <div class="text">
                                <span>搜索</span>
                                <input type="text" value="" class="search"  id="search" onkeypress="search()" >
                            </div>
                            
                        
                    </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">商品编号</th>
                                <th width="40%">商品名称</th>
                                <th width="10%">商品分类</th>
                             
                              
             
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                       <?php 
              
                       foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="<?php echo $row['cake_id'];?>" class="check" value=<?php echo $row['cake_id'];?>><label for="c1" class="label"><?php echo $row['cake_id'];?></label></td>
                                <td><?php echo $row['Cname']; ?><?php echo $row['Ename'];?></td>
                                <td><?php echo $row['cate'];?></td>
                              
                                <td align="center">
                                				<input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['cake_id'];?>,'<?php echo $row['Cname'];?>')"><input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['cake_id'];?>)"><input type="button" value="删除" class="btn"onclick="delPro(<?php echo $row['cake_id'];?>)">
					                            <div id="showDetail<?php echo $row['cake_id'];?>" style="display:none;">
					                        	<table class="table" cellspacing="0" cellpadding="0">
					                        		<tr>
					                        			<td width="20%" align="right">蛋糕名称</td>
					                        			<td><?php echo $row['Cname'];?>&nbsp;&nbsp;<?php echo $row['Ename'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">蛋糕类别</td>
					                        			<td><?php echo $row['cate'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">蛋糕材料</td>
					                        			<td><?php echo $row['Details'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">蛋糕规格/价格</td>
					                        			<td><?php echo $row['Size1'];?>/【￥<?php echo $row['Price1'];?>】 &nbsp;&nbsp;<?php echo $row['Size2'];?>/【￥<?php echo $row['Price2'];?>】</td>
					                        			
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">蛋糕口味</td>
					                        			<td><?php echo $row['Taste'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">蛋糕甜度（1-5）</td>
					                        			<td><?php echo $row['Sweety'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">适合人群</td>
					                        			<td><?php echo $row['People'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">氛围</td>
					                        			<td><?php echo $row['Atmos'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">蛋糕图片</td>
					                        			<td>
					                        			<?php 
					                        			$proImgs=getAllImgByProId($row['cake_id']);
					                        			foreach($proImgs as $img):
					                        			?>
					                        			<img width="100" height="100" src="../uploads/<?php echo $img['albumPath'];?>" alt=""/> &nbsp;&nbsp;
					                        			<?php endforeach;?>
					                        			</td>
					                        		</tr>
					                        		<tr>
					                        		<td width="20%"  align="right">蛋糕描述</td>
					                        		<td><?php echo $row['Description1'];?></td>
					                        	           
					                       
					                        		</tr>
					                        		<tr>
					                        		<td width="20%"  align="right">Description</td>
					                        		<td><?php echo $row['Description2'];?></td>
					                        	           
					                       
					                        		</tr>
					                        	</table>
					                        	
					                        </div>
                                
                                </td>
                            </tr>
                           <?php  endforeach;?>
                           <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="7"><?php echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}");?></td>
                            </tr>
                            <?php endif;?>
                      
                        </tbody>
                    </table>
                </div>
<script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"商品名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	function addPro(){
		window.location='addPro.php';
	}
	function editPro(id){
		window.location='editPro.php?cake_id='+id;
	}
	function delPro(id){
		if(window.confirm("确定要删除？")){
			window.location="doAdminAction.php?act=delPro&cake_id="+id;
		}
	}
	function search(){
		if(event.keyCode==13){
			var val=document.getElementById("search").value;
			window.location="listPro.php?keywords="+val;
		}
	}
	function change(val){
		window.location="listPro.php?order="+val;
	}
</script>
</body>
</html>