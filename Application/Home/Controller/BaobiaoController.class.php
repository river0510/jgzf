<?php

namespace Home\Controller;
use Think\Controller;
use Think\Page;
class BaobiaoController extends Controller {
   
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
        $department = I('get.department','','htmlspecialchars');
        $v_name = I('get.v_name','','htmlspecialchars');
        $building = I('get.building','','htmlspecialchars');
        $s_time = I('get.s_time','','htmlspecialchars');
        $e_time = I('get.e_time','','htmlspecialchars');
        $state = I('get.state','','htmlspecialchars');
       $data = array();
       $result1 = array();
       $result = array();
       if(!empty($department))
       {
         $data['department'] = $department;
        
         $result[] = $department;
       }
       if(!empty($v_name))
       {
           
           $data['v_name'] = $v_name;
         
           $result[] = $v_name;
       }
       if(!empty($building))
       {
           $data['building'] = $building;
           $result[] = $building;
           
       }
       if(!empty($state))
       {
           $data['state'] = $state;
           if($state=='在用')
            $result1['state'] = '在用';
       }
       if(!empty($s_time)&&(!empty($e_time)))
       {
           
           import('Org.Util.Page');//引入分页类          
           $data['_string'] = "start_time>'$s_time' AND start_time<'$e_time'";
           S('data',$data);
           //进行分页
           $count = $table->where($data)->count();
           $page = new Page($count,10);//一页十条数据
           $show = $page->show();
           
            $list = $table->where($data)->limit($page->firstRow.','.$page->listRows)->select();
           $this->assign('condition',$list);
           $this->assign('page',$show);
           $this->display();
           
       }
       else if(!empty($s_time)&&empty($e_time))
       {
           
         
           import('Org.Util.Page');//引入分页类          
            $data['_string'] = "start_time>'$s_time'";
           S('data',$data);
           //进行分页
           $count = $table->where($data)->count();
           $page = new Page($count,10);//一页十条数据
           $show = $page->show();
           
            $list = $table->where($data)->limit($page->firstRow.','.$page->listRows)->select();
           $this->assign('condition',$list);
           $this->assign('page',$show);
           $this->display();
       }
       else {
           import('Org.Util.Page');//引入分页类          
           S('data',$data);
           //进行分页
           $count = $table->where($data)->count();
           $page = new Page($count,10);//一页十条数据
           $show = $page->show();
           
            $list = $table->where($data)->limit($page->firstRow.','.$page->listRows)->select();
           $this->assign('condition',$list);
           $this->assign('page',$show);
           $this->display();
          
       }
       
    }
    public function excel()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $data1 = S('data');//读取缓存
        S('data',NULL);//删除缓存
        $user = M('muyecun');
        $data = $user->where($data1)->select();
        
        $headArr = array();
        
        $headArr[]='小区名称';
        $headArr[]='房号';
        $headArr[]='面积';
        $headArr[]='收费标准';
        $headArr[]='户型';
        $headArr[]='楼栋';
        $headArr[]='姓名';
        $headArr[]='性别';
        $headArr[]='电话号码';
        $headArr[]='校园卡号';
        $headArr[]='部门';
        $headArr[]='入住时间';
        $headArr[]='状态';
        
        
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
        
        $date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";
        
        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();
        
        //设置表头
        $key = ord("A");
        //print_r($headArr);exit;
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }
        
        $i = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        $sum = count($data,0);
        
       
       for($key=0;$key<$sum; ++$key){ //行写入
            
           
            $objActSheet->setCellValue("A".$i,$data[$key]['v_name']);
            $objActSheet->setCellValue("B".$i, $data[$key]['house_number']);
            $objActSheet->setCellValue("C".$i,$data[$key]['area']);
            $objActSheet->setCellValue("D".$i,$data[$key]['charge_standard']);
            $objActSheet->setCellValue("E".$i,$data[$key]['style']);
            $objActSheet->setCellValue("F".$i, $data[$key]['building']);
            $objActSheet->setCellValue("G".$i,$data[$key]['owner_name']);
            $objActSheet->setCellValue("H".$i,$data[$key]['sex']);
            $objActSheet->setCellValue("I".$i,$data[$key]['tel_num']);
            $objActSheet->setCellValue("J".$i,$data[$key]['card_number']);
            $objActSheet->setCellValue("K".$i,$data[$key]['department']);
            $objActSheet->setCellValue("L".$i,$data[$key]['start_time']);            
            $objActSheet->setCellValue("M".$i,$data[$key]['state']);
            $i++;
        } 
         
        
        /* foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        } */
        
       $fileName = iconv("utf-8", "gb2312", $fileName);
        
        //重命名表
        //$objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean();//清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');
        
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;  
         
        
        
    }
}