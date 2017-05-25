<?php
if(!defined('RAIN')) exit('Access Denied');

class referpatient
{
  
	
	function de(){
		require VIEW_PATH.'referpatient.tpl.php';		
	}
	
	function search(){
		@mysql::connect();
		$words = getgpc('words');
		if(empty($words)){
			die('查询的条件不能为空！');
		}
		$result = mysql_query("SELECT * FROM patient WHERE yyh = '$words' or name LIKE '%$words%' or contact LIKE '%$words%' ORDER BY ID DESC");
		while($row = mysql_fetch_array($result)){
			$id[]=$row['id'];
			$yyh[]=$row['yyh'];
			$name[]=$row['name'];
			$sex[]=$row['sex'];
			$age[]=$row['age'];
			$contact[]=$row['contact'];
			$way[]=$row['way'];
			$class[]=$row['class'];
			$appdate[]=$row['appdate'];
			$doctor[]=$row['doctor'];
			$memo[]=$row['memo'];
			$arrive[]=$row['arrive'];
			$consult[]=$row['consult'];
		}
		@mysql::close();
		require VIEW_PATH.'search.tpl.php';		
	}
	
}
?>