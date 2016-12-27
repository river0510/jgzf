<?php

namespace Home\Controller;
use Think\Controller;
class HouseController extends Controller {
 public function search()
   {
       //判断用户session是否存在 未设置则重新登陆
       if (!isset($_SESSION['name']))
       {
           $this->error("请登录",U('Index/login'));
       }
       
       //获取用户输入的数据
       $result = I('get.name','','htmlspecialchars');
       //用condition辨别
       $condition['v_name'] = array('like',"%$result%");
       $condition['house_number'] = array('like',"%$result%");
      
       $condition['card_number'] = array('like',"%$result%");
       $condition['owner_name'] = array('like',"%$result%");
       $condition['state'] = array('like',"%$result%");
       $condition['department'] = array('like',"%$result%");
       $condition['tel_num'] = array('like',"%$result%");
       $condition['building'] = array('like',"%$result%");
       $condition['_logic'] = 'OR'; 
       //组合字段搜索
       $condition['concat(building,house_number)'] = array('like',"%$result%");
       $condition['concat(v_name,building)'] = array('like',"%$result%");
       $condition['concat(v_name,building,house_number)'] = array('like',"%$result%");
       $condition['concat(v_name,state)'] = array('like',"%$result%");
       $condition['concat(v_name,building,state)'] = array('like',"%$result%");
       //导入分页类
       import('ORG.Util.Page');
       $table = M('muyecun');
       $count = $table->where($condition)->count();
       $page = new \Think\Page($count,10);
       $show = $page->show();
       $res = $table->where($condition)->limit($page->firstRow.','.$page->listRows)->select(); 
       //搜索结果返回页面显示
       if($res)
       {
           $this->assign('name',$res);
           $this->assign('page',$show);
           $this->assign('count',$count);
           $this->display('House/right');
       }
       //为空则说明输入信息有误
       else{
          
           echo '<script>alert("您输入的信息有误");history.back();</script>';
       }
   }
 public function addone()
   {
       //判断用户session是否存在 未设置则重新登陆
       if (!isset($_SESSION['name']))
       {
           $this->error("请登录",U('Index/login'));
       }
       
   	 $xiaoqu = M('xiaoqu');
        $data = $xiaoqu->field('name')->select();
        $this->assign('name',$data);
        $this->display();
   }
   public function addone1()
   {
       //判断用户session是否存在 未设置则重新登陆
       if (!isset($_SESSION['name']))
       {
           $this->error("请登录",U('Index/login'));
       }
       
   	$v = I('post.cun','','htmlspecialchars');
    $loudong = I('post.loudong','','htmlspecialchars');
    $num = I('post.number','','htmlspecialchars');
    $huxing = I('post.huxing','','htmlspecialchars');
    $area= I('post.area','','htmlspecialchars');
    $de = I('post.department','','htmlspecialchars');
    $count = M('muyecun')->where("v_name='$v' AND house_number='$num' AND building='$loudong'")->count();
    if($count==1)
        $this->error("该房源已经存在");
    $data["v_name"] = $v;
    $data["house_number"] = $num;
    $data["building"] = $loudong;
    $data["style"] = $huxing;
    $data["area"] = $area;
    $data["department"] = $de;
    
    $User = M("muyecun");
    if($v =="null" ||$loudong == "" || $num ==""||$huxing == "null"||$area == "" || $de =="null")
    {
    	echo"<script>alert('请将信息填写完整！');history.back();</script>";
    }
    else {
	    if($insert = $User->add($data))
	    {
	    	$this->success('添加成功');
	    }
	    else {
	    	$this->error('添加失败，请重新添加');
	    	
	    }
    }
   
   	
       
   }
    public function change_method()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
    	$id = I('post.id','','htmlspecialchars');
    	$v = I('post.cun','','htmlspecialchars');
    	$loudong = I('post.loudong','','htmlspecialchars');
    	$num = I('post.number','','htmlspecialchars');
    	$huxing = I('post.huxing','','htmlspecialchars');
    	$area= I('post.area','','htmlspecialchars');
    	$de = I('post.department','','htmlspecialchars');
    	$fare = I('post.charge_standard','','htmlspecialchars');
    	$area = I('post.area','','htmlspecialchars');
    	$data["v_name"] = $v;
    	$data["building"] = $loudong;
    	$data["house_number"] = $num;
    	$data["style"] = $huxing;
    	$data["area"] = $area;
    	$data["department"] = $de;
    	$data['charge_standard'] = $fare;
    	$data['area'] = $area;
    	$User = M("muyecun");
    	$change = $User->where("id = '$id'")->save($data);
    	if($change)
    	{
    		echo"<script>alert('修改成功！');</script>";
    		echo"<script>location.replace(document.referrer);</script>";
    	}

