<?php
//已呈现的评星，点击直接修改数据库rating字段
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');
    $score=$_POST['score'];
    $uid=$_POST['uid'];
    $mid=$_POST['mid'];
    require("../conn.php");
    $querya="SELECT * FROM duanp WHERE userID = '$uid' AND mvID = '$mid'";
    $resulta = $conn->query($querya);
    if($resulta->num_rows){
    $sql_updatec="UPDATE duanp SET rating='$score' WHERE userID = '$uid' AND mvID = '$mid'";
    $result3c=$conn->query($sql_updatec);}

    $sql_update="UPDATE critis SET rating='$score' WHERE useID = '$uid' AND mvID = '$mid'";
    $result=$conn->query($sql_update);
    if(!$result){
        $data = array(
            'tid' => 100,
            'site' => 'http://localhost:8080',
            'post' =>$conn->error,
        );
        $response=array(
            'code'=>200,
            'message'=>'success for request',
            'data'=>$data
        );
        echo json_encode($response);
        exit;
    }
    $data = array(
        'tid' => 100,
        'site' => 'http://localhost:8080',
        'post' =>1,
    );
    $response=array(
        'code'=>200,
        'message'=>'success for request',
        'data'=>$data
    );
    echo json_encode($response);
?>