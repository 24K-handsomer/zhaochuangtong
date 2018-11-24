<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
use Think\Page;
class MesszctController extends AdminController {
	public function index(){

        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);
        

		$liuyan=D("Liuyan_zct");
        $total=$liuyan->count();

        $page=new \Think\Page($total,20);  //参数一为总数据数；参数二：每页显示的条数
        $show=$page->show();

        $attr=$liuyan->order('liu_crtime desc')->limit($page->firstRow.','.$page->listRows)->select();

        /*$Project_02=D("Project_02");
        $attr1=$Project_02->field('pro_website')->where("pro_id=$attr[$pro_id]")->select();*/

        $this->assign("count",$total);
        $this->assign("show",$show);
        $this->assign("liuyan",$attr);
        $this->display();
	}

	public function update(){
            $liuyan=D("Liuyan_zct");
            $liu_id=$_POST["liu_id"];

            $liuyan->liu_read=1;
            $z=$liuyan->where("liu_id=$liu_id")->save();

            if($z){
                $data['info'] = "ok";
                $data['status'] = 1;
                $this->ajaxReturn($data);
            }

    }


    public function delete(){
            $liuyan=D("Liuyan_zct");
            $liu_id=$_POST["liu_id"];

            $z=$liuyan->where("liu_id=$liu_id")->delete();

            if($z){
                $data['info'] = "ok";
                $data['status'] = 1;
                $this->ajaxReturn($data);
            }

    }


	public function messpro(){
        
        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);
       
		$liuyan=D("Liuyan_pro");
        $total=$liuyan->count();

        $page=new \Think\Page($total,20);  //参数一为总数据数；参数二：每页显示的条数
        $show=$page->show();

        $attr=$liuyan->order('liu_crtime desc')->limit($page->firstRow.','.$page->listRows)->select();

        /*$Project_02=D("Project_02");
        $attr1=$Project_02->field('pro_website')->where("pro_id=$attr[$pro_id]")->select();*/

        $this->assign("count",$total);
        $this->assign("show",$show);
        $this->assign("liuyan",$attr);
        $this->display();
	}
}