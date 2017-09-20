<?php 
/* 取出数据库的数据,显示在指定位置 */
//连接数据库
session_start();
//var_dump($_SESSION);
include 'db.php';

//如果连接成功
$sql = "SELECT * FROM php105 ORDER BY id DESC";
$result = $mysqli->query($sql);

$rows = array();
while ($row = $result->fetch_array(MYSQL_ASSOC)){
    $rows[] = $row;
}
/* print_r($rows); */

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>用户留言</title>
<link href="./css/MyStyle.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="div1">
	<!-- 留言部分 -->
	<form action="myphp.php" method="post">
		<textarea class="msg" placeholder="留言板" name="msg"></textarea>
		<input type="text" class="lftInp" placeholder="留言人" name="user" />
		<input type="Submit" class="ritInp" value="确定" />
		<a class="ritInp" href="login.php">登录</a>
		<div class="clearfix"></div>
	</form>
			
	<!-- 留言显示 -->
	<?php foreach ($rows as $values){
	    $t = date("Y-m-d H:i:s",$values["infotime"]);
    ?>
	<div class="showMsg">
        <div>
    		<span class="LftSpn"><?php echo $values["username"];?></span>
    		<span class="RitSpn">
    		<?php echo $t;?>
    		
    		<?php if (isset($_SESSION['username']) == true){?>
    		      <a class="RitSpn" href="delete.php?id=<?php echo $values['id']?>">删除</a>
    		<?php }?>
    		
    		</span>
    		<div class="clearfix"></div>
		</div>
		<p><?php echo $values["massage"];?></p>
	</div>
	<?php }?>
</div>





























</body>
</html>