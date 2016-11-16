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
					
					<form action="/jgzf/index.php/Home/House/change_method" method = "POST" class="basic-grey">
						<span>请根据需要修改下列信息</span>
					</h1>
					<input value =<?php echo ($name[0]['id']); ?> name="id" type ="hidden">
					<label>
						<span>小区名称:</span><input value =<?php echo ($name[0]['v_name']); ?> name="cun">
					</label>
					<label>
						<span>楼栋:</span><input name = "loudong" value =<?php echo ($name[0]['building']); ?>>
					</label>
					<label>
						<span>房号:</span><input name = "number" value =<?php echo ($name[0]['house_number']); ?>>
						<span>面积:</span><input name = "area" value =<?php echo ($name[0]['area']); ?>>
						<span>户型:</span><input value =<?php echo ($name[0]['style']); ?> name="huxing">
						<span>部门:</span><select name = "department">
						<optio><?php echo ($name[0]['department']); ?></option>
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
						<span>收费标准:</span><input name = "charge_standard" value =<?php echo ($name[0]['charge_standard']); ?>>
						<span>房源状态:</span> <select name="state"	onChange="getMan()" style ="width:150px">
						<option value=<?php echo ($name[0]['state']); ?>><?php echo ($name[0]['state']); ?></option>

						<option>在用</option>
						<option>闲置</option>
					</select>
				</label>
				<div class="table-foot NoPrint" style="text-align: center">
					<br>
					<button type="submit" class="btn btn-primary" onClick="return confirm('是否确定修改?')">保存</button>
					<a class="btn btn-primary" href="<?php echo U('Home/House/search');?>">返回</a>
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