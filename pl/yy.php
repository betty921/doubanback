<?php
//对短评进行投票，不能反复投
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');

    $cid=$_POST['cid'];
    $uid=$_POST['uid'];
    $uidi=$uid.'x';
    require("./conn.php");  
    $query2="SELECT * FROM critis WHERE cID='$cid' AND locate('$uid', yhh)>0";
    $result2 = $conn->query($query2);
    $gs=$result2->num_rows;
    if($gs==0){
        $query3="SELECT * FROM critis WHERE cID='$cid'";
        $result3 = $conn->query($query3);
        $row3=$result3->fetch_assoc();
        $yhh=$row3['yhh'].$uid.'x';
        $query="UPDATE critis SET hzs=hzs+1,yhh='$yhh' WHERE cID='$cid'";
        $result = $conn->query($query); 
        $query1="SELECT * FROM critis WHERE cID='$cid'";
        $result1 = $conn->query($query1); 
        $row1=$result1->fetch_assoc();
        $hzs=$row1['hzs'];
        $response=array('code'=>200,
                    'message'=>'success for request',
                    'hz'=> $hzs,
                    'post'=>1);
        echo json_encode($response);}
    else{
        $response=array('code'=>200,
                    'message'=>'success for request',
                    'post'=>0);
        echo json_encode($response);
    }
?>