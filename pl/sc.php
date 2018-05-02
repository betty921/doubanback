<?php
//如果用户登录了，则传给前台用户关于该电影的评论数据
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');

    $uid=$_POST['uid'];
    $mid=$_POST['mid'];
    require("./conn.php");  
    $query="SELECT * FROM critis WHERE useID = '$uid' AND mvID='$mid'";
    $result = $conn->query($query); 
    $row=$result->fetch_assoc();
    if(!$row){
        $data = array(
            'tid' => 100,
            'site' => 'http://localhost:8080',
            'post' =>0,
        );
    }else{
        $xz=$row['rating']; 
        $sj=$row['ctime']; 
        $ytbq=$row['userlabel']; 
        $brief=$row['content'];
        $queryv="SELECT * FROM duanp WHERE userID = '$uid' AND mvID='$mid'";
        $resultv = $conn->query($queryv); 
        $rowv=$resultv->fetch_assoc();
        if(!$rowv){
            $changp="";
            $biaoti="";
        }
        else{
            $changp=$rowv['content'];
            $biaoti=$rowv['biaoti'];
        }
        $data = array(
            'tid' => 100,
            'site' => 'http://localhost:8080',
            'post' =>1,
            'xz' =>$xz,
            'sj' =>$sj,
            'ytbq' =>$ytbq,
            'brief' =>$brief,
            'changp' =>$changp,
            'biaoti' =>$biaoti
        );
    }
    $response=array('code'=>200,
                    'message'=>'success for request',
                    'data'=>$data);
    echo json_encode($response);
//写文件结束
?>