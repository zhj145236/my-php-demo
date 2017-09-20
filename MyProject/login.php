<?php
session_start();
include 'db.php';
include 'contain.class.php';
$input = new Input();
$act = $input->get('act');

if (!$act == false){
    $username = $input->post("username");
    $password = $input->post("password");
    
    $sql = "SELECT * FROM adm WHERE username = '{$username}' && password = '{$password}'";
    $mysqli_result = $mysqli->query($sql);
    if ($row = $mysqli_result->fetch_array()){
        $_SESSION['username'] = $row['username'];
        header("Location:MyFile.php");
        //var_dump($row);
    }else{
        echo "登录失败";
    }
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>用户登录</title>
</head>
<body>
<form action="login.php?act=chk" method="post">
    <input type="text" name="username" placeholder="用户名" />
    <input type="password" name="password" placeholder="密码" />
    <input type="submit" value="点击登录" />
</form>