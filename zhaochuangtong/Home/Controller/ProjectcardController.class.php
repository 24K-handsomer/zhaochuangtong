<?php
namespace Home\Controller;
use Think\Controller;
class ProjectcardController extends Controller {

    public function index(){
    	$pro_id=$_GET['pro_id'];

    	$project_01=D('Project_01');
    	$attr=$project_01->field('pro_usname,pro_title,pro_logo,pro_twobar,pro_shortdescription,pro_com_addr,pro_com_tel,pro_weixin')->where("pro_id={$pro_id}")->find();

        $this->assign('pro_id',$pro_id);
    	$this->assign('project_01',$attr);
    	$this->display();
    }
}