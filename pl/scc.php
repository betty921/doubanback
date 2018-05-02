<?php
//用户点击删除，删除对该电影的评论
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');
    $uid=$_POST['uid'];
    $mid=$_POST['mid'];
    require("./conn.php");
    $queryv="SELECT * FROM duanp WHERE userID = '$uid' AND mvID = '$mid'";
    $result2v = $conn->query($queryv);
    $sql_update="DELETE FROM critis WHERE useID = '$uid' AND mvID = '$mid'";
    $result=$conn->query($sql_update);
    if(!$result){
        $data = array(
            'tid' => 100,
            'site' => 'http://localhost:8080',
            'post' =>$conn->error,
            'err' =>1
        );
        $response=array(
            'code'=>200,
            'message'=>'success for request',
            'data'=>$data
        );
        echo json_encode($response);
        exit;
    }
    if($result2v->num_rows){
        $sql_updatev="DELETE FROM duanp WHERE userID = '$uid' AND mvID = '$mid'";
        $resultv=$conn->query($sql_updatev);
        if(!$resultv){
            $data = array(
            'tid' => 100,
            'site' => 'http://localhost:8080',
            'post' =>$conn->error,
            'err' =>2
            );
            $response=array(
            'code'=>200,
            'message'=>'success for request',
            'data'=>$data
            );
            echo json_encode($response);
            exit;
        }
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