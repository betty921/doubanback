<?php
//根据用户点击的检索条件检索电影
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');

    $lx=$_POST['lx'];
    $dq=$_POST['dq'];
    $ts=$_POST['ts'];  
    $gjc=$_POST['gjc'];  
    $ks=$_POST['ks'];
    $js=$_POST['js'];
    require("./conn.php");  
    if($gjc=='评价'){
        if($lx=='全部类型' && $dq=='全部地区' && $ts=='全部特色'){
            $query="SELECT * FROM movies ORDER BY fs desc,mvID desc";
        }
        else if($lx=='全部类型'&&$dq=='全部地区'){
            $query="SELECT * FROM movies WHERE locate('$ts', label)>0 ORDER BY fs desc,mvID desc";
        }
        else if($lx=='全部类型'&&$ts=='全部特色'){
            $query="SELECT * FROM movies WHERE locate('$dq', producer)>0 ORDER BY fs desc,mvID desc";
        }
        else if($ts=='全部特色'&&$dq=='全部地区'){
            $query="SELECT * FROM movies WHERE locate('$lx', type)>0 ORDER BY fs desc,mvID desc";
        }
        else if($lx=='全部类型'){
            $query="SELECT * FROM movies WHERE locate('$ts', label)>0 AND locate('$dq',producer)>0 ORDER BY fs desc,mvID desc";
        }
        else if($dq=='全部地区'){
            $query="SELECT * FROM movies WHERE locate('$ts', label)>0 AND locate('$lx',type)>0 ORDER BY fs desc,mvID desc";
        }
        else if($ts=='全部特色'){
            $query="SELECT * FROM movies WHERE locate('$lx', type)>0 AND locate('$dq',producer)>0 ORDER BY fs desc,mvID desc";
        }
        else{
            $query="SELECT * FROM movies WHERE locate('$lx', type)>0 AND locate('$dq', producer)>0 AND locate('$ts', label)>0 ORDER BY fs desc,mvID desc";
        }
    }
    else if($gjc=='热门'){
        if($lx=='全部类型'&&$dq=='全部地区'&&$ts=='全部特色'){
            $query="SELECT * FROM movies ORDER BY rs desc,mvID desc";
        }
        else if($lx=='全部类型'&&$dq=='全部地区'){
            $query="SELECT * FROM movies WHERE locate('$ts', label)>0 ORDER BY rs desc,mvID desc";
        }
        else if($lx=='全部类型'&&$ts=='全部特色'){
            $query="SELECT * FROM movies WHERE locate('$dq', producer)>0 ORDER BY rs desc,mvID desc";
        }
        else if($ts=='全部特色'&&$dq=='全部地区'){
            $query="SELECT * FROM movies WHERE locate('$lx', type)>0 ORDER BY rs desc,mvID desc";
        }
        else if($lx=='全部类型'){
            $query="SELECT * FROM movies WHERE locate('$ts', label)>0 AND locate('$dq',producer)>0 ORDER BY rs desc,mvID desc";
        }
        else if($dq=='全部地区'){
            $query="SELECT * FROM movies WHERE locate('$ts', label)>0 AND locate('$lx',type)>0 ORDER BY rs desc,mvID desc";
        }
        else if($ts=='全部特色'){
            $query="SELECT * FROM movies WHERE locate('$lx', type)>0 AND locate('$dq',producer)>0 ORDER BY rs desc,mvID desc";
        }
        else{
            $query="SELECT * FROM movies WHERE locate('$lx', type)>0 AND locate('$dq', producer)>0 AND locate('$ts', label)>0 ORDER BY rs desc,mvID desc";
        }
    }
    else{
        if($lx=='全部类型'&&$dq=='全部地区'&&$ts=='全部特色'){
            $query="SELECT * FROM movies ORDER BY botime desc,mvID desc";
        }
        else if($lx=='全部类型'&&$dq=='全部地区'){
            $query="SELECT * FROM movies WHERE locate('$ts', label)>0 ORDER BY botime desc,mvID desc";
        }
        else if($lx=='全部类型'&&$ts=='全部特色'){
            $query="SELECT * FROM movies WHERE locate('$dq', producer)>0 ORDER BY botime desc,mvID desc";
        }
        else if($ts=='全部特色'&&$dq=='全部地区'){
            $query="SELECT * FROM movies WHERE locate('$lx', type)>0 ORDER BY botime desc,mvID desc";
        }
        else if($lx=='全部类型'){
            $query="SELECT * FROM movies WHERE locate('$ts', label)>0 AND locate('$dq',producer)>0 ORDER BY botime desc,mvID desc";
        }
        else if($dq=='全部地区'){
            $query="SELECT * FROM movies WHERE locate('$ts', label)>0 AND locate('$lx',type)>0 ORDER BY botime desc,mvID desc";
        }
        else if($ts=='全部特色'){
            $query="SELECT * FROM movies WHERE locate('$lx', type)>0 AND locate('$dq',producer)>0 ORDER BY botime desc,mvID desc";
        }
        else{
            $query="SELECT * FROM movies WHERE locate('$lx', type)>0 AND locate('$dq', producer)>0 AND locate('$ts', label)>0 ORDER BY botime desc,mvID desc";
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