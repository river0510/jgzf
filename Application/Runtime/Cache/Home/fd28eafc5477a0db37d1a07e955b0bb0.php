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
					<?php echo ($time['y']); ?>年<?php echo ($time['m']); ?>月周转房房租扣缴明细表
				</h1>
				<table class="table table-hover">
					<caption><?php echo ($time['y']); ?>年<?php echo ($time['m']); ?>月周转房房租扣缴明细表</caption>
					<thead>
						<tr>
							<th>序号</th>
							<th>小区名称</th>
							<th>房号</th>
							<th>面积</th>
							<th>校园卡号</th>
							<th>姓名</th>
							<th>租金</th>
							<th>扣缴说明</th>
							<th>入住时间</th>
							<th>备注</th>
						</tr>
					</thead>
					<?php if(is_array($data)): foreach($data as $key=>$n): if(is_array($n)): foreach($n as $key=>$c): ?><tbody>
						<tr>
							<td><?php echo ($key+1); ?></td>
							<td><?php echo ($c['v_name']); ?></td>
							<td><?php echo ($c['house_number']); ?></td>
							<td><?php echo ($c['area']); ?></td>
							<td><?php echo ($c['card_number']); ?></td>
							<td><?php echo ($c['name']); ?></td>
							<td><?php echo ($c['rent']); ?></td>
							<td><?php echo ($c['time']); ?></td>
							<td><?php echo ($c['start_time']); ?></td>
							<td>  </td>
						</tr>
					</tbody><?php endforeach; endif; endforeach; endif; ?>
				</table>

				<div class="table-foot NoPrint" style="text-align: center">
					<a href="/jgzf/index.php/Home/Rent/form2Excel?y=<?php echo ($time['y']); ?>&w=<?php echo ($time['m']); ?>">
						<button type="submit" class="btn btn-primary" style="margin: 10px">导出excel</button></a>
				</div>
</body>
</html>