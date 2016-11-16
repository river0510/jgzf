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
					<img src="/jgzf/Public/images/icons/posts.png" alt="" />人员信息
				</h1>
				<table class="table table-hover">
					<caption>人员信息</caption>
					<thead>
						<tr>
							<th>类别/单位</th>
							<th>初始折扣率</th>
							<th>递增折扣率</th>
							<th>最终折扣率</th>
							<th>操作</th>
						</tr>
					</thead>

					<?php if(is_array($type)): foreach($type as $key=>$n): ?><tbody>
						<tr>
							<td><?php echo ($n["name"]); ?></td>
							<td><?php echo ($n["start_discount"]); ?></td>
							<td><?php echo ($n["increase_discount"]); ?></td>
							<td><?php echo ($n["max_discount"]); ?></td>
							<td ><a href="#"
								data-toggle="modal" data-target=#<?php echo ($n["id"]); ?>>修改</a>
								/<a href="typeDelete?id=<?php echo ($n["id"]); ?>">删除</a>
								<div class="modal fade" id=<?php echo ($n["id"]); ?> tabindex="-1" role="dialog"
									aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel">修改信息：</h4>
											</div>
											<div class="modal-body">
												<b>人员类别:<?php echo ($n["name"]); ?></b><br>
												<form action="/jgzf/index.php/Home/Rent/typeModifyHandle"
													method="post" target="right">
													初始折扣率:<input name="start_discount" value=<?php echo ($n["start_discount"]); ?>><br>
													递增折扣率:<input name="increase_discount" value=<?php echo ($n["increase_discount"]); ?>><br>
													最终折扣率:<input name="max_discount" value=<?php echo ($n["max_discount"]); ?>><br>
													<br> <span style="margin-left: 30px; margin-top: 10px">
														<br> <input name="id" type="hidden" value=<?php echo ($n["id"]); ?>>
														<button type="submit" class="btn btn-primary">确定</button>
														<button type="button" class="btn btn-default"
															data-dismiss="modal">取消</button>
												</form>
											</div>
											<div class="modal-footer"></div>
										</div>
									</div>
								</div></td>
						</tr>
					</tbody><?php endforeach; endif; ?>
				</table>
				<div class="table-foot NoPrint" style="text-align: center">
					<br> <a href="#" data-toggle="modal" data-target=#0>
					<button type="submit" class="btn btn-primary">添加新人员类别</button></a>
					<div class="modal fade" id=0 tabindex="-1" role="dialog"
									aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel">添加新人员类别：</h4>
											</div>
											<div class="modal-body">
												<form action="/jgzf/index.php/Home/Rent/typeAdd"
													method="post" target="right">
													人员类别:<input name="type" ><br>
													初始折扣率:<input name="start" ><br>
													递增折扣率:<input name="increase" ><br>
													最终折扣率:<input name="max" ><br>
													<br> <span style="margin-left: 30px; margin-top: 10px">
														<br> <input name="id" type="hidden" value=<?php echo ($n["id"]); ?>>
														<button type="submit" class="btn btn-primary">确定</button>
														<button type="button" class="btn btn-default"
															data-dismiss="modal">取消</button>
												</form>
											</div>
											<div class="modal-footer"></div>
										</div>
									</div>
					</div>
				</div>
				<div class="table-foot NoPrint" style="text-align: center">
					<br>
				</div>

				<script src="/jgzf/Public/js/jquery.min.js"></script>
				<script src="../../../../Public/js/jquery.min.js"></script>
				
				<script src="/jgzf/Public/js/bootstrap.min.js"></script>
</body>
</html>