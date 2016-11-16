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
							<b>个人信息修改</b>
						</p>
						<form action="<?php echo U('Home/Rent/modifyPersonHandle');?>" method="post"
							target="right" class="basic-grey">
							<input type="hidden" name="id" value=<?php echo ($personInfo["id"]); ?>>
							<span>请将以下信息填写完整</span>
							</h1>
							<label> <span>校园卡号：</span> <input type="text"
								name="card_number" value=<?php echo ($personInfo["card_number"]); ?>>
							</label>
							</h1>
							<label> <span>姓名：</span> <input type="text" name="name" value=<?php echo ($personInfo["name"]); ?>>
							</label> <label> <span>性别：</span> <select name="sex"
								onChange="getMan()">
									<?php if($personInfo["sex"] == '男'): ?><option selected="selected">男</option>
									<?php else: ?>
									<option >男</option><?php endif; ?>
									<?php if($personInfo["sex"] == '女'): ?><option selected="selected">女</option>
									<?php else: ?>
									<option >女</option><?php endif; ?>
							</select>
							</label> <label> <span>人员类别：</span> <select name="type"
								onChange="getMan()" >
								<?php if(is_array($type)): foreach($type as $key=>$t): if(($t["name"]) == $personInfo["type"]): ?><option selected="selected"><?php echo ($t["name"]); ?></option>
									<?php else: ?><option ><?php echo ($t["name"]); ?></option><?php endif; endforeach; endif; ?>
								</select>
							<span>部门：</span><input type="text" name="department" value=<?php echo ($personInfo["department"]); ?>>
							<!-- </label> <label> <span>部门：</span> <select name="department"
								onChange="getMan()">
									<?php if($personInfo["department"] == '物业管理中心'): ?><option selected="selected">物业管理中心</option>
									<?php else: ?><option >物业管理中心</option><?php endif; ?>
									<?php if($personInfo["department"] == '学生公寓管理中心'): ?><option selected="selected">学生公寓管理中心</option>
									<?php else: ?><option >学生公寓管理中心</option><?php endif; ?>
									<?php if($personInfo["department"] == '饮食服务中心'): ?><option selected="selected">饮食服务中心</option>
									<?php else: ?><option >饮食服务中心</option><?php endif; ?>
									<?php if($personInfo["department"] == '水电管理中心'): ?><option selected="selected">水电管理中心</option>
									<?php else: ?><option >水电管理中心</option><?php endif; ?>
									<?php if($personInfo["department"] == '维修服务中心'): ?><option selected="selected">维修服务中心</option>
									<?php else: ?><option >维修服务中心</option><?php endif; ?>
									<?php if($personInfo["department"] == '物资采购与管理中心'): ?><option selected="selected">物资采购与管理中心</option>
									<?php else: ?><option >物资采购与管理中心</option><?php endif; ?>
									<?php if($personInfo["department"] == '园林绿化中心'): ?><option selected="selected">园林绿化中心</option>
									<?php else: ?><option >园林绿化中心</option><?php endif; ?>
									<?php if($personInfo["department"] == '消杀防治中心'): ?><option selected="selected">消杀防治中心</option>
									<?php else: ?><option >消杀防治中心</option><?php endif; ?>
									<?php if($personInfo["department"] == '场馆中心'): ?><option selected="selected">场馆中心</option>
									<?php else: ?><option >场馆中心</option><?php endif; ?>
									<?php if($personInfo["department"] == '督导办公室'): ?><option selected="selected">督导办公室</option>
									<?php else: ?><option >督导办公室</option><?php endif; ?>
									<?php if($personInfo["department"] == '党委办公室'): ?><option selected="selected">党委办公室</option>
									<?php else: ?>
									<option>党委办公室</option><?php endif; ?>
							</select> -->
							</label> <label> <span>房租代扣方：</span><select name="daikoufang"
								onChange="getMan()">
									<option>工资库代扣</option>
									<option>师院代扣</option>
									<option>附中代扣</option>
									<option>银行代扣</option>
							</select>
							</label> <label> <span>入站时间（博士后填写）：</span> <input type="date"
								name="ruzhan" value=<?php echo ($personInfo["ruzhan_time"]); ?>>
							</label> <label> <span>出站时间（博士后填写）：</span> <input type="date"
								name="chuzhan" value=<?php echo ($personInfo["chuzhan_time"]); ?>>
							</label> <label> <span>电话号码：</span> <input type="text"
								name="phone_number" value=<?php echo ($personInfo["phone_number"]); ?>>
							</label> <label> <span>折扣起始时间：</span> <input type="date"
								name="discount_time" value=<?php echo ($personInfo["discount_time"]); ?>>
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