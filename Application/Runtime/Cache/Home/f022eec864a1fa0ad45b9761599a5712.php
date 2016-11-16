<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BG</title>
    <link rel="stylesheet" href="/jgzf/Public/css/bootstrap.css">
    <link rel="stylesheet" href="/jgzf/Public/css/app.css">
    <link rel="stylesheet" href="/jgzf/Public/css/form.css">
</head>
<body onkeydown="forbidBackSpace();"> 
<div class="bloc" id="content" style="padding: 60px">

         
    			<form action="/jgzf/index.php/Home/House/addone1" method = "POST" class="basic-grey" target="right">
<h1><b>导入单个房源</b><br><br>
<span>请将以下信息填写完整</span>
</h1>
<label>
<span>小区：</span>
						
						<select name = "cun" id="cun" onkeydown="clearSelect(this,event);" onkeypress="writeSelect(this,event);">
                			<option >选择小区</option>
                			<?php if(is_array($name)): foreach($name as $key=>$n): ?><option><?php echo ($n["name"]); ?></option><?php endforeach; endif; ?>
                		</select>

                		
</label>
<label>
<span>楼栋：</span><input name = "loudong" >
</label>
<label>
<span>房号：</span><input name = "number" >
</label>
<label>
<span>户型：</span>
<select name = "huxing" onkeydown="clearSelect(this,event);" onkeypress="writeSelect(this,event);">
                			<option>选择户型</option>
                			<option>一居室</option>
                			<option>两室一厅</option>	
                			<option>三室两厅</option>	
                			<option>四室一厅</option>	
                				
                		</select>
</label>
<label>
<span>面积：</span><input name = "area" >
</label>
<label>
<span>部门：</span>
<select name = "department">
                			<option value = "null">选择所属部门</option>
                			
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
<div class="table-foot NoPrint" style="text-align: center">
								<br>
								<button type="submit" class="btn btn-primary" onClick="return confirm('确认要添加？')">添加</button>
							</div>
</form>
                		<script> 
function clearSelect(obj,e) 
{ 
opt = obj.options[0]; 
opt.selected = "selected"; 
if((e.keyCode== 8) ||(e.charCode==8))//使用退格（backspace）键实现逐字删除的编辑功能 
{ 
opt.value = opt.value.substring(0, opt.value.length>0?opt.value.length-1:0); 
opt.text = opt.value; 
} 
if((e.keyCode== 46) ||(e.charCode==46))//使用删除（Delete）键实现逐字删除的编辑功能 
{ 
opt.value = ""; 
opt.text = opt.value; 
} 
//还可以实现其他按键的响应 
} 

function writeSelect(obj,e) 
{ 
opt = obj.options[0]; 
opt.selected = "selected"; 
opt.value += String.fromCharCode(e.charCode||e.keyCode); 
opt.text = opt.value; 
} 
function forbidBackSpace()//为了在IE中，避免backspace的返回上一页功能，和本下拉框的编辑功能冲突，需要禁掉backspace的功能。forbidBackSpace可以写在<body onkeydown="forbidBackSpace();">中。 
{ 
if((event.keyCode == 8) && (event.srcElement.type != "text" && event.srcElement.type != "textarea" && event.srcElement.type != "password")) 
{ 
event.keyCode = 0; 
event.returnValue = false; 
} 
} 
</script>                 	

<script src="/jgzf/Public/js/jquery.min.js"></script>
<script src="../../../../Public/js/jquery.min.js"></script>
<script src="../../../../Public/js/bootstrap.min.js"></script>
<script src="/jgzf/Public/js/bootstrap.min.js"></script>
</div>
</body>
</html>