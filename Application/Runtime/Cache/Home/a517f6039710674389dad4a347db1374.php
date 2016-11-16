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
					<img src="/jgzf/Public/images/icons/posts.png" alt="" />
					<?php echo ($time['y']); ?>年<?php echo ($time['m']); ?>月房源分类统计表
				</h1>
				<table class="table table-hover">
					<caption><?php echo ($time['y']); ?>年<?php echo ($time['m']); ?>月房源分类统计表</caption>
					<thead>
						<tr>
							<th>房源类别</th>
							<th>小区名称</th>
							<th>单价</th>
							<th>总套数</th>
							<th>入住套数</th>
							<th>收入</th>
							<th>支出</th>
							<th>实际金额</th>
						</tr>
					</thead>
					<tbody>
					<?php if(is_array($data)): foreach($data as $key=>$n): if(is_array($n)): foreach($n as $key=>$c): ?><tbody>
						<tr>
							<td><?php echo ($c['type']); ?></td>
							<td><?php echo ($c['name']); ?></td>
							<td><?php echo ($c['price']); ?></td>
							<td><?php echo ($c['totalHouse']); ?></td>
							<td><?php echo ($c['usedHouse']); ?></td>
							<td><?php echo ($c['rent']); ?></td>
							<td><?php echo ($c['expense']); ?></td>
							<td><?php echo ($c['differ']); ?></td>
						</tr>
						</tbody><?php endforeach; endif; endforeach; endif; ?>
						<tbody>
						<tr>
							<td><?php echo ($total['type']); ?></td>
							<td><?php echo ($total['name']); ?></td>
							<td><?php echo ($total['price']); ?></td>
							<td><?php echo ($total['totalHouse']); ?></td>
							<td><?php echo ($total['usedHouse']); ?></td>
							<td><?php echo ($total['rent']); ?></td>
							<td><?php echo ($total['expense']); ?></td>
							<td><?php echo ($total['differ']); ?></td>
						</tr>
						</tbody>
				</table>

				<div class="table-foot NoPrint" style="text-align: center">
					<br> <a href="/jgzf/index.php/Home/Rent/form3Excel?y=<?php echo ($time['y']); ?>&w=<?php echo ($time['m']); ?>">
						<button type="submit" class="btn btn-primary">导出excel</button></a>
				</div>
</body>
</html>