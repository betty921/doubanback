<?php
//根据管理员填写的电影详细信息动态生成电影详情页
    //图片上传处理
    //错误提示
    if ($_FILES['tupian']['error']>0) {
      echo '错误：';
      switch ($_FILES['tupian']['error']) {
        case 1: echo "文件大小超长";
              break;
        case 2: echo "文件大小超长";
              break;
        case 3: echo "文件只被部分上传";
              break;    
        case 4: echo "没有上传任何文件";
              break; 
        case 6: echo "文件未指定临时目录";
              break;   
        case 7: echo "文件写入磁盘失败";
              break;                                                                        
        }
        exit;
    }
    //错误提示结束
    //判断上传的图片类型是否允许类型
    $type=$_FILES['tupian']['type'];
      if ($type!='image/gif' && $type!='image/png' && $type!='image/jpg' && $type!='image/jpeg') {
        echo "错误：文件非指定类型";
        exit;
      }
    //判断上传的图片类型是否允许类型结束
  //将临时存储的图片移动到指定目录下      
    $upfile='C:/Users/Administrator/Desktop/xts/static/dy/'.$_FILES['tupian']['name'];
    $img='../../static/dy/'.$_FILES['tupian']['name'];
    if (is_uploaded_file($_FILES['tupian']['tmp_name'])) {
    if (!move_uploaded_file($_FILES['tupian']['tmp_name'], $upfile)) {
        echo "错误：不能移动到目标目录";
        exit;
      }
    }
    else {
      echo "错误：文件被攻击。文件名：";
    exit;
    }
    //将临时存储的图片移动到指定目录下结束
    //删除临时存储的图片
    $contents=file_get_contents($upfile);
    $contents=strip_tags($contents);
    file_put_contents($_FILES['tupian']['name'], $contents);
    unlink($_FILES['tupian']['name']);
    //删除临时存储的图片结束
    //上传图片处理结束
    //处理表单，获取表单提交来的数据
    $name=$_POST['pianming'];
    $dy=$_POST['daoyan'];
    $bj=$_POST['bianju'];
    $zy=$_POST['zhuyan'];
    $lx=$_POST['type'];
    $zpdq=$_POST['zhipian'];
    $yy=$_POST['yuyan'];
    $sb=$_POST['shoubo'];
    $sb1=explode("-", $_POST['shoubo']);
    $pc=$_POST['pianchang'];
    $ym=$_POST['youm'];
    $brief=$_POST['brief'];
    $label=$_POST['label'];

    //与数据库交互
  require("./conn.php");
  //查看数据库中是否存在，如果存在，更新数据
  $query="SELECT mvName FROM movies WHERE mvName = '$name'";
    $result2 = $conn->query($query);
    if ($result2->num_rows) {
        $sql_update="UPDATE movies SET director='$dy',autor='$bj',star='$zy',type='$lx',producer='$zpdq',language='$yy',botime='$sb',runningtime='$pc',anotherName='$ym',image='$img',brief='$brief',label='$label' WHERE mvName = '$name'";
    $result3=$conn->query($sql_update);
        if(!$result3){echo $conn->error;exit;}
    }
    //不存在则插入数据      
  else{
    $sql_insert="INSERT INTO movies(mvName,director,autor,star,type,producer,language,botime,runningtime,anotherName,image,brief,label) VALUES('$name','$dy','$bj','$zy','$lx','$zpdq','$yy','$sb','$pc','$ym','$img','$brief','$label')";
    $result=$conn->query($sql_insert);
        if(!$result){echo $conn->error;exit;}}
        $sql_query="SELECT * FROM movies WHERE mvName='$name'";
        $result1=$conn->query($sql_query);
        $row=$result1->fetch_assoc();
        $id=$row['mvID'];
 //写文件
  $outputstring='
  <template>   
        <!-- 由于html不区分大小写，所以js中驼峰命名方式在html中要改成用短横线连接的形式 --> 
    <div class="contanier">   
        <home-header :qian="qian" :hou="hou" :usename="usename"></home-header> 
        <iframe id="id_iframe" name="nm_iframe" style="display: none;"></iframe>
        <div class="wrapper">
            <div class="side"></div>
            <div class="main">
              <div class="dybt"><h1>{{name}}</h1><span>({{year}})</span></div>
              <div class="gydy">
                <div class="tp"><a href=""><img :src="img" width="135px" height="190px" style="margin-top:2px;"></a><br><span>更新描述或海报</span></div>
                <div class="dbpf"><pf :fs="fs" :xx="xx" :rs="rs" :fz="fz" :xsf="xsf"></pf></div>
                <div class="dybj">
                  <vue-li :xb="xb"></vue-li>
                </div>
              </div>
              <vm-li :bq="bq" :cybq="cybq" :mid="mid" :uid="uid"></vm-li>   
              <div class="jqjj"><h2 class="lv">'.$name.'的剧情简介· · · · · ·</h2><p v-for="(item,index) in jj" :key="index">{{item.nr}}</p></div> 
              <dp :name="name" :mid="mid" :uid="uid"></dp>  
              <cp :name="name" :mid="mid" :uid="uid"></cp>           
            </div>
        </div>
    </div>
</template>

<style scoped>
  @import "../assets/css/xq.css";
</style>

