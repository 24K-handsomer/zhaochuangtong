<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

    	$project_01= D('Project_01');
    	$attr=$project_01->field('pro_id,pro_title,pro_miximg,pro_shortdescription')->order('pro_views desc')->limit(10)->select();
    	//print_r($attr);
    	$this->assign('attr',$attr);


    	$News= D('News');
    	$attr=$News->field('ne_id,ne_title')->order('ne_crtime desc')->limit(5)->select();
    	//print_r($attr);
    	$this->assign('news',$attr);


        $this->display();
    }
	
	public function jiazai(){
        $a=$_GET['code'];
        $project_01= D('Project_01');
        $attr=$project_01->field('pro_id,pro_title,pro_miximg,pro_shortdescription')->order('pro_views desc')->limit("{$a},10")->select();
        if($attr){
            $data['info'] = $attr;
            $data['status'] = 1;
            $this->ajaxReturn($data);
        }
        else{
            $data['status'] = 2;
            $this->ajaxReturn($data);
        }

    }
}