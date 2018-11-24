<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class MessageController extends Controller {

	public function index($pro_id,$pro_title){

        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);

		        $liuyan=D("Liuyan_pro");
                $total=$liuyan->where("liu_projid=$pro_id")->count();

                $page=new \Think\Page($total,4);  //参数一为总数据数；参数二：每页显示的条数
                $show=$page->show();

                $attr=$liuyan->where("liu_projid=$pro_id")->order('liu_crtime desc')->limit($page->firstRow.','.$page->listRows)->select();

                /*$Project_02=D("Project_02");
                $attr1=$Project_02->field('pro_website')->where("pro_id=$attr[$pro_id]")->select();*/

                $pro_id=$pro_id;
                $title=urldecode($pro_title);

                $this->assign("pro_id",$pro_id);
                $this->assign("title",$title);
                $this->assign("count",$total);
                $this->assign("show",$show);
                $this->assign("liuyan",$attr);
	            $this->display();

	}

    //未读留言
    public function unread($pro_id,$pro_title){
        //用户id
        $u_id = session('u_id');
        $u_name = session('u_name');
        //根据id获得用户信息
        $u_info = D('User')->find($u_id);

        //角色id
        $role_id = $u_info['u_role_id'];
        //获得角色信息
        $role_info = D('Role')->find($role_id);

        //权限的ids信息
        $auth_ids = $role_info['role_auth_ids'];
        //获得全部权限数据
        //顶级权限、次顶级权限
        if($u_name === 'admin%'){//admin管理员
            $auth_infoA = D('Auth')->where("auth_level=0 ")->select();
            $auth_infoB = D('Auth')->where("auth_level=1 ")->select();        
        }else{//普通用户
            $auth_infoA = D('Auth')->where("auth_level=0 and auth_id in ($auth_ids)")->select();
            $auth_infoB = D('Auth')->where("auth_level=1 and auth_id in ($auth_ids)")->select();
        }

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);
        

            $liuyan=D("Liuyan_pro");
            $total=$liuyan->where("liu_projid=$pro_id")->count();

            $page=new \Think\Page($total,4);  //参数一为总数据数；参数二：每页显示的条数
            $show=$page->show();

            $attr=$liuyan->where("liu_projid=$pro_id && liu_read=0")->order('liu_crtime desc')->limit($page->firstRow.','.$page->listRows)->select();

            /*$Project_02=D("Project_02");
            $attr1=$Project_02->field('pro_website')->where("pro_id=$attr[$pro_id]")->select();*/

            $pro_id=$pro_id;
            $title=$pro_title;

            $this->assign("pro_id",$pro_id);
            $this->assign("title",$title);
            $this->assign("count",$total);
            $this->assign("show",$show);
            $this->assign("liuyan",$attr);
            $this->display();

    }

    public function update(){
            $liuyan=D("Liuyan_pro");
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
            $liuyan=D("Liuyan_pro");
            $liu_id=$_POST["liu_id"];

            $z=$liuyan->where("liu_id=$liu_id")->delete();

            if($z){
                $data['info'] = "ok";
                $data['status'] = 1;
                $this->ajaxReturn($data);
            }

    }

}