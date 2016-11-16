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
                    <p class="in_title" style="text-align: center"><b>批量自动交租</b></p>
                  		<form action="/jgzf/index.php/Home/Rent/autoRentHandle" method="post"
							id="search" class="search placeholder" target="right">
							<p style="color:red; font-size: 20px;font-weight: 700;">注：批量自动交租只针对 工资库代扣、师院代扣、附中代扣</p>
							<input type="hidden" name="time" />
							<input type="submit" value="当月批量交租" class="submit" /><br> 
						</form><br/>
						<form action="/jgzf/index.php/Home/Rent/autoRentHandle" method="post"
							id="search" class="search placeholder" target="right">
							<input type="date" name="time" />
							<input type="submit" value="指定日期批量交租" class="submit" />
						</form><br>
						
						

				</div>
			</div>
		</div>
	</div>
</div>





							

	<script src="/jgzf/Public/js/jquery.min.js"></script>
	<script src="/jgzf/Public/js/bootstrap.min.js"></script>
</body>
</html>