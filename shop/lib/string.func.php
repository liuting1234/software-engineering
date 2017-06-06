<?php

function buildRandomString($type,$length){
    
    if($type==1){
        $chars= join("",range(0,9));
    }else if($type==2){
        $chars=join("",array_merge(range ( "a", "z" ), range ( "A", "Z" ) ) );
        
    }else if($type==3){
        $chars = join("",array_merge( range ( "a", "z" ), range ( "A", "Z" ), range ( 0, 9 ) ) );
        
    }
    if($length > strlen($chars)){
        exit("字符串长度不够");
    }
    $chars = str_shuffle($chars);
    return substr($chars,0,$length);
}

//生成唯一字符串

function getUniName(){
    return md5(uniqid(microtime(true),true));
}

//得到文件的扩展名
function getExt($filename){
   $array=explode(".", $filename);

    $str=end($array);

    $extstr=strtolower($str);

    return $extstr;
    
}


function checkString($str){
    $length=strlen($str);
    $examStr="*()[];'\"";
    $exam_len=strlen($examStr);
    for ($i=0;$i<$length;$i++)
    {
        if($str[$i]==" ")
        {
            echo "<script>alert('输入不能含有空字符！');history.back();</script>";
            return false;
        }else{
            for($j=0;$j<$exam_len;$j++){
                if($str[$i]==$examStr[$j]){
                    echo "<script>alert('输入不能含有非法字符!');history.back();</script>";
                    return false;
                }
            }
        }
    }
    return true;
}
function checkPhoneNumber($str){
    $examNum="0123456789";
    for($i=0;$i<11;$i++)
    {
        $isOk=false;
        for($j=0;$j<11;$j++)
        {
            if($str[$i]==$examNum[$j])
            {
                $isOk=true;
            }
        }
    }
    return $isOk;
}