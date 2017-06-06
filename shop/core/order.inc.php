<?php
require_once '../include.php';


function addOrder(){
    $arr=$GLOBALS['HTTP_RAW_POST_DATA'];
    //$items = explode(explode($arr,'<body>')[1],'</body>')[0];
    //return $items[0].id;
    //return $items[0]['id'];
    $items = json_decode($arr);
  /*  if(is_array($items)){
        return $items[0]->id;
    }else{
        return "不是数组";
    }*/
    //return $items[0];
    
  
    session_start();
    $arr1[1]=$_SESSION[user_name];
    
    for($i=0;$i<sizeof($items);$i++){
        $id=$items[$i]->id;
        $arr1[2]=(int)$id;
        $arr1[3]="1.5磅：18*18cm";
        $sql="select * from cake_info where cake_id={$id}";
       
        $row=fetchOne($sql);
        $arr1[4]=(int)$items[$i]->quantity;
        $arr1[5]= (float)$row['Price1'];
        $arr1[7]="未发货";
        $res=insert("my_order", $arr1);
        var_dump($res);
     
    }
    
}
addOrder();


