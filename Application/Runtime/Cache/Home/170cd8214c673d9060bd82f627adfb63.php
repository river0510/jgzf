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
							<b>查询条件</b>
						</p>
						<form action="<?php echo U('Home/Tongji/data');?>" method = "POST" class="basic-grey">
<span>请将以下信息填写完整</span>
</h1>
<label>
<span>部门：</span> <select
								name="department" onChange="getMan()">
								<option value="0"></option>
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
							</select>
</label>
<label>
<span>小区名称：</span> <select
								name="v_name" onChange="getMan()">

								<option value="0"></option>
								<?php if(is_array($name)): foreach($name as $key=>$n): ?><option><?php echo ($n["v_name"]); ?></option><?php endforeach; endif; ?>
							</select> 
</label>
<label>
<span>楼栋号码：</span><input type="text"
								name="building">
</label>
<p style="text-align: center">
								<b>登记时间</b>
							</p>
<label>
<span>起始时间:</span><input type="date" name="s_time" style="width:150px"><br><span>结束时间:</span>
<input type="date" name="e_time" style="width:150px"><br> 
<span>房源状态：</span> <select name="state"
								onChange="getMan()" style ="width:150px">
								<option value="0"></option>

								<option>在用</option>
								<option>闲置</option>
							</select>
</label>
							<div class="table-foot NoPrint" style="text-align: center">
								<br>
								<button type="submit" class="btn btn-primary">确定</button>
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