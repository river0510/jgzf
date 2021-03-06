<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BG</title>
<link rel="stylesheet" href="/jgzf/Public/css/bootstrap.css">

<link rel="stylesheet" href="/jgzf/Public/css/app.css">
<link rel="stylesheet" href="/jgzf/Public/css/form.css">
<style type='text/css'>
@media print {
	.NoPrint {
		display: none;
	}
}
</style>
</head>
<body class="home-template">

	<div class="body-center">
		<div class="content-wrap">
			<div class="row">
				<div class="body-right col-md-9">

					<div class="information"
						style="font-family: bold; padding-top: 10px">
						<p class="in_title" style="text-align: center">
							<b>个人信息登记</b>
						</p>
						<form action="<?php echo U('Home/Rent/personInfoHandle');?>" method="post"
							target="right" class="basic-grey">
							<span>请将以下信息填写完整</span>
							</h1>
							<label> <span>校园卡号：</span> <input type="text"
								name="card_number">
							</label>
							</h1>
							<label> <span>姓名：</span> <input type="text" name="name" maxlength="10">
							</label> <label> <span>性别：</span> <select name="sex"
								onChange="getMan()">
									<option>男</option>
									<option>女</option>
							</select>
							</label> <label> <span>人员类别：</span> <select name="type"
								onChange="getMan()">
								<?php if(is_array($type)): foreach($type as $key=>$t): ?><option><?php echo ($t["name"]); ?></option><?php endforeach; endif; ?>
								</select>
							<span>部门：</span>
							<input type="text" name="department">
							<!-- </label> <label> <span>部门：</span> <select name="department"
								onChange="getMan()">
									<option>物业管理中心</option>
									<option>学生公寓管理中心</option>
									<option>饮食服务中心</option>
									<option>水电管理中心</option>
									<option>维修服务中心</option>
									<option>物资采购与管理中心</option>
									<option>园林绿化中心</option>
									<option>消杀防治中心</option>
									<option>场馆中心</option>
									<option>督导办公室</option>
									<option>党委办公室</option>
							</select> -->
							</label> <label> <span>房租代扣方：</span>  <select name="daikoufang"
								onChange="getMan()">
									<option>工资库代扣</option>
									<option>师院代扣</option>
									<option>附中代扣</option>
									<option>银行代扣</option>
							</select>
							</label> <label> <span>入站时间（博士后填写）：</span> <input type="date"
								name="ruzhan" >
							</label> <label> <span>出站时间（博士后填写）：</span> <input type="date"
								name="chuzhan" >
							</label> <label> <span>电话号码：</span> <input type="text"
								name="phone_number" >
							</label> <label> <span>折扣起始时间：</span> <input type="date"
								name="discount_time"  >
							</label>
							<div class="table-foot NoPrint" style="text-align: center">
								<br>
								<button type="submit" class="btn btn-primary">确定</button>
								<a class="btn btn-primary" href="<?php echo U('Rent/right');?>">返回</a>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="/jgzf/Public/js/jquery.min.js"></script>
	<script src="/jgzf/Public/js/bootstrap.min.js"></script>
</body>
</html>