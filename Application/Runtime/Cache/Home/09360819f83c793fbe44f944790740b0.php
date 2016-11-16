<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head>
        <title>Your Admin Panel</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        
        <!-- jQuery AND jQueryUI -->
        <script type="text/javascript" src="/jgzf/Public/js/libs/jquery/1.6/jquery.min.js"></script>
        <script type="text/javascript" src="/jgzf/Public/js/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
        
        <link rel="stylesheet" href="/jgzf/Public/css/min.css" />
        <script type="text/javascript" src="/jgzf/Public/js/min.js"></script>
        <link rel="stylesheet" href="/jgzf/Public/css/app.css">
    </head>
    <body>
        
        <script type="text/javascript" src="/jgzf/Public/content/settings/main.js"></script>
<link rel="stylesheet" href="/jgzf/Public/content/settings/style.css" />
<div id="sidebar">
            <ul>
                <li>
                    <a href="#">
                        <img src="/jgzf/Public/images/icons/menu/inbox.png" alt="" />
                       		搜索
                    </a>
                    
                </li>
                <li id="left-search" style="padding:10px">
                
            		
            		
                		<form action="<?php echo U('Home/User/search');?>" method="get"  id="search" class="search placeholder" target="right">
                    		
                    		<input type="text" value="" name="name" placeholder="请输入关键字" class="text"/>
                    		<input type="submit" value="rechercher" class="submit"/>
                		</form>
            		
        			
        		</li>
                <li class=""><a href="#"><img src="/jgzf/Public/images/icons/menu/layout.png" alt="" /> 教工住房</a>
                    <ul>
		                <?php if(is_array($name)): foreach($name as $key=>$n): ?><li>
		                 	<a><?php echo ($n["v_name"]); ?></a>
		                 		<ul>
		                 			<li><a href="/jgzf/index.php/Home/Index/right?name=<?php echo ($n["v_name"]); ?>&&state=在用" target="right">在用</a></li>
		                 			<li><a href="/jgzf/index.php/Home/Index/right?name=<?php echo ($n["v_name"]); ?>&&state=闲置" target="right">闲置</a></li>
		                 		</ul>
		                 	</li><?php endforeach; endif; ?>   
		            </ul>  
                </li>
                <li id="left-search"><a href="#"><img src="/jgzf/Public/images/icons/menu/brush.png" alt="" />房源管理</a>
                    <ul>
                        <li><a href="<?php echo U('Home/House/search');?>" target = "right">所有房源</a></li>
                        <li><a href="/jgzf/index.php/Home/House/addone" target = "right">导入单一房源</a></li>
                        <li><a href="<?php echo U('Home/House/add');?>" target="right">批量导入房源</a></li>
                        <li>
                        	<form action="<?php echo U('Home/House/search');?>" method="get"  id="search" class="search placeholder" target="right">
                    		
                        		<input type="text" value="" name="name" placeholder="请输入关键字进行查询" class="text"/>
                        		<input type="submit" value="rechercher" class="submit"/>
                		    </form>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><img src="/jgzf/Public/images/icons/menu/brush.png" alt="" />住宿信息统计</a>
                    <ul>
                        <li><a href="<?php echo U('Home/Tongji/right');?>" target="right">住宿信息统计</a></li>
                        
                    </ul>
                </li>
                <li id="left-search"><a href="#"><img src="/jgzf/Public/images/icons/menu/brush.png" alt="" />房源信息统计</a>
                    <ul>
                        <li><a href="<?php echo U('Home/Baobiao/right');?>" target="right">选择条件获取统计报表</a></li>
                        
                        <!--   <li>
                        	<form action="<?php echo U('Home/Baobiao/search');?>" method="get"  id="search" class="search placeholder" target="right">
                    		
                    		<input type="text" value="" name="name" placeholder="输入关键词获取报表" class="text"/>
                    		<input type="submit" value="rechercher" class="submit"/>
                		</form>
                        </li> -->
                    </ul>
                </li>
                <li><a href="#"><img src="/jgzf/Public/images/icons/menu/brush.png" alt="" />房租管理</a>
                    <ul>
                        <li><a href="<?php echo U('Home/Rent/right');?>" target="right">个人房租登记</a></li>
                        <li><a href="<?php echo U('Home/Rent/statistics');?>" target="right">统计表</a></li>
                        <li><a href="<?php echo U('Home/Rent/xiaoquModify');?>" target="right">小区租金管理</a></li>
                        <li><a href="<?php echo U('Home/Rent/autoRent');?>" target="right">批量自动交租</a></li>
                    </ul>
                </li>
                <li><a href="#"><img src="/jgzf/Public/images/icons/menu/brush.png" alt="" />人员管理</a>
                    <ul>
                        <li><a href="<?php echo U('Home/People/peopleInfo');?>" target="right">所有人员</a></li>
                        <li><a href="<?php echo U('Home/Rent/typeModify');?>" target="right">人员类别管理</a></li>
                        <li><a href="<?php echo U('Home/People/import');?>" target="right">批量导入人员信息</a></li>
                        <li id="left-search">
                            <form action="<?php echo U('Home/People/peopleSearch');?>" method="get"  id="search" class="search placeholder" target="right">
                                <input type="text" value="" name="card_number" placeholder="请输入校园卡号进行查询" class="text"/>
                                <input type="submit" value="rechercher" class="submit"/>
                            </form>
                        </li>    
                    </ul>
                </li>
        	</ul>


        </div>
        </body>
        </html>