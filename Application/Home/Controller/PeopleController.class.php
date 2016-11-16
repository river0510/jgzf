<?php

namespace Home\Controller;
use Think\Controller;
class PeopleController extends Controller {
  public function peopleInfo(){
    $person = M('person');

    $count = $person->count();
    $page = new \Think\Page($count,10);
    $show = $page->show();
    $res = $person->limit($page->firstRow.','.$page->listRows)->order('card_number')->select();
    if($res){
       $this->assign('data',$res);
       $this->assign('page',$show);
       $this->display();
    }
  }
  public function peopleSearch(){
    //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }

        $person = M('person');
        $card_number = I('get.card_number');
        $res = $person->where("card_number = $card_number")->select();
        if($res){
          $this->assign("data", $res)->display('People/peopleInfo');
        }
  }
  public function peopleModify(){
    //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $person=M('person');
        $person_type=M('person_type');
        $id=I('get.id');
        $person1=$person->where("id = $id")->select();
        $type=$person_type->field("name")->select();
        $this->assign('personInfo',$person1[0])->assign("type",$type);
        $this->display();
  }
  public function peopleDelete(){
     //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }

      //判断是否有住房
        $person = M('person');
        $house = M('muyecun');
        $id = I('get.id');

        $p = $person->where("id = $id")->select();
        $card_number = $p['0']['card_number'];
        $res = $house->where("card_number = $card_number")->select();
        if($res){
          $this->error("请先退房后再删除信息");
        }else{
          $result = $person->where("id = $id")->delete();
          if($result){
            $this->success("删除成功，请前往确认房租已结清");
          }else{
            $this->error("删除失败");
          }
        }
  }

  public function infoExcel(){
    $data1 = S('data');//读取缓存
        S('data',NULL);//删除缓存
        $person = M('person');
        $data = $person->order('card_number')->select();
    
        $headArr = array();
        
        $headArr[]='校园卡号';
        $headArr[]='姓名';
        $headArr[]='性别';
        $headArr[]='人员类别';
        $headArr[]='部门';
        $headArr[]='代扣方';
        $headArr[]='入站时间';
        $headArr[]='出站时间';
        $headArr[]='电话号码';
        $headArr[]='初始折扣率';
    
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
    
        
        $fileName .= "人员信息表.xls";
    
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
    
            $objActSheet->setCellValue("A".$i,$data[$key]['card_number']);
            $objActSheet->setCellValue("B".$i, $data[$key]['name']);
            $objActSheet->setCellValue("C".$i,$data[$key]['sex']);
            $objActSheet->setCellValue("D".$i,$data[$key]['type']);
            $objActSheet->setCellValue("E".$i,$data[$key]['department']);
            $objActSheet->setCellValue("F".$i, $data[$key]['daikoufang']);
            $objActSheet->setCellValue("G".$i, $data[$key]['ruzhan_time']);
            $objActSheet->setCellValue("H".$i, $data[$key]['chuzhan_time']);
            $objActSheet->setCellValue("I".$i, $data[$key]['phone_number']);
            $objActSheet->setCellValue("J".$i, $data[$key]['discount_time']);
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

  public function importHandle(){
     //判断用户session是否存在 未设置则重新登陆
       if (!isset($_SESSION['name']))
       {
           $this->error("请登录",U('Index/login'));
       }
       
       $user = M('person');
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
    
    //  $objReader=new \PHPExcel_Reader_Excel2007();
      $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($filetmpname,$encode='utf-8');
       
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        
        $highestColumn = $sheet->getHighestColumn(); // 取得总列数
        $arrExcel = $objPHPExcel->getSheet(0)->toArray();
       
        for($i=2;$i<=$highestRow;$i++)
        {
             $data['card_number']= $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
          $data['name'] = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
          $data['sex']= $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
        //  $data['charge_standard']= $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
          $data['type']= $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
          $data['department']= $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
          $data['daikoufang']= $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();
          $data['ruzhan_time']= $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();
          $data['chuzhan_time']= $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue();
          $data['phone_number']= $objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue();
          $data['discount_time']= $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();
    
          $user->add($data);
          
        }
      //  var_dump($item);
    $this->success("导入成功");
  }
}