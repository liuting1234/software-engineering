<?php
/*connect to the datatbase*/
error_reporting(E_ALL ^ E_NOTICE);
function connect(){
    $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD)or die("Failed to connect the database".mysqli_errno().":".mysqli_error());
    mysqli_set_charset($link,DB_CHARSET);
    mysqli_select_db($link,DB_DBNAME)or die("Failed to open the specified database");
    return $link;
}


/*insert record*/

function insert($table,$array){
    $keys = join(",",array_keys($array));
    $vals="'".join("','",array_values($array))."'";
    $sql="insert into {$table}($keys)values({$vals})";
    
    mysqli_query(connect(),$sql);
    return mysqli_insert_id(connect());
}

/*update record*/

function update($table,$array,$where){
    $str="";
	foreach($array as $key=>$val){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
		$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
		var_dump($sql);
		$result=mysqli_query(connect(),$sql);
		//var_dump($result);
		//var_dump(mysql_affected_rows());exit;
		if($result){
			return mysqli_affected_rows(connect());
		}else{
			return false;
		}
}


/*delete record*/
function del($table,$where=null){
	$where=$where==null?null:" where ".$where;
	$sql="delete from {$table} {$where}";

	mysqli_query(connect(),$sql);
	return mysqli_affected_rows(connect());
}

/**
 *或缺一条结果
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchOne($sql,$result_type=MYSQLI_ASSOC){
    $result=mysqli_query(connect(),$sql);
    if(!$result){
        printf("error:%s\n",mysqli_errno(connect()));
        exit();
    }
    $row=mysqli_fetch_array($result,$result_type);
    return $row;
}


/**
 * 获取所有结果
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchAll($sql,$result_type=MYSQLI_ASSOC){
    $result=mysqli_query(connect(),$sql);
    while(@$row=mysqli_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;
}

/**
 * 获取记录条数
 * @param unknown_type $sql
 * @return number
 */
function getResultNum($sql){
    $result=mysqli_query(connect(),$sql);
    return mysqli_num_rows($result);
}


function getInsertId(){
    return mysqli_insert_id(connect());
}