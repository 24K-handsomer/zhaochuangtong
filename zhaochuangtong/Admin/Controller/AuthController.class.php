<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class AuthController extends AdminController {
    
    public function index(){
    	$auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);


        $user=D('User');
        $attr4=$user->field('u_id,u_name')->order('u_crtime desc')->select();

        $role=D('Role');
        $attr3=$role->field('role_id,role_name')->order('role_id desc')->select();

        $this->assign("user",$attr4);
        $this->assign("role",$attr3);
    	$this->display();
    }


    public function add(){
        if(!empty($_POST['u_name']) && !empty($_POST['role_id'])){
        	$u_name=$_POST['u_name'];
        	$role_id=$_POST['role_id'];

        	$user=D('User');
        	$user->u_name=$u_name;
        	$user->u_role_id=$role_id;
            $z=$user->add();
            if($z){
            	$this->success("添加成功！","index");
            }
            else{
            	$this->error("添加失败！","index");
            }
        }
        else{
            $this->error("添加内容不能为空！","index");
        }
    }

    public function update(){
        $u_id=$_POST['user'];
        $role_id=$_POST['role'];

        $user=D('User');
        $user->u_role_id=$role_id;
        $z=$user->where("u_id=$u_id")->save();
        if($z){
            $this->success("修改成功！","index");
        }
        else{
            $this->error("修改失败！","index");
        }
    }

    public function delete(){
    	$u_id=$_POST['user'];
    	$user=D('User');
        $z=$user->where("u_id=$u_id")->delete();
        if($z){
        	$this->success("删除成功！","index");
        }
        else{
        	$this->error("删除失败！","index");
        }
    }


    public function showrole(){
        $u_id=$_POST['uid'];
        $user=D('User');
        $role_id=$user->field('u_role_id')->where("u_id=$u_id")->find();
        if($role_id){
                $data['info'] = $role_id;
                $data['status'] = 1;
                $this->ajaxReturn($data);
        }
    }

}