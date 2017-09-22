<?php
header("Content-type: text/html; charset=utf-8");
/* 
 * 在服务器端接收用户发送的消息，并用类进行封装
*/
class Input{    
    function post($key){
        //验证信息是否为空
        if (isset($_POST[$key]) == false){
            return false;
        }
        $val = $_POST[$key];
        return $val;
    }

    function get($key){
        if (isset($_GET[$key]) == false){
            return false;
        }
        $val = $_GET[$key];
        return $val;
    }
}

?>