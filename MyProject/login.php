<?php
/*
 * 功能：添加用户登录(分为：检查用户是否为登录状态、非登录状态删除按钮隐藏，无法使用删除留言功能、使用session记录用户登录信息。) 
*/
session_start();
include 'db.php';
include 'contain.class.php';

$input = new Input();
$act = $input->get('act');
if (!$act == false){
    $username = $input->post('um');
    $password = $input->post('pw');
    
    $sql = "SELECT * FROM adm WHERE username = '{$username}' && password = '{$password}'";  //用于查询数据库与用户输入一致的信息
    $mysqli_result = $mysqli->query($sql);  //执行$sql这条语句，注意查询语句返回的是array数组，而插入语句也就是INSERT INTO返回的是bool值
    
    //print_r($mysqli_result);
    
    if ($row = $mysqli_result->fetch_array()){  //取出这条一致的信息并保存在变量$row中
        //$_SESSION跟$_POST差不多都是用来保存数组的普通变量。是array类型，$_SESSION唯一不同的是它有魔法可以将用户的信息存储在浏览器中
        $_SESSION['username'] = $row['username'];   //我们将用户名存储在session中，只要不清除缓存用户名会一直存在登录电脑的浏览器中
        header("Location:index.php"); //返回到index.php页面
    }else{
        exit('登录失败');
    }
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>用户登录</title>
<link href="./css/MyStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form  action="login.php?act=chk" method="post">
        <input type="text" placeholder="用户名" name="um" />
        <input type="password" placeholder="密码" name="pw" />
        <input type="submit" value="确定登录" />
    </form>
</body>
</html>
