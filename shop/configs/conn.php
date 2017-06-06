<?php
$conn=mysqli_connect("localhost","root","");
    if(!$conn)
    {
       echo "<script language='javascript'>alert('连接数据库失败，请检查网络!');history.back();</script>";
       die("数据库服务器连接错误".mysqli_error());
    }
    mysqli_select_db($conn,"book") or die("数据库访问错误".mysqli_error());
    mysqli_query($conn,"set character set utf8");
?>