<?php
/*
 * 功能接收客户端用户输入的信息，并进行简单的排空处理
 * 连接数据库，将用户信息存储到数据库
 * $input 实例化的对象
 * $user 存储以post方式发送过来的用户名
 * $msg 存储以post方式发送过来的用户留言信息
 * $sql 存储用户名，用户留言信息，留言时间
 * $is 执行查询语句
 */
include 'db.php';  //数据库连接
include 'contain.class.php';   //input类
$input = new Input();
$user = $input->post('user');
$msg = $input->post('msg');

//判断用户输入不能为空
if ($user === ""){
    exit("对不起！用户名不能为空");
}
if ($msg === ""){
    exit("对不起！留言内容不能为空");
}

//=================================================================================连接数据库将数据存储到数据库中
//设置变量$t储存当前时间戳
$t = time();
$sql = "INSERT INTO php105 (`username`,`massage`,`infotime`) VALUES ('{$user}','{$msg}','{$t}')";
$is = $mysqli->query($sql);

//判断是否想数据库插入信息成功
if ($is == true){
    header('Location:index.php');
}else{
    exit("插入失败");
}
?>