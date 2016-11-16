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
            .NoPrint { display: none; }
        }
    </style>
</head>
<body class="home-template">

<div class="body-center">
    <div class="content-wrap">
        <div class="row">
            <div class="body-right col-md-9">

                <div class="information"style="font-family: bold;padding-top: 10px">
                    <p class="in_title" style="text-align: center"><b>搜索条件</b></p>
                   <span>请输入卡号搜索住房信息</span>
</h1>
						<form action="<?php echo U('Home/Rent/rentRecord');?>" method="post"  id="search" class="search placeholder" target="right">
                    		
                    		<input type="text" name="card_number" placeholder="请输入校园卡号" class="text"/>
                    		<input type="submit" value="确定" class="submit"/>
                		</form>
						<br/>
						<a href="personInfo">登记个人信息</a>

				</div>
			</div>
		</div>
	</div>
</div>





							

	<script src="/jgzf/Public/js/jquery.min.js"></script>
	<script src="/jgzf/Public/js/bootstrap.min.js"></script>
</body>
</html>