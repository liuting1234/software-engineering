<?php
class mysql
{	
	function connect(){
		$conn = mysql_connect(DBHOST,DBUSER,DBPW);
		if($conn){
			mysql_select_db(DBNAME);
			mysql_query("SET NAMES '".DBLAN."', character_set_client=binary, sql_mode='', interactive_timeout=3600 ;");
		}           
		else{
			echo 'Can not connect to MySQL server!';
		}
	}
	
	function close(){
		$conn = mysql_connect(DBHOST,DBUSER,DBPW);
		mysql_close($conn);
		}
}

?>