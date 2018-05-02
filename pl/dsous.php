<?php
//根据用户提供的搜索关键词对数据库中的电影进行检索，并将数据传至前台
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');

    $sous=$_POST['sous'];
    require("./conn.php");  
    if($sous==""){
        $data = array(
            'tid' => 100,
            'site' => 'http://localhost:8080',
            'post' => 0
        );
        $response=array('code'=>200,
                        'message'=>'success for request',
                        'data'=>$data);
        echo json_encode($response);
    }
    else{
        $sz=str_split($sous);
        $query="SELECT * FROM movies WHERE locate('$sous', mvName)>0 OR locate('$sous', director)>0 OR locate('$sous', star)>0 OR locate('$sous', autor)>0";
        $result = $conn->query($query); 
        $gs=$result->num_rows;
        if($gs!=0){
        $arr=array();
        while($row=$result->fetch_assoc()){
            $arr[]=$row;
        }
        for($i=0;$i<$gs;$i++){
            $img[$i]=$arr[$i]['image'];
            $name[$i]=$arr[$i]['mvName'];
            $ym[$i]=$arr[$i]['anotherName'];
            $sj[$i]=$arr[$i]['botime'];
            $mid[$i]=$arr[$i]['mvID'];
            $sc[$i]=$arr[$i]['runningtime'];
            $zy[$i]=$arr[$i]['star'];
            $dy[$i]=$arr[$i]['director'];
            $lx[$i]=$arr[$i]['type'];
            $fenshu[$i]=$arr[$i]['xx'];
            $fen[$i]=$arr[$i]['fs'];
            $rs[$i]=$arr[$i]['rs'];
        }
        $data = array(
            'tid' => 100,
            'site' => 'http://localhost:8080',
            'post' => 1,
            'gs' => $gs,
            'img' => $img,
            'name' => $name,
            'sj' => $sj,
            'ym' => $ym,
            'mid' => $mid,
            'sc' => $sc,
            'zy' => $zy,
            'dy' => $dy,
            'lx' => $lx,
            'fenshu' => $fenshu,
            'fen' => $fen,
            'rs' => $rs
        );
        $response=array('code'=>200,
                        'message'=>'success for request',
                        'data'=>$data);
        echo json_encode($response);
    }
    else{
        $data = array(
            'tid' => 100,
            'site' => 'http://localhost:8080',
            'post' => 0
        );
        $response=array('code'=>200,
                        'message'=>'success for request',
                        'data'=>$data);
        echo json_encode($response);
    }
    }
//写文件结束
?>