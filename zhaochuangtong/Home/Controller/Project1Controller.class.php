<?php
namespace Home\Controller;
use Think\Controller;
class Project1Controller extends Controller {

    public function index(){
    	$pro_id=$_GET['pro_id'];

    	$project_01=D('Project_01');

    	$attr=$project_01->field('pro_userid,pro_title,pro_miximg,pro_shortdescription,pro_com_tel,pro_views')->where("pro_id={$pro_id}")->find();

        $project_01->pro_views=$attr['pro_views']+1;
        $project_01->where("pro_id={$pro_id}")->save();

    	$project_02=D('Project_02');
    	$attr1=$project_02->field('pro_navimg')->where("pro_id={$pro_id}")->find();

    	$news=D('News');
    	$attr2=$news->where("ne_userid={$attr['pro_userid']}")->field('ne_id,ne_title,ne_author,ne_imgsrc,ne_abstract,ne_crtime')->order('ne_crtime desc')->limit(3)->select();

        /*print_r($attr);
        echo "<br>";
        echo "<br>";
        print_r($attr1);
        echo "<br>";
        echo "<br>";
        print_r($attr2);*/
    	$this->assign('pro_id',$pro_id);
    	$this->assign('project_01',$attr);
    	$this->assign('project_02',$attr1);
    	$this->assign('news',$attr2);
    	$this->display();
    }
}