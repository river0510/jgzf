<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BG</title>
    <link rel="stylesheet" href="/jgzf/Public/css/bootstrap.css">
    <link rel="stylesheet" href="../../../../Public/css/bootstrap.css">
    <link rel="stylesheet" href="../../../../Public/css/app.css">
    <link rel="stylesheet" href="/jgzf/Public/css/app.css">
</head>
<body> 
<div class="bloc" id="content">

    <div class="content-wrap">
    <div class="container">
                <h1><img src="/jgzf/Public/images/icons/posts.png" alt="" /> 房源信息</h1>
                <span>总记录：<?php echo ($count); ?>条</span>
                <table class="table table-striped table-hover">
                    <thead>
           
                    <tr>
                        <th>序号</th>
                        <th>地址</th>
                        <th>楼栋</th>
                        <th>房号</th>
                        <th>户型</th>
                        <!-- <th>收费标准</th> -->
                        <th>姓名</th>
                        <th>部门</th>
                        <th>面积</th>
                        <th>状态</th>
                        <th style="text-align: center">操作</th>
                    </tr>
                    </thead>
                
                	<?php if(is_array($name)): foreach($name as $key=>$n1): ?><tbody>
                    <tr>
                        <td><?php echo ($key+1); ?></td>
                        <td><?php echo ($n1["v_name"]); ?></td>
                        <td><?php echo ($n1["building"]); ?></td>
                        <td><?php echo ($n1["house_number"]); ?></td>
                        <td><?php echo ($n1["style"]); ?></td>
                        <!-- <td><?php echo ($n1["charge_standard"]); ?></td> -->
                        <td><?php echo ($n1["owner_name"]); ?></td>
                        <td><?php echo ($n1["department"]); ?></td>
                        <td><?php echo ($n1["area"]); ?></td>
                        <td><?php echo ($n1["state"]); ?></td>
                        <td>
                        	<a href="/jgzf/index.php/Home/House/change?id=<?php echo ($n1["id"]); ?>">修改</a>
                        	<a href="/jgzf/index.php/Home/House/delete?id=<?php echo ($n1["id"]); ?>">删除</a>
                        </td>
                    </tr>
                    </tbody><?php endforeach; endif; ?>
                
                </table>
               <div class="result page" id="fenye1"><?php echo ($page); ?></div>
             
			
            </div>
      
    </div>
</div>

<script src="/jgzf/Public/js/jquery.min.js"></script>
<script src="../../../../Public/js/jquery.min.js"></script>
<script src="../../../../Public/js/bootstrap.min.js"></script>
<script src="/jgzf/Public/js/bootstrap.min.js"></script>

</body>
</html>