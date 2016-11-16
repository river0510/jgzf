<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BG</title>
    <link rel="stylesheet" href="/jgzf/Public/css/bootstrap.css">
    <link rel="stylesheet" href="/jgzf/Public/css/app.css">
</head>
<body class="home-template">
<div class="body-center">
    <div class="content-wrap">
        <div class="row">
            <div class="body-right col-md-9">
                <div class="table-title">
                    <span><b>房间信息</b></span>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
           
                    <tr>
                        <th>序号</th>
                        <th>小区名称</th>
                        <th>楼栋</th>
                        <th>房号</th>
                        <th>户型</th>
                        <th>校园卡号</th>
                        <th>姓名</th>
                        <th>部门</th>
                        <th>面积</th>
                        <th>入住时间</th>
                        <th>电话</th>
                       
                    </tr>
                    </thead>
                
                	<?php if(is_array($name)): foreach($name as $key=>$n1): ?><tbody>
                    <tr>
                    	<td><?php echo ($n1["id"]); ?></td>
                      
                        <td><?php echo ($n1["v_name"]); ?></td>
                        <td><?php echo ($n1["building"]); ?></td>
                        <td><?php echo ($n1["house_number"]); ?></td>
                        <td><?php echo ($n1["style"]); ?></td>
                        <td><?php echo ($n1["card_number"]); ?></td>
                        <td><?php echo ($n1["owner_name"]); ?></td>
                        <td><?php echo ($n1["department"]); ?></td>
                        <td><?php echo ($n1["area"]); ?></td>
                        <td><?php echo ($n1["start_time"]); ?></td>
                        <td><?php echo ($n1["tel_num"]); ?></td>
                   </tr>
                    </tbody><?php endforeach; endif; ?>
                
                </table>
					<div class="table-foot NoPrint" style="text-align: center">
								<br>
								<button type="button" onclick="javascript :history.back(-1)" class="btn btn-primary">返回</button>
							</div>
            </div>
        </div>
    </div>
</div>
<script src="/jgzf/Public/js/jquery.min.js"></script>
<script src="/jgzf/Public/js/bootstrap.min.js"></script>
</body>
</html>