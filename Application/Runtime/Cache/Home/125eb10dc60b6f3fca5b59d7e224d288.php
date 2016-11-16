<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BG</title>
    <link rel="stylesheet" href="/jgzf/Public/css/bootstrap.css">
    <link rel="stylesheet" href="../../../../Public/css/bootstrap.css">
    <link rel="stylesheet" href="../../../../Public/css/app.css">
    <link rel="stylesheet" href="/jgzf/Public/css/app.css">
</head>
<body> 
    <div class="bloc" id="content">

        <div class="content-wrap" >
            <div class="container">
                <h1><img src="/jgzf/Public/images/icons/posts.png" alt="" /> 人员信息</h1>
                <table class="table table-striped table-hover">
                    <thead>

                        <tr>
                            <th>校园卡号</th>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>人员类别</th>
                            <th>部门</th>
                            <th>代扣方</th>
                            <th>入站时间</th>
                            <th>出站时间</th>
                            <th>电话号码</th>
                            <th>折扣率起始时间</th>
                            <th style="text-align: center">操作</th>
                        </tr>
                    </thead>

                    <?php if(is_array($data)): foreach($data as $key=>$n1): ?><tbody>
                            <tr>
                                <td><?php echo ($n1["card_number"]); ?></td>
                                <td><?php echo ($n1["name"]); ?></td>
                                <td><?php echo ($n1["sex"]); ?></td>
                                <td><?php echo ($n1["type"]); ?></td>
                                <td><?php echo ($n1["department"]); ?></td>
                                <td><?php echo ($n1["daikoufang"]); ?></td>
                                <td><?php echo ($n1["ruzhan_time"]); ?></td>
                                <td><?php echo ($n1["chuzhan_time"]); ?></td>
                                <td><?php echo ($n1["phone_number"]); ?></td>
                                <td><?php echo ($n1["discount_time"]); ?></td>
                                <td>
                                    <a href="peopleModify?id=<?php echo ($n1["id"]); ?>">修改</a>
                                    <a href="peopleDelete?id=<?php echo ($n1["id"]); ?>">删除</a>
                                </td>
                            </tr>
                        </tbody><?php endforeach; endif; ?>

                </table>
                <div class="result page" id="fenye1"><?php echo ($page); ?></div>
            <div style="text-align: center; width: 100%;">
            <a type="button" class="btn btn-primary" href="infoExcel">导出人员信息</a>
            </div>
            </div>

        </div>
    </div>

    <script src="/jgzf/Public/js/jquery.min.js"></script>
    <script src="../../../../Public/js/jquery.min.js"></script>
    <script src="../../../../Public/js/bootstrap.min.js"></script>
    <script src="/jgzf/Public/js/bootstrap.min.js"></script>

</body>
</html>