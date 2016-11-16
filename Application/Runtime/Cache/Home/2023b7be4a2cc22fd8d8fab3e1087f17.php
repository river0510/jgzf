<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="/jgzf/Public/css/bootstrap.css">
<link rel="stylesheet" href="/jgzf/Public/css/app.css">
<script src="/jgzf/Public/jquery.min.js"></script>
<script src="/jgzf/Public/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="bloc" id="content">

		<div class="content-wrap">
			<div class="container">


				<h1>
					<img src="/jgzf/Public/images/icons/posts.png" alt="" /> <?php echo ($time['y']); ?>年<?php echo ($time['m']); ?>月周转房扣缴房租统计表
				</h1>
				<table class="table table-hover">
					<caption><?php echo ($time['y']); ?>年<?php echo ($time['m']); ?>月周转房扣缴房租统计表</caption>
					<thead>
						<tr>
							<th>序号</th>
							<th>小区名称</th>
							<th>工资库代扣人数</th>
							<th>工资库代扣金额</th>
							<th>师院代扣人数</th>
							<th>师院代扣金额</th>
							<th>附中代扣人数</th>
							<th>附中代扣金额</th>
							<th>银行代扣人数</th>
							<th>银行代扣金额</th>
						</tr>
					</thead>
					<?php if(is_array($data)): foreach($data as $key=>$c): ?><tbody>
						<tr>
							<td><?php echo ($key+1); ?></td>
							<td><?php echo ($c["name"]); ?></td>
							<td><?php echo ($c["person1"]); ?></td>
							<td><?php echo ($c["rent1"]); ?></td>
							<td><?php echo ($c["person2"]); ?></td>
							<td><?php echo ($c["rent2"]); ?></td>
							<td><?php echo ($c["person3"]); ?></td>
							<td><?php echo ($c["rent3"]); ?></td>
							<td><?php echo ($c["person4"]); ?></td>
							<td><?php echo ($c["rent4"]); ?></td>
						</tr>
					</tbody><?php endforeach; endif; ?>
				</table>

				<div class="table-foot NoPrint" style="text-align: center">
					<br> <a href="/jgzf/index.php/Home/Rent/form4Excel?y=<?php echo ($time['y']); ?>&w=<?php echo ($time['m']); ?>"><button
							type="submit" class="btn btn-primary">导出excel</button></a>
				</div>
</body>
</html>