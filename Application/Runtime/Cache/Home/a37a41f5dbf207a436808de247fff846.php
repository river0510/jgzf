<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/jgzf/Public/css/bootstrap.css">
<link rel="stylesheet" href="/jgzf/Public/css/app.css">
<link rel="stylesheet" href="/jgzf/Public/css/form.css">
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<div style="padding: 60px">
<form form method="post" action="/jgzf/index.php/Home/People/importHandle" enctype="multipart/form-data" class="basic-grey" >
	<h1><b>导入Excel表：</b><br><br>
<span>请选择一个Excel文件</span>
</h1>
      
      <label><input  type="file" name="file_stu" />
<div class="table-foot NoPrint" style="text-align: center">
<br>
<button type="submit" class="btn btn-primary">导入</button>
<br>
<br>
<b>请按下列格式进行导入</b>
<br>
<img alt="" src="/jgzf/Public/images/peopleinfo.png" width="700px" height="80px">
</div>

</form>
</div>
</body>
</html>