<?php
namespace Home\Controller;
use Think\Controller;
class ContactController extends Controller {

    public function index(){
    	$pro_id=$_GET['pro_id'];

    	$project_01=D('Project_01');
    	$attr=$project_01->field('pro_title,pro_company,pro_com_addr,pro_com_tel,pro_com_website')->where("pro_id={$pro_id}")->find();

    	$project_02=D('Project_02');
    	$attr1=$project_02->field('pro_navimg')->where("pro_id={$pro_id}")->find();

        $this->assign('pro_id',$pro_id);
    	$this->assign('project_01',$attr);
    	$this->assign('project_02',$attr1);
    	$this->display();
    }
}