<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="/Public/css/bootstrap.css">
<link rel="stylesheet" href="/Public/css/app.css">
<script src="/Public/jquery.min.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="bloc" id="content">

		<div class="content-wrap">
			<div class="container">


				<h1>
					<img src="/Public/images/icons/posts.png" alt="" /> 房源信息统计报表
				</h1>
				<table class="table table-hover">
					<caption>房源信息统计报表</caption>
					<thead>
						<tr>
							<th>序号</th>
							<th>小区名称</th>
							<th>房号</th>
							<th>面积</th>
							<th>户型</th>
							<th>楼栋</th>
							<th>姓名</th>
							<th>性别</th>
							<th>电话号码</th>
							<th>校园卡号</th>
							<th>部门</th>
							<th>入住时间</th>
							</if>
							<th>状态</th>
						</tr>
					</thead>
					<?php if(is_array($condition)): foreach($condition as $key=>$c): ?><tbody>
						<tr>
							<td><?php echo ($key+1); ?></td>
							<td><?php echo ($c["v_name"]); ?></td>
							<td><?php echo ($c["house_number"]); ?></td>
							<td><?php echo ($c["area"]); ?></td>
							<td><?php echo ($c["style"]); ?></td>
							<td><?php echo ($c["building"]); ?></td>

							<td><?php echo ($c["owner_name"]); ?></td>
							<td><?php echo ($c["sex"]); ?></td>
							<td><?php echo ($c["tel_num"]); ?></td>
							<td><?php echo ($c["card_number"]); ?></td>
							<td><?php echo ($c["department"]); ?></td>
							<td><?php echo ($c["start_time"]); ?></td>
							</if>
							<td><?php echo ($c["state"]); ?></td>
						</tr>
					</tbody><?php endforeach; endif; ?>
				</table>
				<div class="result page" id="fenye1"><?php echo ($page); ?></div>

				<div class="table-foot NoPrint" style="text-align: center">
					<br> <a href="/index.php/Home/Baobiao/excel"><button
							type="submit" class="btn btn-primary">导出excel</button></a>
				</div>
</body>
</html>