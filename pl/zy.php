<?php
//返回给主页的数据
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:GET'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');

    require("./conn.php");  
    $query="SELECT * FROM movies";
    $result = $conn->query($query); 
    $arr=array();
    while($row=$result->fetch_assoc()){
            $arr[]=$row;
    }
    for($i=0;$i<10;$i++){
        $img[$i]=$arr[$i]['image'];
        $name[$i]=$arr[$i]['mvName'];
        $fs[$i]=$arr[$i]['fs'];
        $xx[$i]=$arr[$i]['xx'];
        $mid[$i]=$arr[$i]['mvID'];
    }
    $data = array(
            'tid' => 100,
            'site' => 'http://localhost:8080',
            'img' => $img,
            'name' => $name,
            'xx' => $xx,
            'fs' => $fs,
            'mid' => $mid
    );
  
    $response=array('code'=>200,
                    'message'=>'success for request',
                    'data'=>$data);
    echo json_encode($response);
?>