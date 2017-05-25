<?php
if(!defined('RAIN')) exit('Access Denied');

class top
{
	function de(){
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
			}
		}
		require VIEW_PATH.'top.tpl.php';
	}
}
?>