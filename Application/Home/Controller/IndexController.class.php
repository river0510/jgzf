<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class IndexController extends Controller {
    public function index(){
         header('Content-type:text/html;charset=utf-8');
        // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    //判断session是否为空，为空跳转到登陆界面
       if(session('id')==null)
           $this->redirect("Index/login");
       $this->display();
    }
    public function left(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $table_name = M('muyecun');
        //实例化住房表后把不重复的小区名称取出来
        $result = $table_name->distinct(true)->field('v_name')->select();
        $this->assign('name',$result);
       
        $this->display();
        
    }
    public function right(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        //获取哪个小区的某个状态
        $get = I('get.name','','htmlspecialchars');
        $state = I('get.state','','htmlspecialchars');
        $condition['v_name'] = $get;
        $condition['state'] = $state;
        
        //进行分页

        import('ORG.Util.Page');
        $table = M('muyecun');
        if($get && $state){
            $count = $table->where($condition)->count();
        }else{
            $count = $table->count();
        }
        
        $page = new \Think\Page($count,10);
        $show = $page->show();
        if($get && $state){
            $res = $table->where($condition)->limit($page->firstRow.','.$page->listRows)->select();
        }else{
            $res = $table->limit($page->firstRow.','.$page->listRows)->select();
        }
        //传递给模板显示出来
        $this->assign('name',$res);
        $this->assign('page',$show);
        $this->assign('count',$count);

        $this->display();
  
    }
    public function nameJudge(){
        $person = M('person');
        $house = M('muyecun');
        $card_number = I('get.card_number');
        $result = $person->where("card_number = $card_number")->select();
        $isHad = $house->where("card_number = $card_number")->select();
        if($result){
            if($isHad){
                $data = array(
                    'status'=>2
                );
                $this->ajaxReturn($data);
            }else{
                $data = array(
                    'status'=>1,
                    'name'=>$result[0]['name'],
                    'department'=>$result[0]['department'],
                    'phone'=>$result[0]['phone_number']
                );
                $this->ajaxReturn($data);
            }
        }else{
            $data['status'] = 0;
            $this->ajaxReturn($data);
        }
    }
    public function top(){
        
        $this->display();
    }
  
}