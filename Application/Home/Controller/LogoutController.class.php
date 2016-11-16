<?php
namespace Home\Controller;
use Think\Controller;

class LogoutController extends Controller {
    public function index()
    {
        //删除session，返回登陆界面
        session(null);
        $this->redirect('Index/login');
    }
}