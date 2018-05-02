<html>
<head>
  <title>上传电影信息</title>
  <link rel="stylesheet" type="text/css" href="../css/base.css">
  <link rel="stylesheet" type="text/css" href="../css/scdy.css">
</head>
<body>
  <header>
    <div class="wrapper">
        <h1 class="logo">
          豆瓣电影
        </h1>
    </div>
  </header>
    <main>
      <div class="wrapper">
        <form action="scs.php" method="post" enctype="multipart/form-data">
        <div class="side">
          <div class="biaodan">
            
              <div><label>上映日期</label><input type="text" name="shoubo"></div>
              <div><label>片长</label><input type="text" name="pianchang"></div>
              <div><label>又名</label><input type="text" name="youm"></div>
              <div><label>海报</label><input type="file" name="tupian" multiple="multiple"></div>
              <div><label>标签</label><input type="text" name="label"></div>
              <div><label>剧情简介</label><textarea name="brief" rows="5"></textarea></div>
              <div><label></label><button class="btn" type="submit" name="register">提交</button></div>
            
          </div>
        </div>
        <div class="main">
          <h1 style="color: #9DCFE0; margin-left: 15px;">上传电影信息</h1>
          <div class="biaodan">
            
              <div><label>片名</label><input type="text" name="pianming"></div>
              <div><label>导演</label><input type="text" name="daoyan"></div>
              <div><label>编剧</label><input type="text" name="bianju"></div>
              <div><label>主演</label><input type="text" name="zhuyan"></div>
              <div><label>类型</label><input type="text" name="type"></div>
              <div><label>制片国家/地区</label><input type="text" name="zhipian"></div>
              <div><label>语言</label><input type="text" name="yuyan"></div>
            
          </div>
        </div>
      </form>
      </div>
    </main>
</body>
</html>
