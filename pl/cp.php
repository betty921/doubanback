<?php
//传给前台相关电影的长评，根据前台页面列表的限制数限制取出几条数据
    header('Access-Control-Allow-Origin:http://localhost:8080');
    header('Access-Control-Allow-Methods:POST'); 
    header('Access-Control-Allow-Headers:x-requested-with,content-type');

    $sous=$_POST['gjc'];
    $mid=isset($_POST['mid'])?$_POST['mid']:'';
    $uid=$_POST['uid'];
    $uidi=$uid.'x';
    $qq=isset($_POST['qq'])?$_POST['qq']:'';
    $ks=$_POST['ks'];
    require("./conn.php"); 
    if($mid==''){
        if($sous=="热门"){
            $query="SELECT * FROM duanp WHERE content!='' ORDER BY hzs desc,dpID desc";
        }
        else{
            $query="SELECT * FROM duanp WHERE content!='' ORDER BY ctime desc,dpID desc";
        }
    }else{
        $querym="SELECT * FROM movies WHERE mvID='$mid'";
        $resultm = $conn->query($querym);
        $rowm=$resultm->fetch_assoc();
        $img=$rowm['image'];
        if($sous=="热门"){
            $query="SELECT * FROM duanp WHERE mvID='$mid' AND content!='' ORDER BY hzs desc,dpID desc";
        }
        else if($sous=="最新"){
            $query="SELECT * FROM duanp WHERE mvID='$mid' AND content!='' ORDER BY ctime desc,dpID desc";
        }
        else{}
    }
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
            if($qq>$gs||$qq==''){
                $qq=$gs;
            }
            $arr=array();
            while($row=$result->fetch_assoc()){
                $arr[]=$row;
            }
            for($i=intval($ks);$i<intval($qq);$i++){
                $lj[$i]=$arr[$i]['dpID'];
                $uid[$i]=$arr[$i]['userID'];
                $mmid[$i]=$arr[$i]['mvID'];
                $dpid[$i]=$arr[$i]['dpID'];
                $query2a[$i]="SELECT * FROM duanp WHERE dpID='$dpid[$i]' AND locate('$uidi', yyyh)>0";
                $query22a[$i]="SELECT * FROM duanp WHERE dpID='$dpid[$i]' AND locate('$uidi', myyh)>0";
                $result2a[$i] = $conn->query($query2a[$i]);
                $result22a[$i] = $conn->query($query22a[$i]);
                $gsa[$i]=$result2a[$i]->num_rows;
                $gs22a[$i]=$result22a[$i]->num_rows;
                if(!$gsa[$i]&&!$gs22a[$i]){
                    $up[$i]="../../static/xx/up.png";
                    $down[$i]="../../static/xx/down.png";
                }
                if($gsa[$i]){
                    $up[$i]="../../static/xx/uph.png";
                    $down[$i]="../../static/xx/down.png";
                }
                if($gs22a[$i]){
                    $up[$i]="../../static/xx/up.png";
                    $down[$i]="../../static/xx/downh.png";
                }
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
                $mys[$i]=$arr[$i]['mys'];
                $biaoti[$i]=$arr[$i]['biaoti'];
                $query1q[$i]="SELECT * FROM movies WHERE mvID='$mmid[$i]'";
                $result1q[$i] = $conn->query($query1q[$i]);
                $row1q[$i]=$result1q[$i]->fetch_assoc();
                $ljt[$i]=$row1q[$i]['mvID'];
                $img1[$i]=$row1q[$i]['image'];
            }
            if(!isset($img)){
                $img='';
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
                'hzs' => $hzs,
                'mys' => $mys,
                'biaoti' => $biaoti,
                'up'=>$up,
                'down'=>$down,
                'img'=>$img,
                'img1'=>$img1,
                'ljt'=>$ljt
            );
            $response=array('code'=>200,
                            'message'=>'success for request',
                            'data'=>$data);
            echo json_encode($response);
        }
?>