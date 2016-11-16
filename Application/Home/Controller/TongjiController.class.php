<?php

namespace Home\Controller;
use Think\Controller;

class TongjiController extends Controller {
   
    public function right()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $table_name = M('muyecun');
          $result = $table_name->distinct(true)->field('v_name')->select();
        $this->assign('name',$result);
        $this->display();
    }
    public function data()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $table = M('muyecun');
        $department = I('post.department','','htmlspecialchars');
        $v_name = I('post.v_name','','htmlspecialchars');
        $building = I('post.building','','htmlspecialchars');
        $s_time = I('post.s_time','','htmlspecialchars');
        $e_time = I('post.e_time','','htmlspecialchars');
        $state = I('post.state','','htmlspecialchars');
       $data = array();
       $result1 = array();
       $result = array();
       
       if(!empty($department))
       {
         $data['department'] = $department;
         $result1[] = "部门";
         $result[] = $department;
       }
       if(!empty($v_name))
       {
           
           $data['v_name'] = $v_name;
           $result1[] = "小区名称";
           $result[] = $v_name;
       }
       if(!empty($building))
       {
           $data['building'] = $building;
           $result[] = $building;
           $result1[] = "楼栋号";
       }
       if(!empty($state))
       {
           $data['state'] = $state;
           $result[] = $state;
           $result1[]="状态";
       }
       if(!empty($s_time)&&(!empty($e_time)))
       {
           
           $data['_string'] = "start_time>'$s_time' AND start_time<'$e_time'";
           $sum = $table->where($data)->count();
           $result1[] = "登记起始时间";
           $result1[] = "登记结束时间";
           $result1[] = "登记人数";
           $result[] = $s_time;
           $result[] = $e_time;
           $result[] = $sum;
           $this->assign('condition',$result);
           $this->assign('condition1',$result1);
           
           $this->display();
           
       }
       else if(!empty($s_time)&&empty($e_time))
       {
           $data['_string'] = "start_time>'$s_time'";
           $sum = $table->where($data)->count();
           $result1[] = "登记起始时间";
           
           $result1[] = "登记人数";
           $result[] = $s_time;
         
           $result[] = $sum;
           $this->assign('condition',$result);
           $this->assign('condition1',$result1);
            
           $this->display();
       }
       else {
          
           $sum = $table->where($data)->count();

           $result1[] = "登记人数";

           $result[] = $sum;
           $this->assign('condition',$result);
           $this->assign('condition1',$result1);
            
           $this->display();
       }
       
    }
}