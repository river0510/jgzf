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
					<img src="/jgzf/Public/images/icons/posts.png" alt="" />小区信息
				</h1>
				<table class="table table-hover">
					<caption>小区信息</caption>
					<thead>
						<tr>
							<th>名称</th>
							<th>房源种类</th>
							<th>每平米每月租金</th>
							<th>学校收入</th>
							<th>学校支出</th>
							<th>管理费</th>
							<th>其他费用</th>
							<th>操作</th>
						</tr>
					</thead>

					<?php if(is_array($xiaoqu)): foreach($xiaoqu as $key=>$n): ?><tbody>
						<tr>
							<td><?php echo ($n["name"]); ?></td>
							<td><?php echo ($n["type"]); ?></td>
							<td><?php echo ($n["rent"]); ?></td>
							<td><?php echo ($n["income"]); ?></td>
							<td><?php echo ($n["expenditure"]); ?></td>
							<td><?php echo ($n["manage"]); ?></td>
							<td><?php echo ($n["others"]); ?></td>
							<td ><a href="#"
								data-toggle="modal" data-target=#<?php echo ($n["id"]); ?>>修改</a>
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
												<b>小区名称:<?php echo ($n["name"]); ?></b><br>
												<form action="/jgzf/index.php/Home/Rent/xiaoquModifyHandle"
													method="post" target="right">
													<label> <span>房源种类：</span> <select name="type"
													onChange="getMan()">
													<?php if(($n["type"] == '政府')): ?><option selected="selected">政府</option>
													<?php else: ?><option >政府</option><?php endif; ?>
													<?php if(($n["type"] == '区政府')): ?><option selected="selected">区政府</option>
													<?php else: ?><option >区政府</option><?php endif; ?>
													<?php if(($n["type"] == '自有')): ?><option selected="selected">自有</option>
													<?php else: ?><option >自有</option><?php endif; ?>
													<?php if(($n["type"] == '社会')): ?><option selected="selected">社会</option>
													<?php else: ?><option >社会</option><?php endif; ?>
													</select>
													</label><br>
													每月租金（每平米）:<input name="rent" value=<?php echo ($n["rent"]); ?>><br>
													学校收入:<input name="income" value=<?php echo ($n["income"]); ?>><br>
													学校支出:<input name="expenditure" value=<?php echo ($n["expenditure"]); ?>><br>
													管理费:<input name="manage" value=<?php echo ($n["manage"]); ?>><br>
													其他费用:<input name="others" value=<?php echo ($n["others"]); ?>><br>
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
								/<a href="xiaoquDelete?id=<?php echo ($n["id"]); ?>">删除</a>
							</td>
						</tr>
					</tbody><?php endforeach; endif; ?>
				</table>
				<div class="table-foot NoPrint" style="text-align: center">
					<br> <a href="#" data-toggle="modal" data-target=#1>
					<button type="submit" class="btn btn-primary">添加新小区</button></a>
					<div class="modal fade" id=1 tabindex="-1" role="dialog"
									aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel">添加小区：</h4>
											</div>
											<div class="modal-body">
												<form action="/jgzf/index.php/Home/Rent/xiaoquAdd"
													method="post" target="right">
													小区名称:<input name="name" ><br>
													<label> <span>房源种类：</span> <select name="type"
													onChange="getMan()">
													<option value="0"></option>
													<option>政府</option>
													<option>区政府</option>
													<option>自有</option>
													<option>社会</option>
													</select>
													</label><br>
													每月租金（每平米）:<input name="rent" ><br>
													学校收入:<input name="income" ><br>
													学校支出:<input name="expenditure" ><br>
													管理费:<input name="manage" ><br>
													其他费用:<input name="others" ><br>
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