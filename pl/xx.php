<?php
//已呈现的评星，点击直接修改数据库rating字段
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');
    session_start();
    $score=$_GET['score'];
    $uid=$_SESSION['valid_user'];
    $urlprev=$_SERVER['HTTP_REFERER'];
    $mid=basename($urlprev,".php");
    require("../conn.php");
    $sql_update="UPDATE critis SET rating='$score' WHERE useID = '$uid' AND mvID = '$mid'";
    $result=$conn->query($sql_update);
    if(!$result){echo $conn->error;exit;}
    header("Location:../dy/1.php");
?>