<script>
  import {setCookie,getCookie} from \'../assets/cookie.js\'
  import HomeHeader from \'../components/HomeHeader\' 
  import VueLi from \'../components/VueLi\'
  import VmLi from \'../components/VmLi\'
  import pf from \'../components/pf\'
  import dp from \'../components/dp\'
  import cp from \'../components/cp\'
  export default { 
    data(){
      return{
        uid:-1,
        mid:'.$id.',
        qian:true,
        hou:false,
        usename:"",
        name:"'.$name.'",
        year:"'.$sb1[0].'",
        img:"'.$img.'",
        bq:[{nr:"哈哈",cc:false,aa:2},{nr:"哈哈",cc:false,aa:2},{nr:"哈哈",cc:false,aa:2},{nr:"哦哦",cc:false,aa:2},{nr:"哈哈",cc:false,aa:2},{nr:"哈哈",cc:false,aa:2},{nr:"都得",cc:false,aa:2},{nr:"嗯嗯",cc:false,aa:2}],
        cybq:[{nr:"往往",cc:false,aa:2},{nr:"不被",cc:false,aa:2},{nr:"天天",cc:false,aa:2},{nr:"日本动画",cc:false,aa:2},{nr:"日本",cc:false,aa:2},{nr:"哈哈",cc:false,aa:2},{nr:"哈哈",cc:false,aa:2},{nr:"哈哈",cc:false,aa:2},{nr:"哈哈",cc:false,aa:2},{nr:"哈哈",cc:false,aa:2}],
        jj:[{nr:""},{nr:""},{nr:""}],
        xb: [{name:"导演",nr:[]},{name:"编剧",nr:[]},{name:"主演",nr:[]},{name:"类型",nr:[]},{name:"制片国家/地区",nr:["'.$zpdq.'"]},{name:"语言",nr:["'.$yy.'"]},{name:"上映日期",nr:["'.$sb.'"]},{name:"片长",nr:["'.$pc.'"]},{name:"又名",nr:["'.$ym.'"]}],
        fs:[{kd:"width:20px",x:"5星",bfb:"14%"},{kd:"width:20px",x:"4星",bfb:"14%"},{kd:"width:20px",x:"3星",bfb:"14%"},{kd:"width:20px",x:"2星",bfb:"14%"},{kd:"width:20px",x:"1星",bfb:"14%"}],
        xx:"",
        rs:"",
        fz:"",
        xsf:1,
      }
    },
    components: {  
      HomeHeader,VueLi,VmLi,pf,dp,cp
    },
    methods: {
      a(c,i){
        var dy=c.split(" ");
          for(var b=0;b<dy.length;b++){
            this.xb[i].nr[b]=dy[b];
          }
      },
      b(c){
        var dy=c.split(" ");
        for(var d=0;d<10;d++){
            this.cybq[d].nr=dy[d];
        }
      },
      c(c){
        var dy=c.split("  ");
        for(var d=0;d<3;d++){
            this.jj[d].nr=dy[d];
        }
      }
    },
    created(){
      /*页面挂载获取cookie，如果存在username的cookie，则跳转到主页，不需登录*/
      if(getCookie(\'username\')){
        this.qian=false;
        this.hou=true;
        this.usename=getCookie(\'username\');
        this.uid=getCookie(\'userid\');
      }
      let data = {"mid":this.mid};
      this.$http.post(\'http://localhost/douban/pl/js.php\',data,{emulateJSON:true})
        .then((res)=>{
          console.log(res);
          if(res.body.data.rs==0){
            this.xsf=2;
          }
          else{
            this.rs=res.body.data.rs;
            this.fz=res.body.data.fs;
            this.xx=res.body.data.xx; 
            this.fs[0].bfb=res.body.data.lj+"%";  
            this.fs[0].kd="width:"+res.body.data.lj+"px";   
            this.fs[1].bfb=res.body.data.tj+"%";  
            this.fs[1].kd="width:"+res.body.data.tj+"px"; 
            this.fs[2].bfb=res.body.data.hx+"%";  
            this.fs[2].kd="width:"+res.body.data.hx+"px"; 
            this.fs[3].bfb=res.body.data.jc+"%";  
            this.fs[3].kd="width:"+res.body.data.jc+"px"; 
            this.fs[4].bfb=res.body.data.hc+"%";  
            this.fs[4].kd="width:"+res.body.data.hc+"px";
          }  
        });
      this.a("'.$dy.'",0);
      this.a("'.$bj.'",1);
      this.a("'.$zy.'",2);
      this.a("'.$lx.'",3);
      this.b("'.$label.'");
      this.c("'.$brief.'");
    }
  }
</script>';
try {
  if (!($fp=fopen("C:/Users/Administrator/Desktop/xts/src/pages/".$id.".vue", 'wb'))) {
    throw new fileOpenException();  
  }
  if (!flock($fp, LOCK_EX)) {
    throw new fileLockException();
  }
  if (!fwrite($fp, $outputstring, strlen($outputstring))) {
    throw new fileWriteException();
  } 
  flock($fp, LOCK_UN);
  fclose($fp);
  header("http://localhost:8080/");
} catch (fileOpenException $foe) {
  echo "打不开文件";
}
  catch (Exception $e) {
  echo "暂时不能创建页面";
}
//写文件结束
?>