<?php
//根据电影号从评论表中检索所有该电影评论打分情况，计算出平均分值，及各分值打分人数的百分比
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');

    $mid=$_POST['mid'];
    require("./conn.php");
    $query5="SELECT * FROM critis WHERE mvID='$mid' AND rating>=0";
    $result5 = $conn->query($query5); 
    $row5=$result5->num_rows;  
    if(!$row5){
        $data = array(
            'tid' => 100,
            'site' => 'http://localhost:8080',
            'rs' => $row5,
        );
        $response=array('code'=>200,
                    'message'=>'success for request',
                    'data'=>$data);
        echo json_encode($response);
        exit;
    }
    else{
        $query="SELECT rating FROM critis WHERE mvID='$mid' AND rating='4'";
        $result = $conn->query($query); 
        $row=$result->num_rows;
        $bfb=round($row/$row5,3)*100;
        $query1="SELECT rating FROM critis WHERE mvID='$mid' AND rating='3'";
        $result1 = $conn->query($query1); 
        $row1=$result1->num_rows;
        $bfb1=round($row1/$row5,3)*100;
        $query2="SELECT rating FROM critis WHERE mvID='$mid' AND rating='2'";
        $result2 = $conn->query($query2); 
        $row2=$result2->num_rows;
        $bfb2=round($row2/$row5,3)*100;
        $query3="SELECT rating FROM critis WHERE mvID='$mid' AND rating='1'";
        $result3 = $conn->query($query3); 
        $row3=$result3->num_rows;
        $bfb3=round($row3/$row5,3)*100;
        $query4="SELECT rating FROM critis WHERE mvID='$mid' AND rating='0'";
        $result4 = $conn->query($query4); 
        $row4=$result4->num_rows;
        $bfb4=round($row4/$row5,3)*100;
        $fs1=(($row/$row5)*5+($row1/$row5)*4+($row2/$row5)*3+($row3/$row5)*2+($row4/$row5)*1)*2;
        $fs=round($fs1,1);
    if($fs>=2&&$fs<2.5){
        $query6="UPDATE movies SET xx='xx10',fs='$fs',rs='$row5' WHERE mvID='$mid'";
        $conn->query($query6);
    }
    if($fs>=2.5&&$fs<3.5){
        $query7="UPDATE movies SET xx='xx15',fs='$fs',rs='$row5' WHERE mvID='$mid'";
        $conn->query($query7);
    }
    if($fs>=3.5&&$fs<4.5){
        $query8="UPDATE movies SET xx='xx20',fs='$fs',rs='$row5' WHERE mvID='$mid'";
        $conn->query($query8);
    }
    if($fs>=4.5&&$fs<5.5){
        $query9="UPDATE movies SET xx='xx25',fs='$fs',rs='$row5' WHERE mvID='$mid'";
        $conn->query($query9);
    }
    if($fs>=5.5&&$fs<6.5){
        $query10="UPDATE movies SET xx='xx30',fs='$fs',rs='$row5' WHERE mvID='$mid'";
        $conn->query($query10);
    }
    if($fs>=6.5&&$fs<7.5){
        $query11="UPDATE movies SET xx='xx35',fs='$fs',rs='$row5' WHERE mvID='$mid'";
        $conn->query($query11);
    }
    if($fs>=7.5&&$fs<8.5){
        $query12="UPDATE movies SET xx='xx40',fs='$fs',rs='$row5' WHERE mvID='$mid'";
        $conn->query($query12);
    }
    if($fs>=8.5&&$fs<9.5){
        $query13="UPDATE movies SET xx='xx45',fs='$fs',rs='$row5' WHERE mvID='$mid'";
        $conn->query($query13);
    }
    if($fs>=9.5&&$fs<=10){
        $query14="UPDATE movies SET xx='xx50',fs='$fs',rs='$row5' WHERE mvID='$mid'";
        $conn->query($query14);
    }
    $query15="SELECT * FROM movies WHERE mvID='$mid'";
    $result15=$conn->query($query15);
    $row15=$result15->fetch_assoc();
    $xx=$row15['xx'];
        $data = array(
            'tid' => 100,
            'site' => 'http://localhost:8080',
            'lj' => $bfb,
            'tj' => $bfb1,
            'hx' => $bfb2,
            'jc' => $bfb3,
            'hc' => $bfb4,
            'fs' => $fs,
            'rs' => $row5,
            'xx' => $xx
        );
  
    $response=array('code'=>200,
                    'message'=>'success for request',
                    'data'=>$data);
    echo json_encode($response);}
//写文件结束
?>