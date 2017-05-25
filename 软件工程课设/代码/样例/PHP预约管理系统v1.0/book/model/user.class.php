<?php
if(!defined('RAIN')) exit('Access Denied');

class user 
{
	function de(){
		require VIEW_PATH.'login.tpl.php';
	}

	function login(){//用户登入                                 
		@mysql::connect();
		
		if(get_magic_quotes_gpc()){
            $user =getgpc('user');
        }
        else{
            $user =addslashes(getgpc('user'));
        }		
		
		$passwd = md5(getgpc('passwd'));
		
		$sql="SELECT * FROM user where user='$user'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		
        if($row){
			if($row['passwd'] == $passwd){
				$_SESSION['user']=$row['user'];
                $_SESSION['name']=$row['name'];
				$_SESSION['u_right']=$row['u_right'];
		        @mysql::close();
				echo 100;
                //header("Location:index.php");				
			}else{
				echo 50;		
			}
		}else{
			echo 10;	
		}
		@mysql::close();		
	}
	
	function sign_out(){//用户注销
	    session_unset('user'); 
		session_unset('name'); 
		session_unset('u_right'); 
        session_destroy ();
        header("Location:index.php");
	}

	
	function register(){//用户注册		
		@mysql::connect();

		if(get_magic_quotes_gpc()){
            $user =getgpc('user');
			$name =getgpc('name');
        }
        else{
            $user =addslashes(getgpc('user'));
			$name =addslashes(getgpc('name'));
		}
		$right = getgpc('right');		
		$passwd = md5(getgpc('passwd'));
		
		$sql = "INSERT INTO user (user,passwd,name,u_right) VALUES ('$user','$passwd','$name','$right')";
		if(mysql_query($sql)){
			echo "增加成功!<a href='index.php?m=setup' target ='mainFrame'>点击返回主菜单</a>";
		}
		else{
			die(mysql_error());
		}
		@mysql::close();
		

	}
			
}
?>