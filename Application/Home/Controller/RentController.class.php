<?php
namespace Home\Controller;

use Think\Controller;
use Org\Util\Date;

class RentController extends Controller
{

    public function right()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        $this->display();
    }

    public function rentRecord()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $person = M('person');
        $person_type=M('person_type');
        $card_number = I('post.card_number');
        if(!$card_number){
            $this->error("请输入卡号");
        }
        $res = $person->where("card_number = $card_number")->select();
        $where['name']=array('like',$res[0]['type']);
        $personType=$person_type->where($where)->select();
        if (! $res) {
            $this->error('个人信息未登记，请先登记详细信息');
        } else {
            $this->assign('personInfo', $res[0]);
            $house = M('muyecun');
            $res2 = $house->where("card_number = $card_number")->select();
            if($res2){
                $this->assign('houseInfo', $res2[0]);
            }else{
                $this->assign('houseInfo',0);
            }
            $this->assign('type',$personType[0]);
            
        }
        $this->display();
    }

    public function modifyPerson(){
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
    
    public function modifyPersonHandle(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $person = M('person');
        $id =I('post.id');
        $card_number = I('post.card_number');
        $name = I('post.name');
        $sex = I('post.sex');
        $type = I('post.type');
        $department = I('post.department');
        $daikoufang = I('post.daikoufang');
        $ruzhan_time = I('post.ruzhan');
        $chuzhan_time = I('post.chuzhan');
        $phone_number = I('post.phone_number');
        $discount_time = I('post.discount_time');
        if(!$card_number){
            $this->error("卡号不能为空");
        }else if(!$name){
            $this->error("姓名不能为空");
        }else if(!$sex){
            $this->error("性别不能为空");
        }else if(!$type){
            $this->error("人员类别不能为空");
        }else if(!$department){
            $this->error("部门不能为空");
        }else if(!$daikoufang){
            $this->error("代扣方不能为空");
        }else if(!$phone_number){
            $this->error("电话号码不能为空");
        }else if(!$discount_time){
            $this->error("折扣率起始时间不能为空");
        }
        if(!$ruzhan_time){
            $ruzhan_time = NULL;
        }
        if(!$chuzhan_time){
            $chuzhan_time = null;
        }
        $data = array(
            'card_number' => $card_number,
            'name' => $name,
            'sex' => $sex,
            'type' => $type,
            'department' => $department,
            'ruzhan_time' => $ruzhan_time,
            'chuzhan_time' => $chuzhan_time,
            'phone_number' => $phone_number,
            'daikoufang' => $daikoufang,
            'discount_time' => $discount_time
        );
        $res = $person->where("id = $id")->save($data);
        if ($res) {
            $this->success("信息修改成功！");
        } else {
            $this->error("信息修改失败！");
        }
    }
    
    public function personInfo()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $person_type=M('person_type');
        $data=$person_type->field("name")->select();
        $this->assign("type",$data);
        $this->display();
    }

    public function personInfoHandle()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $person = M('person');
        $card_number = I('post.card_number');
        $name = I('post.name');
        $sex = I('post.sex');
        $type = I('post.type');
        $department = I('post.department');
        $daikoufang = I('post.daikoufang');
        $ruzhan_time = I('post.ruzhan');
        $chuzhan_time = I('post.chuzhan');
        $phone_number = I('post.phone_number');
        $discount_time = I('post.discount_time');
        if(!$card_number){
            $this->error("卡号不能为空");
        }else if(!$name){
            $this->error("姓名不能为空");
        }else if(!$sex){
            $this->error("性别不能为空");
        }else if(!$type){
            $this->error("人员类别不能为空");
        }else if(!$department){
            $this->error("部门不能为空");
        }else if(!$daikoufang){
            $this->error("代扣方不能为空");
        }else if(!$phone_number){
            $this->error("电话号码不能为空");
        }else if(!$discount_time){
            $this->error("折扣率起始时间不能为空");
        }
		if(!$ruzhan_time){
			$ruzhan_time = null;
		}
		if(!$chuzhan_time){
			$chuzhan_time = null;
		}
        $data = array(
            'card_number' => $card_number,
            'name' => $name,
            'sex' => $sex,
            'type' => $type,
            'department' => $department,
            'daikoufang' => $daikoufang,
            'ruzhan_time' => $ruzhan_time,
            'chuzhan_time' => $chuzhan_time,
            'phone_number' => $phone_number,
            'discount_time' => $discount_time
        );
        $res = $person->add($data);
        if ($res) {
            $this->success("信息登记成功！");
        } else {
            $this->error("信息登记失败！");
        }
    }

    public function rentPay()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $fangzujilu = M('fangzujilu');
        $person = M('person');
        $house = M('muyecun');
        $xiaoqu = M('xiaoqu');
        $person_type=M('person_type');
        $card_number = I('get.card_number');
        $time=I('get.time');
        $houseRecord = $house->where("card_number = $card_number")->select();        
        $fangzu = $fangzujilu->where("card_number = $card_number")
            ->order('id')
            ->select();
        $count = count($fangzu);
        //判断是否指定了日期，若未指定则选择当前日期生成交租记录
        if($time){
            $current_date=strtotime($time);
        }else{
            $current_date = strtotime(date('Y-m-d'));
        }
        if ($count == 0) { // 若没有缴费记录，全部生成
                         
            // 计算入住时间到现在的月份差，生成记录表
            
            $start_date = strtotime($houseRecord[0]['start_time']);
            list ($cdate['y'], $cdate['m']) = explode("-", date('Y-m', $current_date));
            list ($sdate['y'], $sdate['m']) = explode("-", date('Y-m', $start_date));
            $m = ($cdate[y] - $sdate['y']) * 12 + $cdate['m'] - $sdate['m'] + 1;
            // $m为入住起到现在的 月数差
            
            $house_id = $houseRecord[0]['id'];
            $startdate = $houseRecord[0]['start_time'];
            // 先生成入住当月的未缴费记录
            $start = date('Y-m-d', strtotime("$startdate"));
            $firstDay = date('Y-m-01', strtotime("$startdate"));
            $end = date('Y-m-d', strtotime("$firstDay + 1 month - 1 day"));
            $month = date('Y-m-d', strtotime($start));
            
            // 计算租金1
            $area = $house->where("card_number = $card_number")
                ->field("area")
                ->select();
            $xqName = $house->where("card_number=$card_number")
                ->field("v_name")
                ->select();
            $area = $area[0]['area'];
            $xqName = $xqName[0]['v_name'];
            $where['name'] = array(
                'like',
                $xqName
            );
            $unitPrice = $xiaoqu->where($where)
                ->field("rent")
                ->select();
            $unitPrice = $unitPrice[0][rent];
            $mDay = (strtotime("$end") - strtotime("$firstDay")) / (24 * 60 * 60)+1;
            $days = (strtotime("$end") - strtotime("$start")) / (24 * 60 * 60)+1;
            $rent = ($area * $unitPrice) / $mDay * $days;
            // 计算当前递增折扣率 次数
            $person1 = $person->where("card_number=$card_number")->select();
            $type=$person1[0]['type'];
            $where['name']=$type;
            $personType=$person_type->where($where)->select();
            $max_discount = $personType[0]['max_discount'];
            $start_discount = $personType[0]['start_discount'];
            $increase_discount = $personType[0]['increase_discount'];
            $discount_time = $person1[0]['discount_time'];
            $diffYear = floor((strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60 * 365)); // 折扣率开始时间至今多少年
            if ($diffYear < 0) {
                $diffYear = 0;
            }
            // 计算折扣率 实缴租金
            $flag1 = strtotime("$start") - strtotime("$discount_time");
            $flag2 = strtotime("$end") - strtotime("$discount_time");
            if ($flag1 >= 0 && $flag2 >= 0) { // 第一种情况：折扣率起始时间在当月之前
                $discount = $start_discount + $increase_discount * $diffYear;
                if ($discount > $max_discount) {
                    $discount = $max_discount;
                }
                $realRent = $rent * ($discount / 100);
            } else 
                if ($flag1 <= 0 && $flag2 >= 0) { // 第二种情况：折扣率起始时间在当月中
                    $discount = $start_discount + $increase_discount * $diffYear;
                    if ($discount > $max_discount) {
                        $discount = $max_discount;
                    }
                    $disDay = (strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60);
                    $noDisDay = $mDay - $disDay;
                    $realRent = (($discount / 100) * $disDay + 1 * $noDisDay) / $mDay * $rent;
                } else 
                    if ($flag1 <= 0 && $flag2 <= 0) { // 第三种情况：折扣率起始时间在当月后
                        $realRent = $rent;
                    }
            $realRent=round($realRent,2);
            $data[0] = array(
                'house_id' => $house_id,
                'card_number' => $card_number,
                'start_time' => $start,
                'end_time' => $end,
                'month' => $month,
                'rent' => $realRent,
                'res_person' => "",
                'status' => '未交'
            );
            // 生成剩余未缴费记录
            for ($i = 1; $i < $m; $i ++) {
                $startFisrt=date('Y-m-01',strtotime($startdate));
                $start = date('Y-m-01', strtotime("$startFisrt + $i month"));
                $end = date('Y-m-d', strtotime("$start + 1 month - 1 day"));
                $month = date('Y-m-d', strtotime($start));
                
                // 计算租金2
                
                $mDay = (strtotime("$end") - strtotime("$start")) / (24 * 60 * 60) + 1;
                $days = (strtotime("$end") - strtotime("$start")) / (24 * 60 * 60) + 1;
                $rent = ($area * $unitPrice) / $mDay * $days;
                // 计算当前递增折扣率 次数
                $diffYear = floor((strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60 * 365)); // 折扣率开始时间至今多少年
                if ($diffYear < 0) {
                    $diffYear = 0;
                }
                // 计算折扣率 实缴租金
                $flag1 = strtotime("$start") - strtotime("$discount_time");
                $flag2 = strtotime("$end") - strtotime("$discount_time");
                if ($flag1 >= 0 && $flag2 >= 0) { // 第一种情况：折扣率起始时间在当月之前
                    $discount = $start_discount + $increase_discount * $diffYear;
                    if ($discount > $max_discount) {
                        $discount = $max_discount;
                    }
                    $realRent = $rent * ($discount / 100);
                } else 
                    if ($flag1 <= 0 && $flag2 >= 0) { // 第二种情况：折扣率起始时间在当月中
                        $discount = $start_discount + $increase_discount * $diffYear;
                        if ($discount > $max_discount) {
                            $discount = $max_discount;
                        }
                        $disDay = (strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60);
                        $noDisDay = $mDay - $disDay;
                        $realRent = (($discount / 100) * $disDay + 1 * $noDisDay) / $mDay * $rent;
                    } else 
                        if ($flag1 <= 0 && $flag2 <= 0) { // 第三种情况：折扣率起始时间在当月后
                            $realRent = $rent;
                        }
                $realRent=round($realRent,2);
                $data[$i] = array(
                    'house_id' => $house_id,
                    'card_number' => $card_number,
                    'start_time' => $start,
                    'end_time' => $end,
                    'month' => $month,
                    'rent' => $realRent,
                    'res_person' => "",
                    'status' => '未交'
                );
            }
            foreach ($data as $sql) {
                $fangzujilu->add($sql);
            }
        } else { // 若已有缴费记录，生成剩余部分
               
            // 计算入住时间到现在的月份差，生成记录表
            $start_date = strtotime($fangzu[$count - 1]['month']);
            list ($cdate['y'], $cdate['m']) = explode("-", date('Y-m', $current_date));
            list ($sdate['y'], $sdate['m']) = explode("-", date('Y-m', $start_date));
            $m = ($cdate[y] - $sdate['y']) * 12 + $cdate['m'] - $sdate['m'];
            // $m为上次缴费起到现在的 月数差(与入住 到现在的 月数差 不同）
            
            $house_id = $houseRecord[0]['id'];
            $startdate = $fangzu[$count - 1]['month'];
            // 生成剩余未缴费记录
            for ($i = 0; $i < $m; $i ++) {
                $j = $i + 1;
                $startFisrt=date('Y-m-01',strtotime("$startdate"));
                $start = date('Y-m-01', strtotime("$startFisrt + $j month"));
                $end = date('Y-m-d', strtotime("$start + 1 month - 1 day"));
                $month = date('Y-m-d', strtotime($start));
                
                // 计算租金3
                $area = $house->where("card_number = $card_number")
                    ->field("area")
                    ->select();
                $xqName = $house->where("card_number=$card_number")
                    ->field("v_name")
                    ->select();
                $area = $area[0]['area'];
                $xqName = $xqName[0]['v_name'];
                $where['name'] = array(
                    'like',
                    $xqName
                );
                $unitPrice = $xiaoqu->where($where)
                    ->field("rent")
                    ->select();
                $unitPrice = $unitPrice[0][rent];
                $mDay = (strtotime("$end") - strtotime("$start")) / (24 * 60 * 60)+1;
                $days = (strtotime("$end") - strtotime("$start")) / (24 * 60 * 60)+1;
                $rent = ($area * $unitPrice) / $mDay * $days;
                // 计算当前递增折扣率 次数
                $person1 = $person->where("card_number=$card_number")->select();
                $type=$person1[0]['type'];
                $where['name']=$type;
                $personType=$person_type->where($where)->select();
                $max_discount = $personType[0]['max_discount'];
                $start_discount = $personType[0]['start_discount'];
                $increase_discount = $personType[0]['increase_discount'];
                $discount_time = $person1[0]['discount_time'];
                $diffYear = floor((strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60 * 365)); // 折扣率开始时间至今多少年
                if ($diffYear < 0) {
                    $diffYear = 0;
                }
                // 计算折扣率 实缴租金
                $flag1 = strtotime("$start") - strtotime("$discount_time");
                $flag2 = strtotime("$end") - strtotime("$discount_time");
                if ($flag1 >= 0 && $flag2 >= 0) { // 第一种情况：折扣率起始时间在当月之前
                    $discount = $start_discount + $increase_discount * $diffYear;
                    
                    if ($discount > $max_discount) {
                        $discount = $max_discount;
                    }
                    $realRent = $rent * ($discount / 100);
                } else 
                    if ($flag1 <= 0 && $flag2 >= 0) { // 第二种情况：折扣率起始时间在当月中
                        $discount = $start_discount + $increase_discount * $diffYear;
                        
                        if ($discount > $max_discount) {
                            $discount = $max_discount;
                        }
                        $disDay = (strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60);
                        $noDisDay = $mDay - $disDay;
                        $realRent = (($discount / 100) * $disDay + 1 * $noDisDay) / $mDay * $rent;
                    } else 
                        if ($flag1 <= 0 && $flag2 <= 0) { // 第三种情况：折扣率起始时间在当月后
                            $realRent = $rent;
                        }
                $realRent=round($realRent,2);
                $data[$i] = array(
                    'house_id' => $house_id,
                    'card_number' => $card_number,
                    'start_time' => $start,
                    'end_time' => $end,
                    'month' => $month,
                    'rent' => $realRent,
                    'res_person' => "",
                    'status' => '未交'
                );
            }
            foreach ($data as $sql) {
                $fangzujilu->add($sql);
            }
        }
        
        // 显示记录
        $rent = $fangzujilu->where("card_number = $card_number")
            ->order('id desc')
            ->select();
        for ($i = 0; $i < count($rent); $i ++) {
            $rent[$i]['month'] = date('Y-m', strtotime($rent[$i]['month']));
        }
        $info = $house->where("card_number = $card_number")->select();
        $this->assign('record', $rent)->assign('info', $info[0]);
        $this->display();
    }

    public function rentPayHandle()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $fangzujilu=M('fangzujilu');
        $id=I('post.id');
        $res_person=I('post.res_person');
        $where['id']=$id;
        $update['res_person']=$res_person;
        $update['status']="已交";
        $res=$fangzujilu->where($where)->save($update);
        if($res){
            $this->success("缴费成功");
        }else{
            $this->error("缴费失败");
        }
    }
    public function rentPayBackout(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $fangzujilu=M('fangzujilu');
        $id=I('post.id');
        $where['id']=$id;
        $update['res_person']="";
        $update['status']="未交";
        $res=$fangzujilu->where($where)->save($update);
        if($res){
            $this->success("撤销成功");
        }else{
            $this->error("撤销失败");
        }
    }
    public function rentPayModify()
    {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        $start_time=I('post.start_time');
        $end_time=I('post.end_time');
        $id=I("post.id");
        $fangzujilu = M('fangzujilu');
        $person = M('person');
        $house = M('muyecun');
        $xiaoqu = M('xiaoqu');
        $person_type=M('person_type');
        $card_number = I('post.card_number');
        $fangzu = $fangzujilu->where("id = $id")->select();
		//判断输入的时间是否正确（在当月，并且大于初始日期）
        list ($t1['y'], $t1['m'],$t1['d']) = explode("-", $end_time);
        list ($t2['y'], $t2['m'],$t1['d']) = explode("-", $start_time);
        if(!($t1['y']==$t2['y']&&$t1['m']==$t2['m']&&$t1['d']>=$t2['d'])){
            $this->error("请输入正确的当月日期");
        }
		
        //将修改的结束时间存入数据库
        
        $update['end_time']=$end_time;
        $fangzujilu->where("id = $id")->save($update);

        $start = $fangzu[0]['start_time'];
        $firstDay = date('Y-m-01', strtotime("$start"));
        $end = $end_time;
        $lastDay = date('Y-m-d', strtotime("$firstDay + 1 month - 1 day"));
        
        // 计算租金
        $area = $house->where("card_number = $card_number")
        ->field("area")
        ->select();
        $xqName = $house->where("card_number = $card_number")
        ->field("v_name")
        ->select();
        $area = $area[0]['area'];
        $xqName = $xqName[0]['v_name'];
        $where['name'] = array(
            'like',
            $xqName
        );
        $unitPrice = $xiaoqu->where($where)
        ->field("rent")
        ->select();
        $unitPrice = $unitPrice[0]['rent'];
        $mDay = (strtotime("$lastDay") - strtotime("$firstDay")) / (24 * 60 * 60)+1;
        $days = (strtotime("$end") - strtotime("$start")) / (24 * 60 * 60)+1;
        $rent = ($area * $unitPrice) / $mDay * $days;
        // 计算当前递增折扣率 次数
        $person1 = $person->where("card_number=$card_number")->select();
        $type=$person1[0]['type'];
        $where['name']=array('like',$type);
        $personType=$person_type->where($where)->select();
        $max_discount = $personType[0]['max_discount'];
        $start_discount = $personType[0]['start_discount'];
        $increase_discount = $personType[0]['increase_discount'];
        $discount_time = $person1[0]['discount_time'];
        $diffYear = floor((strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60 * 365)); // 折扣率开始时间至今多少年
        if ($diffYear < 0) {
            $diffYear = 0;
        }
        // 计算折扣率 实缴租金
        $flag1 = strtotime("$start") - strtotime("$discount_time");
        $flag2 = strtotime("$end") - strtotime("$discount_time");
        if ($flag1 > 0 && $flag2 > 0) { // 第一种情况：折扣率起始时间在当月之前
            $discount = $start_discount + $increase_discount * $diffYear;
            if ($discount > $max_discount) {
                $discount = $max_discount;
            }
            $realRent = $rent * ($discount / 100);
        } else
            if ($flag1 < 0 && $flag2 > 0) { // 第二种情况：折扣率起始时间在当月中
                $discount = $start_discount + $increase_discount * $diffYear;
                if ($discount > $max_discount) {
                    $discount = $max_discount;
                }
                $disDay = (strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60);
                $noDisDay = $mDay - $disDay;
                $realRent = (($discount / 100) * $disDay + 1 * $noDisDay) / $mDay * $rent;
        } else
            if ($flag1 < 0 && $flag2 < 0) { // 第三种情况：折扣率起始时间在当月后
                $realRent = $rent;
        }
        $realRent=round($realRent,2);
        $update['rent'] = $realRent;
        $res=$fangzujilu->where("id = $id")->save($update);
        if($res){
            $this->success("修改成功");
        }else{
            $this->error("修改失败");
        }
    }
    
    public function xiaoquModify(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $xiaoqu=M('xiaoqu');
        $data=$xiaoqu->select();
        $this->assign('xiaoqu',$data);
        $this->display();
    }
    public function xiaoquModifyHandle(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $id=I('post.id');
        $xiaoqu=M('xiaoqu');
        $type=I('post.type');
        $rent=I('post.rent');
        $income=I('post.income');
        $expenditure=I('post.expenditure');
        $manage=I('post.manage');
        $others=I('post.others');
        $update=array(
            'type'=>$type,
            'rent'=>$rent,
            'income'=>$income,
            'expenditure'=>$expenditure,
            'manage'=>$manage,
            'others'=>$others
        );
        $res=$xiaoqu->where("id=$id")->save($update);
        if($res){
            $this->success("修改成功");
        }else{
            $this->error("修改失败");              
        }
    }
    public function xiaoquAdd(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $xiaoqu=M('xiaoqu');
        $name=I('post.name');
        $type=I('post.type');
        $rent=I('post.rent');
        $income=I('post.income');
        $expenditure=I('post.expenditure');
        $manage=I('post.manage');
        $others=I('post.others');
        $data=array(
            'name'=>$name,
            'type'=>$type,
            'rent'=>$rent,
            'income'=>$income,
            'expenditure'=>$expenditure,
            'manage'=>$manage,
            'others'=>$others
        );
        $res=$xiaoqu->add($data);
        if($res){
            $this->success("添加成功");
        }else{
            $this->error("添加失败");
        }
    }
    
    public function xiaoquDelete(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $id=I('get.id');
        $xiaoqu=M('xiaoqu');
        $res=$xiaoqu->where("id=$id")->delete();
        if($res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    
    public function statistics() {
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $this->display();
    }
    
    public function form1(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        
        $house=M('muyecun');
        $rent=M('fangzujilu');
        $xiaoqu=M('xiaoqu');
        $form=M('form1_temp');
        $time=I('post.time');
        
        if(!$time){
            $this->error("请输入报表日期");
        }
        $formTime=$form->field('time')->select();
        $flag = 0; //查找报表是否存在 存在为1 不存在为0
        foreach($formTime as $f){
            list($t1['y'],$t1['m'])=explode("-", $time);
            list($t2['y'],$t2['m'])=explode("-", $f['time']);
            if($t1['y']==$t2['y']&&$t1['m']==$t2['m']){
                $flag=1;
                break;
            }
        }
        
        $xiaoquData=$xiaoqu->select();
        $xiaoquQuantity=count($xiaoquData);
        $i=0;
        foreach($xiaoquData as $x){
            $name=$x[name];
            $expense=$x['expenditure'];
            $manage=$x['manage'];
            $others=$x['others'];
            $where['v_name']=$name;
            $houseData=$house->where($where)->select();
            $xiaoquRent=0;
            $xiaoquExpense=$expense;
            $xiaoquNumber=0;
            $xiaoquManage=$manage;
            $xiaoquOthers=0;
            foreach($houseData as $h){
                $xiaoquOthers+=$h['area']*$xiaoquOthers;
                if($h['state']=="在用"){
                    $id=$h['id'];
                    $rentData=$rent->where("house_id = $id")->select();
                    $xiaoquNumber++;
                    foreach($rentData as $r){
                        $recordTime=$r['month'];
                        list($t1['y'],$t1['m'])=explode("-", $time);
                        list($t2['y'],$t2['m'])=explode("-", $recordTime);
                        if($t1['y']==$t2['y']&&$t1['m']==$t2['m']&&$r['status']=="已交"){
                            $xiaoquRent+=$r['rent'];
                            break;
                        }
                    }
                }
            }
            $data[$i]=array(
                    'time'=>$time,
                    'name'=>$name,
                    'number'=>$xiaoquNumber,
                    'rent'=>$xiaoquRent,
                    'expense'=>$xiaoquExpense,
                    'manage'=>$xiaoquManage,
                    'others'=>$xiaoquOthers
                );
            $formData=$form->select();
            if($flag==0){
                $form->add($data[$i]);
            }else{
                foreach ($formData as $f){
                    list($t1['y'],$t1['m'])=explode("-", $time);
                    list($t2['y'],$t2['m'])=explode("-", $f['time']);
                    if($t1['y']==$t2['y']&&$t1['m']==$t2['m']&&$f['name']==$name){
                        $id=$f['id'];
                        $form->where("id = $id")->delete();
                    }
                }
                $form->add($data[$i]);
            }
            $i++;
        }
        $total=array(
            'rent'=>0,
            'expense'=>0,
            'manage'=>0,
            'others'=>0
        );
        foreach ($data as $d){
          $total['rent']+=$d['rent'];
          $total['expense']+=$d['expense'];
          $total['manage']+=$d['manage'];
          $total['others']+=$d['others'];
        }
        $total['differ']=$total['rent']-$total['expense']-$total['manage']-$total['others'];
        list($t1['y'],$t1['m'])=explode("-", $time);
        $this->assign('total',$total);
        $this->assign('time',$t1);
        $this->assign("data",$data);
        $this->display();
    }
    
    public function form1Excel()
    {
        $data1 = S('data');//读取缓存
        S('data',NULL);//删除缓存
        $user = M('form1_temp');
        $data = $user->where($data1)->select();
    
        $headArr = array();
    
        $headArr[]='序号';
        $headArr[]='小区名称';
        $headArr[]='收回的租金（月/元）';
        $headArr[]='付出的租金（月/元）';
        $headArr[]='管理费';
        $headArr[]='备注';
    
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
    
        $date = $data[0]['time'];
        list($t['y'],$t['m'])=explode('-',$date);
        $fileName .= "{$t['y']}年{$t['m']}月各小区租金收付对照统计表.xls";
    
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
    
        $allRent=0;
        $allExpense=0;
        $allManage=0;
        $allOthers=0;
        for($key=0;$key<$sum; ++$key){ //行写入
    
            $allRent+=$data[$key]['rent'];
            $allExpense+=$data[$key]['expense'];
            $allManage+=$data[$key]['manage'];
            $allOthers+=$data[$key]['others'];
            $objActSheet->setCellValue("A".$i,$key+1);
            $objActSheet->setCellValue("B".$i, $data[$key]['name']);
            $objActSheet->setCellValue("C".$i,$data[$key]['rent']);
            $objActSheet->setCellValue("D".$i,$data[$key]['expense']);
            $objActSheet->setCellValue("E".$i,$data[$key]['manage']);
            $objActSheet->setCellValue("F".$i, $data[$key]['others']);
            $i++;
        }
        $objActSheet->setCellValue("B".$i, "合计");
        $objActSheet->setCellValue("C".$i,$allRent);
        $objActSheet->setCellValue("D".$i,$allExpense);
        $objActSheet->setCellValue("E".$i,$allManage);
        $objActSheet->setCellValue("F".$i, $allOthers);
        $i++;
        $objActSheet->setCellValue("B".$i, "合计差额");
        $objActSheet->setCellValue("C".$i, $allRent-$allExpense-$allManage-$allOthers);
    
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
    
    public function form2(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $house=M('muyecun');
        $rent=M('fangzujilu');
        $xiaoqu=M('xiaoqu');
        $time=I('post.time');

        if(!$time){
            $this->error("请输入报表日期");
        }
        
        $xiaoquData=$xiaoqu->select();
        $xiaoquQuantity=count($xiaoquData);
        $rentData=$rent->select();
        $rentQuantity=count($rentData);
        foreach($xiaoquData as $x){
            $name=$x['name'];
            $i=0;
            $allRent=0;
            $data[$name][$i]['v_name']=$name;
            foreach($rentData as $r){
                $house_id=$r['house_id'];
                $h=$house->where("id = $house_id")->select();
                list($t1['y'],$t1['m'])=explode("-", $time);
                list($t2['y'],$t2['m'])=explode("-", $r['start_time']);
                if($h[0]['v_name']==$name&&$t1['y']==$t2['y']&&$t1['m']==$t2['m']&&$r['status']=="已交"){
                    $data[$name][$i]['v_name']=$name;
                    $data[$name][$i]['house_number']=$h[0]['house_number'];
                    $data[$name][$i]['area']=$h[0]['area'];
                    $data[$name][$i]['card_number']=$h[0]['card_number'];
                    $data[$name][$i]['name']=$h[0]['owner_name'];
                    $data[$name][$i]['rent']=$r['rent'];
                    $data[$name][$i]['time']=$r['month'];
                    $data[$name][$i]['start_time']=$h[0]['start_time'];
                    $allRent+=$r['rent'];
                    $i++;
                }
                
            }
            $data[$name][$i]['name']="合计";
            $data[$name][$i]['rent']=$allRent;
        }
        $this->assign('data',$data);
        list($t1['y'],$t1['m'])=explode("-", $time);
        $this->assign('time',$t1);
        $this->display();
        
    }
    
    public function form2Excel(){
        $house=M('muyecun');
        $rent=M('fangzujilu');
        $xiaoqu=M('xiaoqu');
        $y=I('get.y');
        $m=I('get.w');
        
        $xiaoquData=$xiaoqu->select();
        $xiaoquQuantity=count($xiaoquData);
        $rentData=$rent->select();
        $rentQuantity=count($rentData);
        foreach($xiaoquData as $x){
            $name=$x['name'];
            $i=0;
            $allRent=0;
            $data[$name][$i]['v_name']=$name;
            foreach($rentData as $r){
                $house_id=$r['house_id'];
                $h=$house->where("id = $house_id")->select();
                list($t2['y'],$t2['m'])=explode("-", $r['start_time']);
                if($h[0]['v_name']==$name&&$y==$t2['y']&&$m==$t2['m']&&$r['status']=="已交"){
                    $data[$name][$i]['v_name']=$name;
                    $data[$name][$i]['house_number']=$h[0]['house_number'];
                    $data[$name][$i]['area']=$h[0]['area'];
                    $data[$name][$i]['card_number']=$h[0]['card_number'];
                    $data[$name][$i]['name']=$h[0]['owner_name'];
                    $data[$name][$i]['rent']=$r['rent'];
                    $data[$name][$i]['time']=$r['month'];
                    $data[$name][$i]['start_time']=$h[0]['start_time'];
                    $allRent+=$r['rent'];
                    $i++;
                }
        
            }
            $data[$name][$i]['name']="合计";
            $data[$name][$i]['rent']=$allRent;
        }
        
        
    
        $headArr = array();
        
        $headArr[]='序号';
        $headArr[]='小区名称';
        $headArr[]='房号';
        $headArr[]='面积';
        $headArr[]='校园卡号';
        $headArr[]='姓名';
        $headArr[]='租金';
        $headArr[]='扣缴说明';
        $headArr[]='性质';
        $headArr[]='备注';
        
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
        
        $fileName .= "{$y}年{$m}月周转房房租扣缴明细表.xls";
        
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
        foreach ($data as $d){ //行写入
            $key=1;
            foreach($d as $x){
            $objActSheet->setCellValue("A".$i,$key++);
            $objActSheet->setCellValue("B".$i, $x['v_name']);
            $objActSheet->setCellValue("C".$i,$x['house_number']);
            $objActSheet->setCellValue("D".$i,$x['area']);
            $objActSheet->setCellValue("E".$i,$x['card_number']);
            $objActSheet->setCellValue("F".$i, $x['name']);
            $objActSheet->setCellValue("G".$i, $x['rent']);
            $objActSheet->setCellValue("H".$i, $x['time']);
            $objActSheet->setCellValue("I".$i, $x['start_time']);
            $i++;
            }
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

    public function form5(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $house=M('muyecun');
        $rent=M('fangzujilu');
        $xiaoqu=M('xiaoqu');
        $time=I('post.time');

        if(!$time){
            $this->error("请输入报表日期");
        }
        
        $xiaoquData=$xiaoqu->select();
        $xiaoquQuantity=count($xiaoquData);
        $rentData=$rent->select();
        $rentQuantity=count($rentData);
        foreach($xiaoquData as $x){
            $name=$x['name'];
            $i=0;
            $allRent=0;
            $data[$name][$i]['v_name']=$name;
            foreach($rentData as $r){
                $house_id=$r['house_id'];
                $h=$house->where("id = $house_id")->select();
                list($t1['y'],$t1['m'])=explode("-", $time);
                list($t2['y'],$t2['m'])=explode("-", $r['start_time']);
                if($h[0]['v_name']==$name&&$t1['y']==$t2['y']&&$t1['m']==$t2['m']&&$r['status']=="未交"){
                    $data[$name][$i]['v_name']=$name;
                    $data[$name][$i]['house_number']=$h[0]['house_number'];
                    $data[$name][$i]['area']=$h[0]['area'];
                    $data[$name][$i]['card_number']=$h[0]['card_number'];
                    $data[$name][$i]['name']=$h[0]['owner_name'];
                    $data[$name][$i]['rent']=$r['rent'];
                    $data[$name][$i]['time']=$r['month'];
                    $data[$name][$i]['start_time']=$h[0]['start_time'];
                    $allRent+=$r['rent'];
                    $i++;
                }
                
            }
            $data[$name][$i]['name']="合计";
            $data[$name][$i]['rent']=$allRent;
        }
        $this->assign('data',$data);
        list($t1['y'],$t1['m'])=explode("-", $time);
        $this->assign('time',$t1);
        $this->display();
    }

    public function form5Excel(){
        $house=M('muyecun');
        $rent=M('fangzujilu');
        $xiaoqu=M('xiaoqu');
        $y=I('get.y');
        $m=I('get.w');
        
        $xiaoquData=$xiaoqu->select();
        $xiaoquQuantity=count($xiaoquData);
        $rentData=$rent->select();
        $rentQuantity=count($rentData);
        foreach($xiaoquData as $x){
            $name=$x['name'];
            $i=0;
            $allRent=0;
            $data[$name][$i]['v_name']=$name;
            foreach($rentData as $r){
                $house_id=$r['house_id'];
                $h=$house->where("id = $house_id")->select();
                list($t2['y'],$t2['m'])=explode("-", $r['start_time']);
                if($h[0]['v_name']==$name&&$y==$t2['y']&&$m==$t2['m']&&$r['status']=="未交"){
                    $data[$name][$i]['v_name']=$name;
                    $data[$name][$i]['house_number']=$h[0]['house_number'];
                    $data[$name][$i]['area']=$h[0]['area'];
                    $data[$name][$i]['card_number']=$h[0]['card_number'];
                    $data[$name][$i]['name']=$h[0]['owner_name'];
                    $data[$name][$i]['rent']=$r['rent'];
                    $data[$name][$i]['time']=$r['month'];
                    $data[$name][$i]['start_time']=$h[0]['start_time'];
                    $allRent+=$r['rent'];
                    $i++;
                }
        
            }
            $data[$name][$i]['name']="合计";
            $data[$name][$i]['rent']=$allRent;
        }
        
        
    
        $headArr = array();
        
        $headArr[]='序号';
        $headArr[]='小区名称';
        $headArr[]='房号';
        $headArr[]='面积';
        $headArr[]='校园卡号';
        $headArr[]='姓名';
        $headArr[]='租金';
        $headArr[]='扣缴说明';
        $headArr[]='性质';
        $headArr[]='备注';
        
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
        
        $fileName .= "{$y}年{$m}月周转房房租扣缴明细表(未交租).xls";
        
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
        foreach ($data as $d){ //行写入
            $key=1;
            foreach($d as $x){
            $objActSheet->setCellValue("A".$i,$key++);
            $objActSheet->setCellValue("B".$i, $x['v_name']);
            $objActSheet->setCellValue("C".$i,$x['house_number']);
            $objActSheet->setCellValue("D".$i,$x['area']);
            $objActSheet->setCellValue("E".$i,$x['card_number']);
            $objActSheet->setCellValue("F".$i, $x['name']);
            $objActSheet->setCellValue("G".$i, $x['rent']);
            $objActSheet->setCellValue("H".$i, $x['time']);
            $objActSheet->setCellValue("I".$i, $x['start_time']);
            $i++;
            }
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
    
    public function form3(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $xiaoqu=M('xiaoqu');
        $house=M('muyecun');
        $form1=M('form1_temp');
        $time=I('post.time');
        
        if(!$time){
            $this->error("请输入报表日期");
        }
        
        list($t1['y'],$t1['m'])=explode("-",$time);
        $xiaoquData=$xiaoqu->select();
        $form1Data=$form1->select();
        $xiaoquType=array(
            '政府','区政府','自有','社会'
        );
        
        $i=0;
        $thF=0;     //最终合计
        $ehF=0;
        $rentF=0;
        $expenseF=0;
        foreach($xiaoquType as $t){
            $thT=0; //合计
            $uhT=0;
            $rentT=0;
            $expenseT=0;
            $j=0;
            foreach($xiaoquData as $x){
                $totalHouse=0;
                $usedHouse=0;
                $rent=0;
                $expense=0;
                $v_name=$x['name'];
                $price=$x['rent'];
                if($x['type']==$t){
                    $where['v_name']=$v_name;
                    $houseData=$house->where($where)->select();
                    $totalHouse=count($houseData);
                    foreach($houseData as $h){
                        if($h['state']=="在用")  $usedHouse++;
                    }
                    foreach($form1Data as $f){
                        list($t2['y'],$t2['m'])=explode("-", $f['time']);
                        if($t1['y']==$t2['y'] && $t1['m']==$t2['m'] && $v_name==$f['name']){
                            $rent=$f['rent'];
                            $expense=$f['expense'];
                        }
                    }
                    $data[$i][$j]=array(
                        'type'=>$t,
                        'name'=>$v_name,
                        'price'=>$price,
                        'totalHouse'=>$totalHouse,
                        'usedHouse'=>$usedHouse,
                        'rent'=>$rent,
                        'expense'=>$expense,
                        'differ'=>$rent-$expense
                    );
                    $thT+=$totalHouse;
                    $uhT+=$usedHouse;
                    $rentT+=$rent;
                    $expenseT+=$expense;
                    $j++;
                }
            }
            $data[$i][$j]=array(
                'type'=>$t,
                'name'=>"合计",
                'price'=>"",
                'totalHouse'=>$thT,
                'usedHouse'=>$uhT,
                'rent'=>$rentT,
                'expense'=>$expenseT,
                'differ'=>$rentT-$expenseT
            );
            $thF+=$thT;
            $uhF+=$uhT;
            $rentF+=$rentT;
            $expenseF+=$expenseT;
            $i++;
        }
        $total=array(
            'type'=>"总计",
            'name'=>"",
            'price'=>"",
            'totalHouse'=>$thF,
            'usedHouse'=>$uhF,
            'rent'=>$rentF,
            'expense'=>$expenseF,
            'differ'=>$rentF-$expenseF
        );
        $this->assign('data',$data)->assign('total',$total)->assign('time',$t1)->display();
    }
    
    public function form3Excel(){
        $xiaoqu=M('xiaoqu');
        $house=M('muyecun');
        $form1=M('form1_temp');
        $t1['y']=I('get.y');
        $t1['m']=I('get.w');
        
        $xiaoquData=$xiaoqu->select();
        $form1Data=$form1->select();
        $xiaoquType=array(
            '政府','区政府','自有','社会'
        );
        
        $i=0;
        $thF=0;     //最终合计
        $ehF=0;
        $rentF=0;
        $expenseF=0;
        foreach($xiaoquType as $t){
            $thT=0; //合计
            $uhT=0;
            $rentT=0;
            $expenseT=0;
            $j=0;
            foreach($xiaoquData as $x){
                $totalHouse=0;
                $usedHouse=0;
                $rent=0;
                $expense=0;
                $v_name=$x['name'];
                $price=$x['rent'];
                if($x['type']==$t){
                    $where['v_name']=array('like',$v_name);
                    $houseData=$house->where($where)->select();
                    $totalHouse=count($houseData);
                    foreach($houseData as $h){
                        if($h['state']=="在用")  $usedHouse++;
                    }
                    foreach($form1Data as $f){
                        list($t2['y'],$t2['m'])=explode("-", $f['time']);
                        if($t1['y']==$t2['y'] && $t1['m']==$t2['m'] && $v_name==$f['name']){
                            $rent=$f['rent'];
                            $expense=$f['expense'];
                        }
                    }
                    $data[$i][$j]=array(
                        'type'=>$t,
                        'name'=>$v_name,
                        'price'=>$price,
                        'totalHouse'=>$totalHouse,
                        'usedHouse'=>$usedHouse,
                        'rent'=>$rent,
                        'expense'=>$expense,
                        'differ'=>$rent-$expense
                    );
                    $thT+=$totalHouse;
                    $uhT+=$usedHouse;
                    $rentT+=$rent;
                    $expenseT+=$expense;
                    $j++;
                }
            }
            $data[$i][$j]=array(
                'type'=>$t,
                'name'=>"合计",
                'price'=>"",
                'totalHouse'=>$thT,
                'usedHouse'=>$uhT,
                'rent'=>$rentT,
                'expense'=>$expenseT,
                'differ'=>$rentT-$expenseT
            );
            $thF+=$thT;
            $uhF+=$uhT;
            $rentF+=$rentT;
            $expenseF+=$expenseT;
            $i++;
        }
        $total=array(
            'type'=>"总计",
            'name'=>"",
            'price'=>"",
            'totalHouse'=>$thF,
            'usedHouse'=>$uhF,
            'rent'=>$rentF,
            'expense'=>$expenseF,
            'differ'=>$rentF-$expenseF
        );
    
    
    
        $headArr = array();
    
        $headArr[]='房源类别';
        $headArr[]='小区名称';
        $headArr[]='单价';
        $headArr[]='总套数';
        $headArr[]='入住套数';
        $headArr[]='收入';
        $headArr[]='支出';
        $headArr[]='实际';
    
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
    
        $fileName .= "{$t1['y']}年{$t1['m']}月房源分类统计表.xls";
    
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
        foreach ($data as $d){ //行写入
            $key=1;
            foreach($d as $x){
                $objActSheet->setCellValue("A".$i,$x['type']);
                $objActSheet->setCellValue("B".$i, $x['name']);
                $objActSheet->setCellValue("C".$i,$x['price']);
                $objActSheet->setCellValue("D".$i,$x['totalHouse']);
                $objActSheet->setCellValue("E".$i,$x['usedHouse']);
                $objActSheet->setCellValue("F".$i, $x['rent']);
                $objActSheet->setCellValue("G".$i, $x['expense']);
                $objActSheet->setCellValue("H".$i, $x['differ']);
                $i++;
            }
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
    
    public function form4(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $house=M('muyecun');
        $rent=M('fangzujilu');
        $xiaoqu=M('xiaoqu');
        $time=I('post.time');
        $person=M('person');
        
        if(!$time){
            $this->error("请输入报表日期");
        }
        
        
        $xiaoquData=$xiaoqu->select();
        $xiaoquQuantity=count($xiaoquData);
        $i=0;
        //总计
        $person1T=0;
        $person2T=0;
        $person3T=0;
        $person4T=0;
        $rent1T=0;
        $rent2T=0;
        $rent3T=0;
        $rent4T=0;
        foreach($xiaoquData as $x){
            $name=$x[name];
            // 1=工资库代扣  ；  2=师院代扣；  3=附中代扣；  4=银行代扣  ；    person 总人数    rent 总租金
            $person1=0;
            $rent1=0;
            $person2=0;
            $rent2=0;
            $person3=0;
            $rent3=0;
            $person4=0;
            $rent4=0;
            
            $where['v_name']=$name;
            $houseData=$house->where($where)->select();
            foreach($houseData as $h){              //遍历该小区所有用户
                if($h['state']=="在用"){
                    $card=$h['card_number'];
                    $daikoufang=$person->where("card_number = $card")->field("daikoufang")->select();
                    $daikoufang=$daikoufang[0]['daikoufang'];
                    $rentData=$rent->select();  //调出该小区某个人的所有房租记录
                    foreach ($rentData as $r){
                        list($t1['y'],$t1['m'])=explode("-", $time);  //生成表的时间
                        list($t2['y'],$t2['m'])=explode("-", $r[month]); //缴费记录中的时间 选择出相同时间的租金
                        if($t1['y']==$t2['y']&&$t1['m']==$t2['m']){
                            $money=$r['rent'];            //找到缴费金额 推出循环 保存在money中
                            break;
                        }
                    }
                    if($daikoufang=="工资库代扣"){
                        $person1++;
                        $rent1+=$money;
                    }else if($daikoufang=="师院代扣"){
                        $person2++;
                        $rent2+=$money;
                    }else if($daikoufang=="附中代扣"){
                        $person3++;
                        $rent3+=$money;
                    }else if($daikoufang=="银行代扣"){
                        $person4++;
                        $rent4+=$money;
                    }
                }
            }// 该小区所有用户 人数 金额统计完毕 存储数据
            $data[$i]=array(
                "name"=>$name,
                "person1"=>$person1,
                "rent1"=>$rent1,
                "person2"=>$person2,
                "rent2"=>$rent2,
                "person3"=>$person3,
                "rent3"=>$rent3,
                "person4"=>$person4,
                "rent4"=>$rent4
            );
            $person1T+=$person1;
            $person2T+=$person2;
            $person3T+=$person3;
            $person4T+=$person4;
            $rent1T+=$rent1;
            $rent2T+=$rent2;
            $rent3T+=$rent3;
            $rent4T+=$rent4;
            $i++;
        }
        //总计数据
        $data[$i]=array(
            "name"=>"总计",
            "person1"=>$person1T,
            "rent1"=>$rent1T,
            "person2"=>$person2T,
            "rent2"=>$rent2T,
            "person3"=>$person3T,
            "rent3"=>$rent3T,
            "person4"=>$person4T,
            "rent4"=>$rent4T
        );
        list($t1['y'],$t1['m'])=explode("-", $time);
        $this->assign('time',$t1);
        $this->assign("data",$data);
        $this->display();
    }
    
    public function form4Excel(){
        $data1 = S('data');//读取缓存
        S('data',NULL);//删除缓存
        //计算数据 start
        $house=M('muyecun');
        $rent=M('fangzujilu');
        $xiaoqu=M('xiaoqu');
        $person=M('person');
        $y=I('get.y');
        $m=I('get.w');
        $time=$y.'-'.$m;
        
        
        $xiaoquData=$xiaoqu->select();
        $xiaoquQuantity=count($xiaoquData);
        $i=0;
        $person1T=0;
        $person2T=0;
        $person3T=0;
        $person4T=0;
        $rent1T=0;
        $rent2T=0;
        $rent3T=0;
        $rent4T=0;
        foreach($xiaoquData as $x){
            $name=$x[name];
            // 1=工资库代扣  ；  2=师院代扣；  3=附中代扣；  4=银行代扣  ；    person 总人数    rent 总租金
            $person1=0;
            $rent1=0;
            $person2=0;
            $rent2=0;
            $person3=0;
            $rent3=0;
            $person4=0;
            $rent4=0;
            $where['v_name']=array('like',$name);
            $houseData=$house->where($where)->select();
            foreach($houseData as $h){              //遍历该小区所有用户
                if($h['state']=="在用"){
                    $card=$h['card_number'];
                    $daikoufang=$person->where("card_number = $card")->field("daikoufang")->select();
                    $daikoufang=$daikoufang[0]['daikoufang'];
                    $rentData=$rent->select();  //调出该小区某个人的所有房租记录
                    foreach ($rentData as $r){
                        list($t1['y'],$t1['m'])=explode("-", $time);  //生成表的时间
                        list($t2['y'],$t2['m'])=explode("-", $r[month]); //缴费记录中的时间 选择出相同时间的租金
                        if($t1['y']==$t2['y']&&$t1['m']==$t2['m']){
                            $money=$r['rent'];            //找到缴费金额 推出循环 保存在money中
                            break;
                        }
                    }
                    if($daikoufang=="工资库代扣"){
                        $person1++;
                        $rent1+=$money;
                    }else if($daikoufang=="师院代扣"){
                        $person2++;
                        $rent2+=$money;
                    }else if($daikoufang=="附中代扣"){
                        $person3++;
                        $rent3+=$money;
                    }else if($daikoufang=="银行代扣"){
                        $person4++;
                        $rent4+=$money;
                    }
                }
            }// 该小区所有用户 人数 金额统计完毕 存储数据
            $data[$i]=array(
                "name"=>$name,
                "person1"=>$person1,
                "rent1"=>$rent1,
                "person2"=>$person2,
                "rent2"=>$rent2,
                "person3"=>$person3,
                "rent3"=>$rent3,
                "person4"=>$person4,
                "rent4"=>$rent4
            );
            $person1T+=$person1;
            $person2T+=$person2;
            $person3T+=$person3;
            $person4T+=$person4;
            $rent1T+=$rent1;
            $rent2T+=$rent2;
            $rent3T+=$rent3;
            $rent4T+=$rent4;
            $i++;
        }
        $data[$i]=array(
            "name"=>"总计",
            "person1"=>$person1T,
            "rent1"=>$rent1T,
            "person2"=>$person2T,
            "rent2"=>$rent2T,
            "person3"=>$person3T,
            "rent3"=>$rent3T,
            "person4"=>$person4T,
            "rent4"=>$rent4T
        );
        //计算数据 end
        
        $headArr = array();
        
        $headArr[]='序号';
        $headArr[]='小区名称';
        $headArr[]='工资库代扣人数';
        $headArr[]='工资库代扣金额';
        $headArr[]='师院代扣人数';
        $headArr[]='师院代扣金额';
        $headArr[]='附中代扣人数';
        $headArr[]='附中代扣金额';
        $headArr[]='银行代扣人数';
        $headArr[]='银行代扣金额';
        
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
        
        list($t['y'],$t['m'])=explode('-',$time);
        $fileName .= "{$t['y']}年{$t['m']}月周转房扣缴房租统计表.xls";
        
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
        
        $allRent=0;
        $allExpense=0;
        $allManage=0;
        $allOthers=0;
        for($key=0;$key<$sum; ++$key){ //行写入
        
            $objActSheet->setCellValue("A".$i,$key+1);
            $objActSheet->setCellValue("B".$i, $data[$key]['name']);
            $objActSheet->setCellValue("C".$i,$data[$key]['person1']);
            $objActSheet->setCellValue("D".$i,$data[$key]['rent1']);
            $objActSheet->setCellValue("E".$i,$data[$key]['person2']);
            $objActSheet->setCellValue("F".$i, $data[$key]['rent2']);
            $objActSheet->setCellValue("G".$i,$data[$key]['person3']);
            $objActSheet->setCellValue("H".$i, $data[$key]['rent3']);
            $objActSheet->setCellValue("I".$i,$data[$key]['person4']);
            $objActSheet->setCellValue("J".$i, $data[$key]['rent4']);
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
    
    public function typeModify(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $type=M('person_type');
        $data=$type->select();
        $this->assign('type',$data);
        $this->display();
    }
    
    public function typeDelete(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $id=I('get.id');
        $type=M('person_type');
        $res=$type->where("id=$id")->delete();
        if($res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
        
    }
    public function typeModifyHandle(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $type=M('person_type');
        $id=I('post.id');
        $start=I('post.start_discount');
        $increase=I('post.increase_discount');
        $max=I('post.max_discount');
        
        $update=array(
          'increase_discount'=>$increase,
          'start_discount'=>$start,
          'max_discount'=>$max
        );
        $rs=$type->where("id=$id")->save($update);
        if($rs){
            $this->success("修改成功");
        }else{
            $this->error("修改失败");
        }
    }
    public function typeAdd(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $type=M('person_type');
        $name=I('post.type');
        $start=I('post.start');
        $increase=I('post.increase');
        $max=I('post.max');
        
        $update=array(
            'name'=>$name,
            'increase_discount'=>$increase,
            'start_discount'=>$start,
            'max_discount'=>$max
        );
        $rs=$type->add($update);
        if($rs){
            $this->success("添加成功");
        }else{
            $this->error("添加失败");
        }
    }
    public function autoRent(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $this->display();
    }
    public function autoRentHandle(){
        //判断用户session是否存在 未设置则重新登陆
        if (!isset($_SESSION['name']))
        {
            $this->error("请登录",U('Index/login'));
        }
        
        $time=I('post.time');
        $fangzujilu = M('fangzujilu');
        $person = M('person');
        $house = M('muyecun');
        $xiaoqu = M('xiaoqu');
        $person_type=M('person_type');
        $time=I('post.time');
        
        //判断是否指定了日期，若未指定则选择当前日期生成交租记录
        if($time){
            $current_date=strtotime($time);
        }else{
            $current_date = strtotime(date('Y-m-d'));
        }
        $personData = $person->select();
        foreach ($personData as $p){
            $daikou = $p['daikoufang'];
            $card_number = $p['card_number'];
            if($daikou == "工资库代扣" || $daikou == "师院代扣" || $daikou == "附中代扣"){
                $isDaikou = 1;    
                //先将已有未交记录变更为已交
                $rentExist = $fangzujilu->where("card_number = $card_number")->select();
                foreach ($rentExist as $re) {  
                    $re['status']="已交";
                    $fangzujilu->save($re);
                }
            }else{
                $isDaikou = 0;
            }
//////////////////////////遍历所有人员 若代扣方不是银行，则自动交租，生成记录
            $houseRecord = $house->where("card_number = $card_number")->select();
            if($houseRecord){
                $fangzu = $fangzujilu->where("card_number = $card_number")
                ->order('id')
                ->select();
                $count = count($fangzu);
                if ($count == 0) { // 若没有缴费记录，全部生成
                     
                    // 计算入住时间到现在的月份差，生成记录表
                
                    $start_date = strtotime($houseRecord[0]['start_time']);
                    list ($cdate['y'], $cdate['m']) = explode("-", date('Y-m', $current_date));
                    list ($sdate['y'], $sdate['m']) = explode("-", date('Y-m', $start_date));
                    $m = ($cdate['y'] - $sdate['y']) * 12 + $cdate['m'] - $sdate['m'] + 1;
                    // $m为入住起到现在的 月数差
                
                    $house_id = $houseRecord[0]['id'];
                    $startdate = $houseRecord[0]['start_time'];
                    // 先生成入住当月的未缴费记录
                    $start = date('Y-m-d', strtotime("$startdate"));
                    $firstDay = date('Y-m-01', strtotime("$startdate"));
                    $end = date('Y-m-d', strtotime("$firstDay + 1 month - 1 day"));
                    $month = date('Y-m-d', strtotime($start));
                
                    // 计算租金1
                    $area = $house->where("card_number = $card_number")
                    ->field("area")
                    ->select();
                    $xqName = $house->where("card_number=$card_number")
                    ->field("v_name")
                    ->select();
                    $area = $area[0]['area'];
                    $xqName = $xqName[0]['v_name'];
                    $where['name'] = $xqName;
                    $unitPrice = $xiaoqu->where($where)
                    ->field("rent")
                    ->select();
                    $unitPrice = $unitPrice[0][rent];
                    $mDay = (strtotime("$end") - strtotime("$firstDay")) / (24 * 60 * 60)+1;
                    $days = (strtotime("$end") - strtotime("$start")) / (24 * 60 * 60)+1;
                    $rent = ($area * $unitPrice) / $mDay * $days;
                    // 计算当前递增折扣率 次数
                    $person1 = $person->where("card_number=$card_number")->select();
                    $type=$person1[0]['type'];
                    $where['name']=$type;
                    $personType=$person_type->where($where)->select();
                    $max_discount = $personType[0]['max_discount'];
                    $start_discount = $personType[0]['start_discount'];
                    $increase_discount = $personType[0]['increase_discount'];
                    $discount_time = $person1[0]['discount_time'];
                    $diffYear = floor((strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60 * 365)); // 折扣率开始时间至今多少年
                    if ($diffYear < 0) {
                        $diffYear = 0;
                    }
                    // 计算折扣率 实缴租金
                    $flag1 = strtotime("$start") - strtotime("$discount_time");
                    $flag2 = strtotime("$end") - strtotime("$discount_time");
                    if ($flag1 >= 0 && $flag2 >= 0) { // 第一种情况：折扣率起始时间在当月之前
                        $discount = $start_discount + $increase_discount * $diffYear;
                        if ($discount > $max_discount) {
                            $discount = $max_discount;
                        }
                        $realRent = $rent * ($discount / 100);
                    } else
                        if ($flag1 <= 0 && $flag2 >= 0) { // 第二种情况：折扣率起始时间在当月中
                            $discount = $start_discount + $increase_discount * $diffYear;
                            if ($discount > $max_discount) {
                                $discount = $max_discount;
                            }
                            $disDay = (strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60);
                            $noDisDay = $mDay - $disDay;
                            $realRent = (($discount / 100) * $disDay + 1 * $noDisDay) / $mDay * $rent;
                    } else
                        if ($flag1 <= 0 && $flag2 <= 0) { // 第三种情况：折扣率起始时间在当月后
                            $realRent = $rent;
                    }
                    $realRent=round($realRent,2);
                    if($isDaikou){
                        $data[0] = array(
                            'house_id' => $house_id,
                            'card_number' => $card_number,
                            'start_time' => $start,
                            'end_time' => $end,
                            'month' => $month,
                            'rent' => $realRent,
                            'res_person' => "",
                            'status' => '已交'
                        );
                    }else{
                        $data[0] = array(
                            'house_id' => $house_id,
                            'card_number' => $card_number,
                            'start_time' => $start,
                            'end_time' => $end,
                            'month' => $month,
                            'rent' => $realRent,
                            'res_person' => "",
                            'status' => '未交'
                        );
                    }
                    
                    // 生成剩余未缴费记录
                    for ($i = 1; $i < $m; $i ++) {
                        $startFisrt=date('Y-m-01',strtotime($startdate));
                        $start = date('Y-m-01', strtotime("$startFisrt + $i month"));
                        $end = date('Y-m-d', strtotime("$start + 1 month - 1 day"));
                        $month = date('Y-m-d', strtotime($start));
                
                        // 计算租金2
                
                        $mDay = (strtotime("$end") - strtotime("$start")) / (24 * 60 * 60) + 1;
                        $days = (strtotime("$end") - strtotime("$start")) / (24 * 60 * 60) + 1;
                        $rent = ($area * $unitPrice) / $mDay * $days;
                        // 计算当前递增折扣率 次数
                        $diffYear = floor((strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60 * 365)); // 折扣率开始时间至今多少年
                        if ($diffYear < 0) {
                            $diffYear = 0;
                        }
                        // 计算折扣率 实缴租金
                        $flag1 = strtotime("$start") - strtotime("$discount_time");
                        $flag2 = strtotime("$end") - strtotime("$discount_time");
                        if ($flag1 >= 0 && $flag2 >= 0) { // 第一种情况：折扣率起始时间在当月之前
                            $discount = $start_discount + $increase_discount * $diffYear;
                            if ($discount > $max_discount) {
                                $discount = $max_discount;
                            }
                            $realRent = $rent * ($discount / 100);
                        } else
                            if ($flag1 <= 0 && $flag2 >= 0) { // 第二种情况：折扣率起始时间在当月中
                                $discount = $start_discount + $increase_discount * $diffYear;
                                if ($discount > $max_discount) {
                                    $discount = $max_discount;
                                }
                                $disDay = (strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60);
                                $noDisDay = $mDay - $disDay;
                                $realRent = (($discount / 100) * $disDay + 1 * $noDisDay) / $mDay * $rent;
                        } else
                            if ($flag1 <= 0 && $flag2 <= 0) { // 第三种情况：折扣率起始时间在当月后
                                $realRent = $rent;
                        }
                        $realRent=round($realRent,2);
                        if($isDaikou){
                            $data[$i] = array(
                                'house_id' => $house_id,
                                'card_number' => $card_number,
                                'start_time' => $start,
                                'end_time' => $end,
                                'month' => $month,
                                'rent' => $realRent,
                                'res_person' => "",
                                'status' => '已交'
                            );
                        }else{
                            $data[$i] = array(
                                'house_id' => $house_id,
                                'card_number' => $card_number,
                                'start_time' => $start,
                                'end_time' => $end,
                                'month' => $month,
                                'rent' => $realRent,
                                'res_person' => "",
                                'status' => '未交'
                            );
                        }
                    }
                    foreach ($data as $sql) {
                        $where['card_number']=$card_number;
                        $where['start_time']=$sql['start_time'];
                        $res=$fangzujilu->where($where)->select();
                        if(!$res)
                            $fangzujilu->add($sql);
                    }
                } else { // 若已有缴费记录，生成剩余部分
                     
                    // 计算入住时间到现在的月份差，生成记录表
                    $start_date = strtotime($fangzu[$count - 1]['month']);
                    list ($cdate['y'], $cdate['m']) = explode("-", date('Y-m', $current_date));
                    list ($sdate['y'], $sdate['m']) = explode("-", date('Y-m', $start_date));
                    $m = ($cdate['y'] - $sdate['y']) * 12 + $cdate['m'] - $sdate['m'];
                    // $m为上次缴费起到现在的 月数差(与入住 到现在的 月数差 不同）
                
                    $house_id = $houseRecord[0]['id'];
                    $startdate = $fangzu[$count - 1]['month'];
                    // 生成剩余未缴费记录
                    for ($i = 0; $i < $m; $i ++) {
                        $j = $i + 1;
                        $startFisrt=date('Y-m-01',strtotime($startdate));
                        $start = date('Y-m-01', strtotime("$startFisrt + $j month"));
                        $end = date('Y-m-d', strtotime("$start + 1 month - 1 day"));
                        $month = date('Y-m-d', strtotime($start));
                
                        // 计算租金3
                        $area = $house->where("card_number = $card_number")
                        ->field("area")
                        ->select();
                        $xqName = $house->where("card_number=$card_number")
                        ->field("v_name")
                        ->select();
                        $area = $area[0]['area'];
                        $xqName = $xqName[0]['v_name'];
                        $where['name'] = array(
                            'like',
                            $xqName
                        );
                        $unitPrice = $xiaoqu->where($where)
                        ->field("rent")
                        ->select();
                        $unitPrice = $unitPrice[0][rent];
                        $mDay = (strtotime("$end") - strtotime("$start")) / (24 * 60 * 60)+1;
                        $days = (strtotime("$end") - strtotime("$start")) / (24 * 60 * 60)+1;
                        $rent = ($area * $unitPrice) / $mDay * $days;
                        // 计算当前递增折扣率 次数
                        $person1 = $person->where("card_number=$card_number")->select();
                        $type=$person1[0]['type'];
                        $where['name']=array('like',$type);
                        $personType=$person_type->where($where)->select();
                        $max_discount = $personType[0]['max_discount'];
                        $start_discount = $personType[0]['start_discount'];
                        $increase_discount = $personType[0]['increase_discount'];
                        $discount_time = $person1[0]['discount_time'];
                        $diffYear = floor((strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60 * 365)); // 折扣率开始时间至今多少年
                        if ($diffYear < 0) {
                            $diffYear = 0;
                        }
                        // 计算折扣率 实缴租金
                        $flag1 = strtotime("$start") - strtotime("$discount_time");
                        $flag2 = strtotime("$end") - strtotime("$discount_time");
                        if ($flag1 >= 0 && $flag2 >= 0) { // 第一种情况：折扣率起始时间在当月之前
                            $discount = $start_discount + $increase_discount * $diffYear;
                
                            if ($discount > $max_discount) {
                                $discount = $max_discount;
                            }
                            $realRent = $rent * ($discount / 100);
                        } else
                            if ($flag1 <= 0 && $flag2 >= 0) { // 第二种情况：折扣率起始时间在当月中
                                $discount = $start_discount + $increase_discount * $diffYear;
                
                                if ($discount > $max_discount) {
                                    $discount = $max_discount;
                                }
                                $disDay = (strtotime("$end") - strtotime("$discount_time")) / (24 * 60 * 60);
                                $noDisDay = $mDay - $disDay;
                                $realRent = (($discount / 100) * $disDay + 1 * $noDisDay) / $mDay * $rent;
                        } else
                            if ($flag1 <= 0 && $flag2 <= 0) { // 第三种情况：折扣率起始时间在当月后
                                $realRent = $rent;
                        }
                        $realRent=round($realRent,2);
                        if($isDaikou){
                            $data[$i] = array(
                                'house_id' => $house_id,
                                'card_number' => $card_number,
                                'start_time' => $start,
                                'end_time' => $end,
                                'month' => $month,
                                'rent' => $realRent,
                                'res_person' => "",
                                'status' => '已交'
                            );
                        }else{
                            $data[$i] = array(
                                'house_id' => $house_id,
                                'card_number' => $card_number,
                                'start_time' => $start,
                                'end_time' => $end,
                                'month' => $month,
                                'rent' => $realRent,
                                'res_person' => "",
                                'status' => '未交'
                            );
                        }
                    }
                    foreach ($data as $sql) {
                        $where['card_number']=$card_number;
                        $where['start_time']=$sql['start_time'];
                        $res=$fangzujilu->where($where)->select();
                        if(!$res)
                            $fangzujilu->add($sql);
                    }
                }
            }
///////////////////////////未生成记录的人员交租结束
        }
        $this->success("批量缴费成功");
    }
}