<?php
//长评的投票，有用或没用，点击有用后再点击没用，则投票为没用
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');

    $dpid=$_POST['dpid'];
    $uid=$_POST['uid'];
    $gjc=$_POST['ymy'];
    require("./conn.php"); 
    $query2="SELECT * FROM duanp WHERE dpID='$dpid' AND locate('$uid', yyyh)>0";
    $query22="SELECT * FROM duanp WHERE dpID='$dpid' AND locate('$uid', myyh)>0";
    $result2 = $conn->query($query2);
    $result22 = $conn->query($query22);
    $gs=$result2->num_rows;
    $gs22=$result22->num_rows;
    $query3="SELECT * FROM duanp WHERE dpID='$dpid'";
    $result3 = $conn->query($query3);
    $row3=$result3->fetch_assoc();
    if($gjc==1){
        if($gs==0){
            $yyyh=$row3['yyyh'].$uid.'x';
            $query="UPDATE duanp SET hzs=hzs+1,yyyh='$yyyh' WHERE dpID='$dpid'";
            $result = $conn->query($query); 
        }
        if($gs22!=0){        
            $myyh=str_replace($uid.'x', '', $row3['myyh']);
            $query33="UPDATE duanp SET mys=mys-1,myyh='$myyh' WHERE dpID='$dpid'";
            $result33 = $conn->query($query33);
        }
    }
    else{
        if($gs22==0){
            $myyh=$row3['myyh'].$uid.'x';
            $query="UPDATE duanp SET mys=mys+1,myyh='$myyh' WHERE dpID='$dpid'";
            $result = $conn->query($query); 
        }
        if($gs!=0){        
            $yyyh=str_replace($uid.'x', '', $row3['yyyh']);
            $query33="UPDATE duanp SET hzs=hzs-1,yyyh='$yyyh' WHERE dpID='$dpid'";
            $result33 = $conn->query($query33);
        }
    }
    $query1="SELECT * FROM duanp WHERE dpID='$dpid'";
    $result1 = $conn->query($query1); 
    $row1=$result1->fetch_assoc();
    $hzs=$row1['hzs'];
    $mys=$row1['mys'];
    $response=array('code'=>200,
                    'message'=>'success for request',
                    'hzs'=> $hzs,
                    'mys'=> $mys,
                    'post'=>1);
    echo json_encode($response);
?>