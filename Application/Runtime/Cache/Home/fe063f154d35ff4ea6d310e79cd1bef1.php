<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>Bootstrap 实例 - 悬停表格</title>
   <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="/Public/css/app.css">
   <script src="/Public/jquery.min.js"></script>
   <script src="/Public/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-hover">
   <caption>教工住宿信息统计表</caption>
   <thead>
      <tr>
      <?php if(is_array($condition1)): foreach($condition1 as $key=>$c): ?><th><?php echo ($c); ?></th><?php endforeach; endif; ?>
      </tr>
   </thead>
   <tbody>
      <?php if(is_array($condition)): foreach($condition as $key=>$sum): ?><td><?php echo ($sum); ?></td><?php endforeach; endif; ?>
   </tbody>
</table>

</body>
</html>