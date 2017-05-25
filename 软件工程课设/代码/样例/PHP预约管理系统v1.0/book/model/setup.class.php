<?php
if(!defined('RAIN')) exit('Access Denied');

class setup
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
				
		$result5 = mysql_query("SELECT * FROM user");
		while($row5 = mysql_fetch_array($result5)){
			$id5[]=$row5['id'];
			$name5[]=$row5['name'];
			$user5[]=$row5['user'];
			$u_right5[]=$row5['u_right'];
		}
		function show_right($u_right){
			switch ($u_right){
				case "100":
				echo "管理员";
				break;
				case "50":
				echo "咨询员";
				break;
				case "10":
				echo "收费员";
				break;
				case "20":
				echo "竞价员";
				break;				
			}
		}
		
		@mysql::close();
		
		require VIEW_PATH.'setup.tpl.php';
	}
	
	function addclass(){
		@mysql::connect();
		$title = getgpc('title');
		$typename = getgpc('typename');
		$sql = "INSERT INTO class (title,typename) VALUE ('$title','$typename')";
		if(mysql_query($sql)){
			echo "添加成功!<a href='index.php?m=setup' target ='mainFrame'>点击返回主菜单</a>";
		}
		@mysql::close();
	}
	
	function delclass(){
		@mysql::connect();
		$id = getgpc('id');
		$sql = "DELETE FROM class WHERE id= '$id'";
		if(mysql_query($sql)){
			echo "删除成功!<a href='index.php?m=setup' target ='mainFrame'>点击返回主菜单</a>";
		}else{
			die('wrong');
		}
		@mysql::close();
	}
	
	function deluser(){
		@mysql::connect();
		$id = getgpc('id');
		$sql = "DELETE FROM user WHERE id= '$id'";
		if(mysql_query($sql)){
			echo "删除成功!<a href='index.php?m=setup' target ='mainFrame'>点击返回主菜单</a>";
		}
		@mysql::close();		
	}
	
	function edituser(){
		$id = getgpc('id');
		@mysql::connect();
		$result = mysql_query("SELECT * FROM user where id = '$id'");
		while($row = mysql_fetch_array($result)){
			$id=$row['id'];
			$name=$row['name'];
			$user=$row['user'];
			$u_right=$row['u_right'];
		}
		@mysql::close();		
		require VIEW_PATH.'edituser.tpl.php';
	}
	
	function updateuser(){
		@mysql::connect();
		$id = getgpc('id');
		$user = getgpc('user');
		$name = getgpc('name');
		$u_right = getgpc('u_right');
		$passwd = getgpc('passwd');
		if(empty($passwd)){
			$sqlpd = '';
		}else{
			$passwd = md5($passwd);
			$sqlpd = "passwd='".$passwd."',";
		}
		
		$sql = "UPDATE user set name='$name',user='$user',$sqlpd u_right='$u_right' where id = '$id'";
		if(mysql_query($sql)){
			echo "更改成功!<a href='index.php?m=setup' target ='mainFrame'>点击返回主菜单</a>";
		}else{
			die(mysql_error());
		}
		@mysql::close();				
	}
}
?>