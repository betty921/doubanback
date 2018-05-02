<?php
//传给前台相关电影的短评，根据前台页面列表的限制数限制取出几条数据
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');

    $sous=$_POST['gjc'];
    $mid=$_POST['mid'];
    $qq=$_POST['qq'];
    $ks=$_POST['ks'];
    require("./conn.php");  
    if($sous=="热门"){
        $query="SELECT * FROM critis WHERE mvID='$mid' AND content!='' ORDER BY hzs desc,cID desc";
    }
    else if($sous=="最新"){
        $query="SELECT * FROM critis WHERE mvID='$mid' AND content!='' ORDER BY ctime desc,cID desc";
    }else{}
        $result = $conn->query($query); 
        $gs=$result->num_rows;
        if($gs==0){
            $data = array(
            'tid' => 100,
            'site' => 'http://localhost:8080',
            'post' => 0,
        );
        $response=array('code'=>200,
                        'message'=>'success for request',
                        'data'=>$data);
        echo json_encode($response);
        }
        else{
            if($qq>$gs){
                $qq=$gs;
            }
            $arr=array();
            while($row=$result->fetch_assoc()){
                $arr[]=$row;
            }
            for($i=intval($ks);$i<intval($qq);$i++){
                $lj[$i]=$arr[$i]['cID'];
                $uid[$i]=$arr[$i]['useID'];
                $query1[$i]="SELECT * FROM users WHERE userID='$uid[$i]'";
                $result1[$i] = $conn->query($query1[$i]);
                $row1[$i]=$result1[$i]->fetch_assoc();
                $name[$i]=$row1[$i]['userName'];
                $fsa[$i]=$arr[$i]['rating'];
                switch(intval($fsa[$i])){
                    case (-1):
                        $fenshu[$i]="xx00";
                        break;
                    case (0):
                        $fenshu[$i]="xx10";
                        break;
                    case (1):
                        $fenshu[$i]="xx20";
                        break;
                    case (2):
                        $fenshu[$i]="xx30";
                        break; 
                    case (3):
                        $fenshu[$i]="xx40";
                        break;
                    case (4):
                        $fenshu[$i]="xx50";
                        break;                    
                }
                $sj[$i]=$arr[$i]['ctime'];
                $content[$i]=$arr[$i]['content'];
                $hzs[$i]=$arr[$i]['hzs'];
            }
            $data = array(
                'tid' => 100,
                'site' => 'http://localhost:8080',
                'post' => 1,
                'gs' => $gs,
                'lj' => $lj,
                'name' => $name,
                'fenshu' => $fenshu,
                'sj' => $sj,
                'content' => $content,
                'hzs' => $hzs
            );
            $response=array('code'=>200,
                            'message'=>'success for request',
                            'data'=>$data);
            echo json_encode($response);
        }
//写文件结束
?>