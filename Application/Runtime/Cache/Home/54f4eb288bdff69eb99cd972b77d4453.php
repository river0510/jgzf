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
					<img src="/jgzf/Public/images/icons/posts.png" alt="" />房租记录
				</h1>
				<table class="table table-hover">
					<caption>房租记录</caption>
					
					<thead>
						<tr>
							<th>缴费月份</th>
							<th>姓名</th>
							<th>校园卡号</th>
							<th>住房地址</th>
							<th>缴费起始时间</th>
							<th>缴费结束时间</th>
							<th>缴费金额</th>
							<th>缴费状态</th>
							<th>经办人</th>
							<th>操作</th>
						</tr>
					</thead>

					<?php if(is_array($record)): foreach($record as $key=>$c): ?><tbody>
						<tr>
							<td><?php echo ($c["month"]); ?></td>
							<td><?php echo ($info["owner_name"]); ?></td>
							<td><?php echo ($c["card_number"]); ?></td>
							<td><?php echo ($info["v_name"]); echo ($info["building"]); echo ($info["house_number"]); ?></td>
							<td><?php echo ($c["start_time"]); ?></td>
							<td><?php echo ($c["end_time"]); ?></td>
							<td><?php echo ($c["rent"]); ?></td>
							<td><?php echo ($c["status"]); ?></td>
							<td><?php echo ($c["res_person"]); ?></td>
							<td style="text-align: center"><a href="#"
								data-toggle="modal" data-target=#<?php echo ($c["id"]); ?>3>修改</a>&nbsp;
								<div class="modal fade" id=<?php echo ($c["id"]); ?>3 tabindex="-1" role="dialog"
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
												<b>缴费信息：</b><br> 姓名:<?php echo ($info["owner_name"]); ?><br>
												校园卡号:<?php echo ($c["card_number"]); ?><br>
												退宿地址:<?php echo ($info["v_name"]); echo ($info["building"]); echo ($info["house_number"]); ?><br>
												缴费金额:<?php echo ($c["rent"]); ?><br>
												<br>
												<form action="/jgzf/index.php/Home/Rent/rentPayModify" method="post"
													target="right">
													缴费结束时间:<input type="date" name="end_time" value=<?php echo ($c["end_time"]); ?>><br> <br>
													<span style="margin-left: 30px; margin-top: 10px"> <br>
														<input name="id" type="hidden" value=<?php echo ($c["id"]); ?>> <input
														name="card_number" type="hidden" value=<?php echo ($c["card_number"]); ?>>
														<input name="start_time" type="hidden" value=<?php echo ($c["start_time"]); ?>>
														<button type="submit" class="btn btn-primary">确定</button>
														<button type="button" class="btn btn-default"
															data-dismiss="modal">取消</button>
												</form>
											</div>
											<div class="modal-footer"></div>
										</div>
									</div>
								</div> <?php if($c["status"] == '已交'): ?><a href="#"
									data-toggle="modal" data-target=#<?php echo ($c["id"]); ?>2>撤销缴费</a><?php endif; ?> <!-- Modal -->
								<div class="modal fade" id=<?php echo ($c["id"]); ?>2 tabindex="-1" role="dialog"
									aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel">撤销缴费：</h4>
											</div>
											<div class="modal-body">
												<b>缴费信息：</b><br> 姓名:<?php echo ($info["owner_name"]); ?><br>
												校园卡号:<?php echo ($c["card_number"]); ?><br>
												退宿地址:<?php echo ($info["v_name"]); echo ($info["building"]); echo ($info["house_number"]); ?><br>
												缴费金额:<?php echo ($c["rent"]); ?><br>
												<br>
												<form action="/jgzf/index.php/Home/Rent/rentPayBackout"
													method="post" target="right">
													<br> <span style="margin-left: 30px; margin-top: 10px">
														<br> <input name="id" type="hidden" value=<?php echo ($c["id"]); ?>>
														<button type="submit" class="btn btn-primary">确定</button>
														<button type="button" class="btn btn-default"
															data-dismiss="modal">取消</button>
												</form>
											</div>
											<div class="modal-footer"></div>
										</div>
									</div>
								</div> <?php if($c["status"] == '未交'): ?><a href="#"
									data-toggle="modal" data-target=#<?php echo ($c["id"]); ?>1> 缴费 </a><?php endif; ?> <!-- Modal -->
								<div class="modal fade" id=<?php echo ($c["id"]); ?>1 tabindex="-1" role="dialog"
									aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel">缴费：</h4>
											</div>
											<div class="modal-body">
												<b>缴费信息：</b><br> 姓名:<?php echo ($info["owner_name"]); ?><br>
												校园卡号:<?php echo ($c["card_number"]); ?><br>
												退宿地址:<?php echo ($info["v_name"]); echo ($info["building"]); echo ($info["house_number"]); ?><br>
												缴费金额:<?php echo ($c["rent"]); ?><br>
												<br>
												<form action="/jgzf/index.php/Home/Rent/rentPayHandle" method="post"
													target="right">
													经办人:<input name="res_person"><br> <br> <span
														style="margin-left: 30px; margin-top: 10px"> <br>
														<input name="id" type="hidden" value=<?php echo ($c["id"]); ?>>
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
					<br>
				</div>
		<script src="/jgzf/Public/js/jquery.min.js"></script>
		<script src="../../../../Public/js/jquery.min.js"></script>
		<script src="/jgzf/Public/js/bootstrap.min.js"></script>
</body>
</html>