<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="/jgzf/Public/css/bootstrap.css">
<link rel="stylesheet" href="/jgzf/Public/css/app.css">
</head>
<body>
	<div class="bloc" id="content">

		<div class="content-wrap">
			<div class="container">


				<h1>
					<img src="/jgzf/Public/images/icons/posts.png" alt="" />房租记录登记
				</h1>
				<table class="table table-hover">
					<caption>租房者信息</caption>
					<thead>
						<tr>
							<th>姓名</th>
							<th>性别</th>
							<th>部门</th>
							<th>初始折扣率</th>
							<th>递增折扣率</th>
							<th>折扣率起始时间</th>
							<th>校园卡号</th>
							<th>电话号码</th>
							<th>操作</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td><?php echo ($personInfo["name"]); ?></td>
							<td><?php echo ($personInfo["sex"]); ?></td>
							<td><?php echo ($personInfo["department"]); ?></td>
							<td><?php echo ($type["start_discount"]); ?></td>
							<td><?php echo ($type["increase_discount"]); ?></td>
							<td><?php echo ($personInfo["discount_time"]); ?></td>
							<td><?php echo ($personInfo["card_number"]); ?></td>
							<td><?php echo ($personInfo["phone_number"]); ?></td>
							<td><a href="modifyPerson?id=<?php echo ($personInfo["id"]); ?>">修改</a></td>
						</tr>
					</tbody>

				</table>
				<table class="table table-hover">
					<caption>租房信息</caption>
					<thead>
						<tr>
							<th>小区</th>
							<th>楼栋</th>
							<th>房号</th>
							<th>入住时间</th>
							<th>操作</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td><?php echo ($houseInfo["v_name"]); ?></td>
							<td><?php echo ($houseInfo["building"]); ?></td>
							<td><?php echo ($houseInfo["house_number"]); ?></td>
							<td><?php echo ($houseInfo["start_time"]); ?></td>
							<td><a href="rentPay?card_number=<?php echo ($personInfo["card_number"]); ?>">当前交租记录</a>
								&nbsp;/&nbsp; 
								
								<a href="#" data-toggle="modal" data-target=#time>指定日期交租记录</a>  <!-- Modal -->
								<div class="modal fade" id=time tabindex="-1" role="dialog"
									aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
												</button>
												<h4 class="modal-title" id="myModalLabel">选择日期：</h4>
											</div>
											<div class="modal-body">
												<form action="rentPay" method="get" target="right">
													<br> <span style="margin-left: 30px; margin-top: 10px">
														<br> <input name="card_number" type="hidden" value=<?php echo ($personInfo["card_number"]); ?>>
														<br> <input type="date" name="time"/>
														<button type="submit" class="btn btn-primary">确定</button>
														<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
												</form>
											</div>
											<div class="modal-footer"></div>
										</div>
									</div>
								</div>
							</td>
						</tr>
					</tbody>

				</table>

				<div class="table-foot NoPrint" style="text-align: center">
					<br>
				</div>
				<script src="/jgzf/Public/js/jquery.min.js"></script>
		<script src="../../../../Public/js/jquery.min.js"></script>
		<script src="/jgzf/Public/js/bootstrap.min.js"></script>
</body>
</html>