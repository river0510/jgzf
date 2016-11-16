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
							<b>小区房租统计表</b>
						</p>
						<span>请输入统计月份:</span>
						<form action="<?php echo U('Home/Rent/form1');?>" method="post"
							id="search" class="search placeholder" target="right">
							<input type="date" name="time" />
							<input type="submit" value="生成各小区租金收付对照统计表" class="submit btn btn-primary" /><br> 
						</form>
						<br>
						<form action="<?php echo U('Home/Rent/form2');?>" method="post" id="search" class="search placeholder" target="right">
							<input type="date" name="time" />
							<input type="submit" value="生成周转房房租扣缴明细表" class="submit btn btn-primary" /><br> 
						</form>
						<br> 
						<form action="<?php echo U('Home/Rent/form5');?>" method="post" id="search" class="search placeholder" target="right">
							<input type="date" name="time" />
							<input type="submit" value="生成周转房房租扣缴明细表(未交租)" class="submit btn btn-primary" /><br> 
						</form>
						<br>
						<form action="<?php echo U('Home/Rent/form3');?>" method="post" id="search" class="search placeholder" target="right">
							<input type="date" name="time" />
							<input type="submit" value="生成房源分类统计表" class="submit btn btn-primary" /><br> 
						</form>
						<br>
						<form action="<?php echo U('Home/Rent/form4');?>" method="post" id="search" class="search placeholder" target="right">
							<input type="date" name="time" />
							<input type="submit" value="生成周转房扣缴房租统计表" class="submit btn btn-primary" /><br> 
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