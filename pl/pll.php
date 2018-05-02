<?php
//将用户填写的短评及打分添加至数据库
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');

    $score=$_POST['score'];
    $label=isset($_POST['biaoqian'])?$_POST['biaoqian']:"";
    $time=date("Y-m-d",time());
    $content=isset($_POST['content'])?$_POST['content']:"";
    $uid=$_POST['uid'];
    $mid=$_POST['mid'];
    
    require("./conn.php");
    //查看该用户是否对该电影已经评价过，评价过则修改
    $querya="SELECT * FROM duanp WHERE userID = '$uid' AND mvID = '$mid'";
    $resulta = $conn->query($querya);
    if($resulta->num_rows){
    $sql_updatec="UPDATE duanp SET rating='$score' WHERE userID = '$uid' AND mvID = '$mid'";
    $result3c=$conn->query($sql_updatec);}
    $query="SELECT * FROM critis WHERE useID = '$uid' AND mvID = '$mid'";
    $result2 = $conn->query($query);
    if ($result2->num_rows) {
    	$sql_update="UPDATE critis SET ctime='$time',content='$content',userlabel='$label',rating='$score' WHERE useID = '$uid' AND mvID = '$mid'";
    	$result3=$conn->query($sql_update);
        if(!$result3){
            $data = array(
                'tid' => 100,
                'site' => 'http://localhost:8080',
                'post' => $conn->error,
                'err' => 1
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
    //如果未评价过，则插入该评论至数据库
    else{
        $sql_insert="INSERT INTO critis(useID,mvID,ctime,content,userlabel,rating,hzs) VALUES ($uid,$mid,'$time','$content','$label',$score,0)";
        $result=$conn->query($sql_insert);
        if(!$result){
            $data = array(
                'tid' => 100,
                'site' => 'http://localhost:8080',
                'post' =>$conn->error,
                'err' => 0
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