    	else {
    		
    		echo"<script>location.replace(document.referrer);</script>";
    	}
   	
    }
    public function change ()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
    	$data = I('get.id','','htmlspecialchars');       	
        $table = M('muyecun');
        $result = $table->where("id='$data'")->select();     
        $this->assign('name',$result);
    	$this->display();
    	
    }
    public function delete()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
    	$id = I('get.id');
    	M('muyecun')->where("id = '$id'")->delete();
    	$this->success('删除成功',__APP__);
    }
   public function input()
   {
       //判断用户session是否存在 未设置则重新登陆
       if (!isset($_SESSION['name']))
       {
           $this->error("请登录",U('Index/login'));
       }
       
       $user = M('muyecun');
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('xlsx','xls');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件 
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }
        
    	$filetmpname = './Uploads/'.$info['file_stu']['savepath'].$info['file_stu']['savename'];
    	$exts = $info['file_stu']['ext'];
     	import("Org.Util.PHPExcel");
    	import("Org.Util.PHPExcel.Reader.Excel2007");
    	import("Org.Util.PHPExcle.IOFactory");
    	if($exts == 'xlsx'){
    	    import("Org.Util.PHPExcel.Reader.Excel5");
    	    $objReader = \PHPExcel_IOFactory::createReader("excel2007");
    	}else if($exts == 'xls'){
    	    import("Org.Util.PHPExcel.Reader.Excel2007");
    	    $objReader = \PHPExcel_IOFactory::createReader("Excel5");
    	}
    
    //	$objReader=new \PHPExcel_Reader_Excel2007();
    	$objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($filetmpname,$encode='utf-8');
       
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        
        $highestColumn = $sheet->getHighestColumn(); // 取得总列数
        $arrExcel = $objPHPExcel->getSheet(0)->toArray();
       
        for($i=2;$i<=$highestRow;$i++)
        {
             $data['v_name']= $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
        	$temp1 = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
        	
        	$temp = explode("/", $temp1);
        	$data['house_number'] = $temp[2];
        	$data['area']= $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
        //	$data['charge_standard']= $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
        	$data['style']= $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
        	$data['card_number']= $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
        	$data['building']= $temp[1];
        	$data['owner_name']= $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();
        	$data['sex']= $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();
        	$data['start_time']= gmdate("Y-m-d", \PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue()));
        	$data['department']= $objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue();
        	 $data['tel_num']= $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();
        	if(!empty($data['owner_name']))
        	    $data['state'] = '在用';
        	else 
        	    $data['state'] = '闲置';
        	$count = M('muyecun')->where("v_name='$data[v_name]' AND house_number='$data[house_number]' AND building='$data[building]'")->count();
        	if($count==0)
            	$user->add($data);
        	
        }
      //  var_dump($item);
   	$this->success("导入成功");
   
    }
    	
    
   
    public function index()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $this->display();
    }
    public function left()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $this->display("Index/left");
    }
    public function top()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $this->display("Index/top");
    }
    public function right()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $this->display();
    }
}