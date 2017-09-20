<?php
session_start();
if (isset($_SESSION['username']) == false){
    echo "需要管理员登录";
}
include 'contain.class.php';    //input接收类
$input = new Input();
include 'db.php';   //数据库连接

$id = $input->get('id');
$sql = "DELETE FROM php105 WHERE id='{$id}'";
$is = $mysqli->query($sql);
if ($is == true){
    header("Location:MyFile.php");
}else{
    echo "删除失败";
}
?>