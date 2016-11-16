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
					<img src="/jgzf/Public/images/icons/posts.png" alt="" /> <?php echo ($time['y']); ?>年<?php echo ($time['m']); ?>月各小区租金收付对照统计表
				</h1>
				<table class="table table-hover">
					<caption><?php echo ($time['y']); ?>年<?php echo ($time['m']); ?>月各小区租金收付对照统计表</caption>
					<thead>
						<tr>
							<th>序号</th>
							<th>小区名称</th>
							<th>入住套数</th>
							<th>收回租金（月/元）</th>
							<th>支出租金（月/元）</th>
							<th>管理费（月/元）</th>
							<th>备注</th>
						</tr>
					</thead>
					<?php if(is_array($data)): foreach($data as $key=>$c): ?><tbody>
						<tr>
							<td><?php echo ($key+1); ?></td>
							<td><?php echo ($c["name"]); ?></td>
							<td><?php echo ($c["number"]); ?></td>
							<td><?php echo ($c["rent"]); ?></td>
							<td><?php echo ($c["expense"]); ?></td>
							<td><?php echo ($c["manage"]); ?></td>
							<td><?php echo ($c["others"]); ?></td>
						</tr>
					</tbody><?php endforeach; endif; ?>
					<tbody>
						<tr>
							<td> </td>
							<td>合计</td>
							<td></td>
							<td><?php echo ($total["rent"]); ?></td>
							<td><?php echo ($total["expense"]); ?></td>
							<td><?php echo ($total["manage"]); ?></td>
							<td><?php echo ($total["others"]); ?></td>
							<td> </td>
						</tr>
					</tbody>
					<tfoot><tr><td>合计差额：</td><td><?php echo ($total["differ"]); ?></td></tr></tfoot>
				</table>

				<div class="table-foot NoPrint" style="text-align: center">
					<br> <a href="/jgzf/index.php/Home/Rent/form1Excel"><button
							type="submit" class="btn btn-primary">导出excel</button></a>
				</div>
</body>
</html>