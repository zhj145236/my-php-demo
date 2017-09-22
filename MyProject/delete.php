<?php
/* 
 *功能：该页面主要是用来删除用户的留言(删除系用户对应id所在的记录)。
 *$id 用于存储从首页中传入的id信息在这里我们使用get方式接收。
*/
include 'db.php';
include 'contain.class.php';
$input = new Input();
$id = $input->get('id');

$sql = "DELETE FROM php105 WHERE id = '{$id}'";
$is = $mysqli->query($sql);
if ($is == true){
    header("Location:index.php");
}else{
    exit("删除失败");
}
?>
