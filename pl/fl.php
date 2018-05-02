<?php
//根据用户点击的电影分类条件检索电影，并将数据返回至前台
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');

    $lx=$_POST['lx'];  
    $gjc=$_POST['gjc'];  
    $ks=$_POST['ks'];
    $js=$_POST['js'];
    require("./conn.php");  
    if($gjc=='评价'){
        if($lx=='热门'){
            $query="SELECT * FROM movies WHERE rs>5 ORDER BY fs desc,mvID desc";
        }
        else if($lx=='豆瓣高分'){
            $query="SELECT * FROM movies WHERE fs>8 ORDER BY fs desc,mvID desc";
        }
        else if($lx=='华语'){
            $query="SELECT * FROM movies WHERE locate('中国大陆', producer)>0 OR locate('台湾', producer)>0 OR locate('香港', producer)>0 ORDER BY fs desc,mvID desc";
        }
        else if($lx=='欧美'){
            $query="SELECT * FROM movies WHERE locate('美国', producer)>0 OR locate('英国', producer)>0 OR locate('法国', producer)>0 OR locate('德国', producer)>0 OR locate('意大利', producer)>0 OR locate('西班牙', producer)>0 OR locate('加拿大', producer)>0 OR locate('澳大利亚', producer)>0 OR locate('爱尔兰', producer)>0 OR locate('瑞典', producer)>0 ORDER BY fs desc,mvID desc";
        }
        else{
            $query="SELECT * FROM movies WHERE locate('$lx', type)>0 OR locate('$lx', producer)>0 OR locate('$lx', label)>0 ORDER BY fs desc,mvID desc";
        }
    }
    else if($gjc=='热门'){
        if($lx=='热门'){
            $query="SELECT * FROM movies WHERE rs>5 ORDER BY rs desc,mvID desc";
        }
        else if($lx=='豆瓣高分'){
            $query="SELECT * FROM movies WHERE fs>8 ORDER BY rs desc,mvID desc";
        }
        else if($lx=='华语'){
            $query="SELECT * FROM movies WHERE locate('中国大陆', producer)>0 OR locate('台湾', producer)>0 OR locate('香港', producer)>0 ORDER BY rs desc,mvID desc";
        }
        else if($lx=='欧美'){
            $query="SELECT * FROM movies WHERE locate('美国', producer)>0 OR locate('英国', producer)>0 OR locate('法国', producer)>0 OR locate('德国', producer)>0 OR locate('意大利', producer)>0 OR locate('西班牙', producer)>0 OR locate('加拿大', producer)>0 OR locate('澳大利亚', producer)>0 OR locate('爱尔兰', producer)>0 OR locate('瑞典', producer)>0 ORDER BY rs desc,mvID desc";
        }
        else{
            $query="SELECT * FROM movies WHERE locate('$lx', type)>0 OR locate('$lx', producer)>0 OR locate('$lx', label)>0 ORDER BY rs desc,mvID desc";
        }
    }
    else{
        if($lx=='热门'){
            $query="SELECT * FROM movies WHERE rs>5 ORDER BY botime desc,mvID desc";
        }
        else if($lx=='豆瓣高分'){
            $query="SELECT * FROM movies WHERE fs>8 ORDER BY botime desc,mvID desc";
        }
        else if($lx=='华语'){
            $query="SELECT * FROM movies WHERE locate('中国大陆', producer)>0 OR locate('台湾', producer)>0 OR locate('香港', producer)>0 ORDER BY botime desc,mvID desc";
        }
        else if($lx=='欧美'){
            $query="SELECT * FROM movies WHERE locate('美国', producer)>0 OR locate('英国', producer)>0 OR locate('法国', producer)>0 OR locate('德国', producer)>0 OR locate('意大利', producer)>0 OR locate('西班牙', producer)>0 OR locate('加拿大', producer)>0 OR locate('澳大利亚', producer)>0 OR locate('爱尔兰', producer)>0 OR locate('瑞典', producer)>0 ORDER BY botime desc,mvID desc";
        }
        else{
            $query="SELECT * FROM movies WHERE locate('$lx', type)>0 OR locate('$lx', producer)>0 OR locate('$lx', label)>0 ORDER BY botime desc,mvID desc";
        }
    }
        $po=1;
        $result = $conn->query($query); 
        $gs=$result->num_rows;
        if($js>=$gs){$js=$gs;$po=0;}
        $arr=array();
        while($row=$result->fetch_assoc()){
            $arr[]=$row;
        }
        for($i=$ks;$i<$js;$i++){
            $img[$i]=$arr[$i]['image'];
            $name[$i]=$arr[$i]['mvName'];
            $mid[$i]=$arr[$i]['mvID'];
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
            'mid' => $mid,
            'fen' => $fen,
            'po' => $po
        );
        $response=array('code'=>200,
                        'message'=>'success for request',
                        'data'=>$data);
        echo json_encode($response);
//写文件结束
?>