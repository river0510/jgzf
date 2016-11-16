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
					<img src="/jgzf/Public/images/icons/posts.png" alt="" />房源信息
				</h1>

				<table class="table table-striped table-hover">
					<thead>

						<tr>

							<th>地址</th>
							<th>楼栋</th>
							<th>房号</th>
							<th>姓名</th>
							<th>部门</th>
							<th>面积</th>
							<th>状态</th>
							<th style="text-align: center">操作</th>
						</tr>
					</thead>

					<?php if(is_array($name)): foreach($name as $key=>$n1): ?><tbody>
							<tr>

								<td><?php echo ($n1["v_name"]); ?></td>
								<td><?php echo ($n1["building"]); ?></td>
								<td><?php echo ($n1["house_number"]); ?></td>
								<td><?php echo ($n1["owner_name"]); ?></td>
								<td><?php echo ($n1["department"]); ?></td>
								<td><?php echo ($n1["area"]); ?></td>
								<td><?php echo ($n1["state"]); ?></td>
								<td style="text-align: center"><a
									href="/jgzf/index.php/Home/User/look?id=<?php echo ($n1["id"]); ?>" target="right">
									查看 </a> 
									<?php if($n1["state"] == '在用'): ?><a href="#" data-toggle="modal" data-target=#<?php echo ($n1["id"]); ?>_leave>
											退房 </a><?php endif; ?>

											<div class="modal fade" id=<?php echo ($n1["id"]); ?>_leave tabindex="-1"
											role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title" id="myModalLabel">请填写下面信息：</h4>
												</div>
												<div class="modal-body">
													<b>退宿人信息：</b><br> 用户姓名:<?php echo ($n1["owner_name"]); ?><br>
													校园卡号:<?php echo ($n1["card_number"]); ?><br>
													退宿地址:<?php echo ($n1["v_name"]); echo ($n1["building"]); echo ($n1["house_number"]); ?><br>
													<form style="margin-top: 30px"
													action="/jgzf/index.php/Home/User/leave" method="post"
													target="right">
													退宿原因：<input name="reason"><br> <input
													name="id" type="hidden" value=<?php echo ($n1["id"]); ?>><br> <span
													style="margin-left: 17px; margin-top: 10px">批准人：</span><input
													name="admit_man"><br> <br> <br>
													<button type="submit" class="btn btn-primary">确定</button>
													<button type="button" class="btn btn-default"
													data-dismiss="modal">取消</button>

												</form>
											</div>
											<div class="modal-footer"></div>
										</div>
									</div>
								</div> 
								<?php if($n1["state"] == '闲置'): ?><a href="#" data-toggle="modal" data-target=#<?php echo ($n1["id"]); ?>1> 分配 </a><?php endif; ?> <!-- Modal -->
								<div class="modal fade" id=<?php echo ($n1["id"]); ?>1 tabindex="-1" role="dialog"
								aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel">提示：</h4>
									</div>
									<div class="modal-body">
										<form action="/jgzf/index.php/Home/User/give" method="post"
										target="right">
										请输入校园卡号:<input id="num" name="num"><br><span id="numJudge"></span>
										<br> <span style="margin-left: 30px; margin-top: 10px">请输入姓名:</span><input
										name="name" id="name"><br>
										<br> <span
										style="margin-right: 80px; margin-top: 10px"> 选择性别:<select
										name="sex">

										<option value="男">男</option>
										<option value="女">女</option>
									</select></span><br>
									<br> <span style="margin-left: 33px; margin-top: 10px">
									请输入部门:</span><input name="department" id="department"><br>
									<br> <span style="margin-left: 5px; margin-top: 10px">请输入电话号码:</span><input
									name="tel_num" id="tel_num"><br>
									<br> <span style="margin-left: 21px; margin-top: 10px">
									请输入批准人:</span><input name="admit_man"><br>
									<br> <input name="id" type="hidden" value=<?php echo ($n1["id"]); ?>>
									<button type="submit" class="btn btn-primary" id="submitButton">确定</button>
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
<div class="result page" id="fenye1"><?php echo ($page); ?></div>

</div>

</div>
</div>
<script src="/jgzf/Public/js/jquery.min.js"></script>
<!-- <script src="../../../../Public/js/jquery.min.js"></script> -->
<script src="/jgzf/Public/js/bootstrap.min.js"></script>
<script type="text/javascript">
		// ajax判断输入的卡号是否登记
		// $data = array(
  //               'status'=>1,    状态1 =>已登记, 0 => 未登记
  //               'name'=>$result['name'],  姓名
  //               'department'=>$result['department'],  部门
  //               'phone'=>$result['phone_number']  电话号码
  //           );
		$(document).ready(function(){
			$('#num').focusout(function() {
				var u = "<?php echo U('Index/nameJudge');?>"
				$.ajax({
					url: u,
					type: 'GET',
					dataType: 'json',
					data: {card_number: $('#num').val()},
				})
				.done(function(data) {
					if(data.status==1){
						$('#name').val(data.name);
						$('#department').val(data.department);
						$('#tel_num').val(data.phone);
						$('#numJudge').html("个人信息已登记");
						$('#numJudge').css('color','green');
						$('#submitButton').show();
					}else if(data.status == 0){
						$('#name').val("");
						$('#department').val("");
						$('#tel_num').val("");
						$('#numJudge').html("个人信息尚未登记！请先前往房租管理=>个人信息登记");
						$('#numJudge').css('color','red');
						$('#submitButton').hide();
					}else if(data.status == 2){
						$('#name').val("");
						$('#department').val("");
						$('#tel_num').val("");
						$('#numJudge').html("该人员已分配房屋");
						$('#numJudge').css('color','red');
						$('#submitButton').hide();
					}
				})
				.error(function() {
					$('#numJudge').html("连接失败");
				});
			});
		});
	</script>
</body>
</html>