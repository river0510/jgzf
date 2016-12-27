<?php

namespace Home\Controller;
use Think\Controller;

class AdminController extends Controller {
	public function index(){
		//判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }

        $user = M('user');
        $allUsers = $user->select();
        $this->assign('users', $allUsers);
        $this->display();
	}

	public function delete(){
		//判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }

        $user = M('user');
        $id = I('get.id');
        $where['account']=$id;
        $res = $user->where($where)->delete();
        if($res){
        	$this->success('删除成功');
        }else{
        	$this->error('删除失败');
        }
	}

	public function add(){
		//判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }

        $user = M('user');
        $account = I('post.account');
        $pass = I('post.pass');
        $name = I('post.name');
        if(!($account && $pass && $name)){
        	$this->error('信息不完整');
        }
        $where['account']=$account;
        $res=$user->where($where)->select();
        if($res){
        	$this->error('该用户已存在');
        }

    	$data=array(
    		"account"=>$account,
    		"password"=>$pass,
    		"name"=>$name,
    		"root"=>1
    	);
    	$res=$user->add($data);
    	if($res){
    		$this->success('添加成功');
    	}else{
    		$this->error('添加失败');
    	}
	}

	public function modify(){
		//判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }

        $user = M('user');
        $account = $_SESSION['id'];
        $pass = I('post.pass');

        if(!$pass){
        	$this->error('信息填写不完整');
        }
    	$data['password']=$pass;
    	$where['account']=$account;
    	$res=$user->where($where)->save($data);
    	if($res){
    		$this->success('修改成功,请重新登录');
    	}else{
    		$this->error('修改失败');
    	}
	}
}

















