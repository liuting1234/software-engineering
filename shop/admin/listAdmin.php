<?php 
require_once '../include.php';
$sql = "SELECT admin_id,admin_name,Email from admin";
$rows = fetchAll($sql);
if(!$rows){
    alertMes("No administrator,please add admin.", "addAdmin.php");
    exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>管理员列表</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
   <div class="details_operation clearfix">
      <div class = "bui_select">
         <input type="button" value="添&nbsp;&nbsp;加" class = "add" onclick ="addAdmin()">
         
      </div>
   </div>
  
  <!-- table --> 
  <table class="table" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
    <th width="15%"> 编号</th>
    <th width="25%"> 管理员名称</th>
    <th width="30%"> 管理员邮箱</th>
    <th> 操作</th>
    </tr>
    </thead>
    <tbody>
                          <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['admin_id'];?></label></td>
                                <td><?php echo $row['admin_name'];?></td>
                                <td><?php echo $row['Email'];?></td>
                                <td align="center"><input type="button" value="修改" class="btn" onclick="editAdmin(<?php echo $row['admin_id'];?>)"><input type="button" value="删除" class="btn"  onclick="delAdmin(<?php echo $row['admin_id'];?>)"></td>
                            </tr>
                            <?php endforeach;?>
</tbody>
</table>
</div>
</body>
<script type="text/javascript">
function addAdmin(){
	window.location="addAdmin.php";
}
function editAdmin(id){
	window.location="editAdmin.php?act=editAdmin&id="+id;
}
function delAdmin(id){
	if(window.confirm("确定删除？")){
		window.location="doAdminAction.php?act=delAdmin&admin_id="+id;
}
}
</script>
</html>