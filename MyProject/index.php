<?php
/*
 * 读取数据库信息，并且显示在相对应的位置。
 * $sql 储存查询数据库表php105的信息。
 * $rows用于存储查询的结果集
 */
session_start();
//print_r($_SESSION);
include 'db.php';
$sql = "SELECT * FROM php105 ORDER BY id DESC";
$mysqli_result = $mysqli->query($sql);  //注意$mysqli_result返回的是对象类型，我们只有将对象转化成数组后才能对其进行取值

$rows = array();
while ($row = $mysqli_result->fetch_array(MYSQLI_ASSOC)){   //fetch_array返回的是一组字符串形式的数组。
    $rows[] = $row;
}
//print_r($rows);

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
    	<?php 
    	   foreach ($rows as $value){
    	       $t = date('Y-m-d H:i:s',$value['infotime']);    	
	    ?>
    	<div class="showMsg">
            <div>
        		<span class="LftSpn"><?php echo $value['username'];?></span>
        		<span class="RitSpn">
                    <?php echo $t;?>
                    <?php if (isset($_SESSION['username'])){?>
        		      <a class="RitSpn" href="delete.php?id=<?php echo $value['id'];?>">删除</a> 
                    <?php }?>   		
        		</span>
        		<div class="clearfix"></div>
    		</div>
    		<p><?php echo $value['massage']?></p>
    	</div>
    	<?php }?>
    </div>
</body>
</html>