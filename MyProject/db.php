<?php
$mysqli = new mysqli('localhost', 'root', '123456SB', 'zhanghejie');

//连接测试
if ($mysqli->connect_errno>0){
    echo "连接错误";
}
?>
