<?php
//连接数据可
$mysqli = mysqli_connect("localhost","root","123456SB","zhanghejie");
if ($mysqli->connect_errno>0){
    echo "连接错误";
}
//设置utf8编码
$mysqli->query("SET NAMES UTF8");
?>