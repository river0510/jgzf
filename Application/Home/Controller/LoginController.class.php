<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function index()
    {
        //获取输入的id和密码
        $id = I('post.id','','htmlspecialchars');
        $pwd = I('post.pwd','','htmlspecialchars');
        $condition['account'] = $id;
        $condition['password'] = $pwd;
        $table = M('user');
        $result = $table->where($condition)->select();
        //结果不为空和session为空说明有值传递过来则进行登陆验证
        if((!empty($result)) && !isset($_SESSION['name']))
        {
            //root为1说明为普通管理员
            if($result[0][root]==1)
            {
                $name = $result[0][name];
                $ip = get_client_ip();
                //把name和id保存在session中
                session('name',$name);
                session('id',$id);
                //登陆成功，记录到系统日记
                $log = M('log');
                $data['ip'] = $ip; 
                $data['name'] = $name;
                $data['operation'] = "登陆";
                $data['data'] = "登陆成功";
                $log->data($data)->add();
                $this->display('Index/index');
            }
        }
        else if (isset($_SESSION['name']))
        {
            $this->display('Index/index');
        }
        //说明非法登陆，返回登陆界面继续
        else 
        {
            $log = M('log');
            $data['ip'] = get_client_ip(); 
          
            $data['operation'] = "登陆";
            $data['data'] = "登陆失败";
            $log->data($data)->add();
            echo "<script>alert('账号或者密码错误,请重新登陆');</script>";
            $this->display('Index/login');
        }
    }
}