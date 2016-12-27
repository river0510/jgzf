<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BG</title>
    <link rel="stylesheet" href="/jgzf/Public/css/bootstrap.css">
    <link rel="stylesheet" href="/jgzf/Public/css/app.css">
    <script type="text/javascript" src="min/b=CoreAdmin/js&f=cookie/jquery.cookie.js,jwysiwyg/jquery.wysiwyg.js,tooltipsy.min.js,iphone-style-checkboxes.js,excanvas.js,zoombox/zoombox.js,visualize.jQuery.js,jquery.uniform.min.js,main.js"></script>
    
    <link rel="stylesheet" href="/jgzf/Public/css/min.css" />
</head>

        <div id="head">
            <div class="left">
                <a href="#" class="button profile"><img src="/jgzf/Public/images/icons/top/huser.png" alt="" /></a>
                Hi, <?php echo (session('name')); ?>
                <a href="/jgzf/index.php/Home/logout/index" target="_parent">退出系统</a>
                |
                <a href="/jgzf/index.php/Home/admin/index" target="right" >用户管理</a>
            </div>   
        </div>
        
</html>