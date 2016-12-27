<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="/jgzf/Public/css/bootstrap.css">
	<link rel="stylesheet" href="/jgzf/Public/css/app.css">
</head>
<body>
	<div class="bloc" id="content"> 

		<div class="content-wrap">
			<div class="container" style="padding-top: 60px">
				<h1>
					<img src="/jgzf/Public/images/icons/posts.png" alt="" />管理员信息
					<a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#add" style="float:right; margin-left:10px">添加用户</a>
						<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel">添加管理员</h4>
									</div>
									<div class="modal-body">
										<form action="/jgzf/index.php/Home/Admin/add"
											method="post" target="right">
												<div class="form-group">
													<label for="account" class="control-label" style="font-size: 15px">账号:</label>
													<input type="text" maxlength="15" id="account" class="form-control" name="account">
												</div>
												<div class="form-group">
													<label for="pass" class="control-label" style="font-size: 15px">密码:</label>
													<input type="password" name="pass" id="pass" maxlength="10" class="form-control">
												</div>
												<div class="form-group">
													<label for="name" class="control-label" style="font-size: 15px">姓名:</label>
													<input type="text" maxlength="15" id="name" class="form-control" name="name">
												</div>
												<button type="submit" class="btn btn-primary">添加</button>
												<button type="button" class="btn btn-default"
													data-dismiss="modal">取消</button>
										</form>
									</div>
									<div class="modal-footer"></div>
								</div>
							</div>
						</div>
					<a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modify" style="float:right; margin-left:10px">修改密码</a>
						<div class="modal fade" id="modify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel">修改密码</h4>
									</div>
									<div class="modal-body">
										<form action="/jgzf/index.php/Home/Admin/modify"
											method="post" target="right">
												<div class="form-group">
													<label class="control-label" style="font-size: 15px">账号:<?php echo (session('id')); ?></label>
												</div>
												<div class="form-group">
													<label for="pass" class="control-label" style="font-size: 15px">新密码:</label>
													<input type="password" name="pass" id="pass" maxlength="10" class="form-control">
												</div>
												<button type="submit" class="btn btn-primary">修改</button>
												<button type="button" class="btn btn-default"
													data-dismiss="modal">取消</button>
										</form>
									</div>
									<div class="modal-footer"></div>
								</div>
							</div>
						</div>
				</h1>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>序号</th>
							<th>管理员账号</th>
							<th>管理员姓名</th>
							<th>操作</th>
						</tr>
					</thead>
					<?php if(is_array($users)): foreach($users as $key=>$u): ?><tbody>
							<tr>
								<td><?php echo ($key+1); ?></td>
								<td><?php echo ($u["account"]); ?></td>
								<td><?php echo ($u["name"]); ?></td>
								<td >
								<a href="#" data-toggle="modal" data-target=#<?php echo ($u["account"]); ?>>删除</a>
								<div class="modal fade" id=<?php echo ($u["account"]); ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel">删除</h4>
											</div>
											<div class="modal-body">
												<b>管理员账户:<?php echo ($u["account"]); ?></b><br>
												<form action="/jgzf/index.php/Home/Admin/delete"
													method="get" target="right">
														<p>是否确认删除?</p>
														<input name="id" type="hidden" value=<?php echo ($u["account"]); ?>>
														<button type="submit" class="btn btn-primary">确定</button>
														<button type="button" class="btn btn-default"
															data-dismiss="modal">取消</button>
												</form>
											</div>
											<div class="modal-footer"></div>
										</div>
									</div>
								</div>
							</td>
							</tr>
						</tbody><?php endforeach; endif; ?>
				</table>
			</div>
		</div>
	</div>

<script src="/jgzf/Public/js/jquery.min.js"></script>
<!-- <script src="../../../../Public/js/jquery.min.js"></script> -->
<script src="/jgzf/Public/js/bootstrap.min.js"></script>

</body>
</html>