<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
   //用户进行搜索时将把数据传递到这来
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
           $this->display('Index/right');
       }
       //为空则说明输入信息有误
       else{
          
           echo '<script>alert("您输入的信息有误");history.back();</script>';
       }
   }
   //该函数查看住房具体信息
   public function look()
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
   //该函数处理分配
   public function give()
   {
       //判断用户session是否存在 未设置则重新登陆
       if (!isset($_SESSION['name']))
       {
           $this->error("请登录",U('Index/login'));
       }
       
       $res['admit_man'] = I('post.admit_man','','htmlspecialchars');//获取批准人
       $res['card_number']= I('post.num','','htmlspecialchars');//获取校园卡号
       $id = I('post.id','','htmlspecialchars');//获取住房在表中的id
       $res['owner_name'] = I('post.name','','htmlspecialchars');
       $res['department'] = I('post.department','','htmlspecialchars');
       $res['sex'] = I('post.sex','','htmlspecialchars');
       $res['tel_num'] = I('post.tel_num','','htmlspecialchars');
       $res['start_time'] = date("Y-m-d");
       $res['state'] = '在用';
       
       //存在的情况下，把教职工信息和该住房信息显示出来，以防错误操作
     
           $village = M('muyecun');
           $village->where("id='$id'")->save($res);
           //操作成功后把一些信息记录到系统日记中
       $log['ip']=get_client_ip();
       $log['name'] = session('name');
       $log['data'] = "分配成功";
       $log['operation'] = "分配";
     //  $log['data'] = $result1[0][v_name].$result1[0][building].$result1[0][house_number];
       $log['others'] = "分配给了".$res['owner_name'];
       M('log')->data($log)->add();
       $this->success('登记成功');
       
       
   }
   //该函数解决住房最终确认操作
   /* public function confirm()
   {
       
       $admit = I('get.admit_man','','htmlspecialchars');//获取批准人
       $num = I('get.tid','','htmlspecialchars');//获取校园卡号
       $id = I('get.vid','','htmlspecialchars');//获取该住房在表中的id
       $table = M('muyecun');
       $information = M('information');
        //提取出该校园卡号的详细信息。保存在data数组中
       $result = $information->where("card_number = '$num'")->select();
       $data['card_number'] = $num;
       $data['owner_name'] = $result[0][name];
       $data['sex'] = $result[0][sex];
       $data['department'] = $result[0][department];
       $data['tel_num'] = $result[0][tel_num];
       $data['start_time'] = date("Y-m-d");
       $data['handle_man'] = session('name');
       $data['admit_man'] = $admit;
       $data['state'] = "在用";
       
       //登记住房
       $table->where("id='$id'")->save($data);
       $result1 = $table->where("id='$id'")->select();

        //导入住宿统计报表
       $table = M('muyecun');
       $oldData = $table-> where("id = '$id' ") ->find();//找到该住房信息
       $dat['name'] = $oldData['owner_name'];
       $dat['house_style'] = $oldData['style'];
       $dat['area'] = $oldData['area'];
       $dat['department'] = $oldData['department'];
       $dat['address'] = $oldData['v_name']."".$oldData['building']."".$oldData['house_number'];


       $give_table = M('give_table'); // 实例化对象
       $give_table->data($dat)->add();
       //操作成功后把一些信息记录到系统日记中
       $log['ip']=get_client_ip();
       $log['name'] = session('name');
       $log['operation'] = "分配";
       $log['data'] = $result1[0][v_name].$result1[0][building].$result1[0][house_number];
       $log['others'] = "分配给了".$result[0][name];
       M('log')->data($log)->add();
       $this->success('登记成功',__APP__);
   } */
  
   //该函数处理退房业务操作
   public function leave()
   {
       //判断用户session是否存在 未设置则重新登陆
       if (!isset($_SESSION['name']))
       {
           $this->error("请登录",U('Index/login'));
       }
       
       $id = I('post.id','','htmlspecialchars');//房间序号
       $admit_man = I('post.admit_man','','htmlspecialchars');//批准人
       $reason = I('post.reason','','htmlspecialchars');//退宿原因

       //判断该月是否交租
       $rentRecord = M('fangzujilu');
       $res = $rentRecord->where("house_id = $id")->order('id desc')->select();
       list($t1['y'],$t1['m'])=explode("-",$res[0]['start_time']);
       list($t2['y'],$t2['m'])=explode("-",date("Y-m-d"));
       if(!($t1['y']==$t2['y']&&$t1['m']==$t2['m']&&$res[0]['status']=="已交")){
          $this->error("请先交清当前房租，再退房");
       }
   
       $table = M('muyecun'); // 实例化User对象
       $result = $table->where("id='$id'")->select();
 // 要修改的数据对象属性赋值
      $data['admit_man'] = '';
      $data['card_number'] = '';
      $data['owner_name'] = '';
      $data['sex'] = '';
      $data['start_time'] = '0000-00-00';
      $data['department'] = '';
      $data['tel_num'] = '';
      $data['hadle_man'] = '';
      $data['state'] = '闲置';

//插入退宿统计报表
      $allData = $table-> where("id = '$id' ") ->find();
      $dat['name'] = $allData['owner_name'];
      $dat['department'] = $allData['department'];
      $dat['address'] = $allData['v_name']."".$allData['building']."".$allData['house_number'];
      $dat['house_style'] = $allData['style'];
      $dat['area'] = $allData['area'];
      $dat['in_date'] = $allData['start_time'];

      $leave_table = M('leave_table'); // 实例化对象
      $leave_table->data($dat)->add();

      $table->where("id = '$id' ")->save($data); // 根据条件更新记录
       
      //退房成功后记录到系统日记
       $record['name'] = session('name');
       
       $record['ip'] = get_client_ip();
       $record['operation'] = "退房";
       $record['data'] = $result[0][v_name].$result[0][building].$result[0][house_number];
       $record['others'] = $reason;
       M('log')->data($record)->add();
      $this->success('退宿成功',__APP__/Home/Index/right);
   
   }
    
   

}