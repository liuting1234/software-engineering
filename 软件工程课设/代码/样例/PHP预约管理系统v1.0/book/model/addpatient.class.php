<?php
if(!defined('RAIN')) exit('Access Denied');

class addpatient
{
	function de(){
		@mysql::connect();
		$result = mysql_query("SELECT * FROM class");
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			foreach($row as $k=>$v){
				switch ($v){
					case 'source':
					$source[] = $row;
					break;
					case 'website':
					$website[] = $row;
					break;
					case 'illness':
					$illness[] = $row;
					break;
					case 'doctor':
					$doctor[] = $row;
					break;
				}
			}
		}
		@mysql::close();
		require VIEW_PATH.'addpatient.tpl.php';
	}
	
	function add(){
		$consult = RAIN_NAME;
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
		$arrive = '0000-00-00';
		$memo = getgpc('memo');
		$address = getgpc('address');
		$doctor = getgpc('doctor');		
		$addtime=date('Y-m-d H:i:s');
			
		@mysql::connect();
		$sql = "INSERT INTO patient (yyh,name,sex,age,contact,way,source,website,keyword,class,appdate,arrive,memo,doctor,consult,addtime,address) VALUE 
		('$yyh','$name','$sex','$age','$contact','$way','$source','$website','$keyword','$class','$appdate','$arrive','$memo','$doctor','$consult','$addtime','$address')";		
		if(mysql_query($sql)){
			$result = mysql_query("SELECT max(id) FROM patient");
			if($result){
				$result = mysql_fetch_array($result);
				$id=$result[0];
			}
			echo '<span style="font-size:20px;">预约成功！预约号为：<font color="red">'.$yyh.'</font></span><a href="index.php?m=addpatient" target ="mainFrame">返回</a>';
		}else{
			echo "预约失败~！系统错误";
		}
		@mysql::close();				
	}
}
?>