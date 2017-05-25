<?php
if(!defined('RAIN')) exit('Access Denied');

class editpatient
{
	
	function de(){
		@mysql::connect();
		$id = getgpc('id');
		$result = mysql_query("SELECT * FROM patient WHERE id = '$id'");
		while($row = mysql_fetch_array($result)){
			$id=$row['id'];
			$yyh=$row['yyh'];
			$name=$row['name'];
			$sex=$row['sex'];
			$age=$row['age'];
			$contact=$row['contact'];
			$way=$row['way'];
			$source=$row['source'];
			$website=$row['website'];
			$keyword=$row['keyword'];
			$class=$row['class'];
			$appdate=$row['appdate'];
			$doctor=$row['doctor'];
			$memo=$row['memo'];
			$address=$row['address'];
			$arrive=$row['arrive'];
		}
		$result2 = mysql_query("SELECT * FROM class");
		while($row2 = mysql_fetch_array($result2,MYSQL_ASSOC)){
			foreach($row2 as $k=>$v){
				switch ($v){
					case 'source':
					$source2[] = $row2;
					break;
					case 'website':
					$website2[] = $row2;
					break;
					case 'illness':
					$illness2[] = $row2;
					break;
					case 'doctor':
					$doctor2[] = $row2;
					break;
				}
			}
		}
		@mysql::close();
		require VIEW_PATH.'editpatient.tpl.php';		
	}
	
	function arrive(){
		@mysql::connect();
		$id = getgpc('id');
		$arrive_time=date('Y-m-j');;
		$sql = "UPDATE patient SET arrive = '$arrive_time',status = '1' WHERE id='$id'";
		if(mysql_query($sql)){
			echo '<span style="font-size:20px;">操作成功！</span><a href="javascript:history.go(-2);"  target ="mainFrame">返回</a>';
		}else{
			echo "操作失败~！系统错误";
		}
		@mysql::close();
	}
	
	function save(){
		$id = getgpc('id');
		$yyh = getgpc('yyh');
		$name = getgpc('name');
		$sex = getgpc('sex');
		$age = getgpc('age');
		$contact = getgpc('contact');
		$way = getgpc('way');
		if($way == '1'){
			$source = '';
			$website = '';
			$keyword = '';
		}else{
			$source = getgpc('source');
		    $website = getgpc('website');
		    $keyword = getgpc('keyword');
		}
		$class = getgpc('class');
		$appdate = getgpc('appdate');
		$memo = getgpc('memo');
		$address = getgpc('address');
		$arrive = getgpc('arrive');
		$doctor = getgpc('doctor');
		@mysql::connect();
		$sql = "UPDATE patient SET  yyh='$yyh',name='$name',sex='$sex',age='$age',contact='$contact',way='$way',source='$source',website='$website',keyword='$keyword',class='$class',appdate='$appdate',memo='$memo',address='$address',arrive='$arrive',doctor='$doctor' WHERE id='$id'";
		if(mysql_query($sql)){
			echo '<span style="font-size:20px;">修改成功！</span><a href="javascript:history.go(-2);"  target ="mainFrame">返回</a>';
		}else{
			echo "修改失败~！系统错误";
		}
	}
	
	function del(){
		@mysql::connect();
		$id = getgpc('id');
		$sql = "DELETE FROM patient WHERE id = '$id'";
		if(mysql_query($sql)){
			echo '<span style="font-size:20px;">删除成功！</span><a href="index.php?m=patient" target ="mainFrame">返回</a>';
		}else{
			echo "修改失败~！系统错误";
		}
		@mysql::connect();
	}
}
?>