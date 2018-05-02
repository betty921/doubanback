<?php
//将用户填写的评论数据更新或添加到数据库
    session_start();
    $score=$_GET['score'];
    $label=isset($_POST['biaoqian'])?$_POST['biaoqian']:"";
    $time=date("Y-m-d",time());
    $content=isset($_POST['biaoqian'])?$_POST['content']:"";
    $uid=$_SESSION['valid_user'];
    $urlprev=$_SERVER['HTTP_REFERER'];
    $mid=basename($urlprev,".php");
    require("./conn.php");
    //查看该用户是否对该电影已经评价过，评价过则修改
    $query="SELECT * FROM critis WHERE useID = '$uid' AND mvID = '$mid'";
    $result2 = $conn->query($query);
    if ($result2->num_rows) {
    	$sql_update="UPDATE critis SET ctime='$time',content='$content',userlabel='$label',rating='$score' WHERE useID = '$uid' AND mvID = '$mid'";
    	$result3=$conn->query($sql_update);
        if(!$result3){echo $conn->error;exit;}
    }
    //如果未评价过，则插入该评论至数据库
    else{
        $sql_insert="INSERT INTO critis(useID,mvID,ctime,content,userlabel,rating) VALUES($uid,$mid,'$time','$content','$label','$score')";
        $result=$conn->query($sql_insert);
        if(!$result){echo $conn->error;exit;}
    }
    $sql_query="SELECT cID FROM critis WHERE useID = '$uid' AND mvID = '$mid'";
    $result1=$conn->query($sql_query);
    $row=$result1->fetch_assoc();
    header("Location:../dy/".$mid.".php");
?>