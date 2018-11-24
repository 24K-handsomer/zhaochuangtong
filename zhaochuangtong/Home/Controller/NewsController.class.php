<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller {

    public function index(){

    	$News= D('News');
    	
    	if (!empty($_POST['text'])) {
    		$titlelike=$_POST['text'];

    		$attr=$News->where("ne_title like '%{$titlelike}%'")->field('ne_id,ne_title,ne_author,ne_imgsrc,ne_abstract,ne_crtime')->order('ne_crtime desc')->limit(10)->select();

    		$attr1=$News->where("ne_title like '%{$titlelike}%'")->field('ne_id,ne_title,ne_author,ne_imgsrc,ne_abstract,ne_crtime')->order('ne_view desc')->limit(10)->select();
    	}
    	else {

    		$class=$_GET['class'];

	    	if($class==0){
	    		$attr=$News->field('ne_id,ne_title,ne_author,ne_imgsrc,ne_abstract,ne_crtime')->order('ne_crtime desc')->limit(10)->select();

	    		$attr1=$News->field('ne_id,ne_title,ne_author,ne_imgsrc,ne_abstract,ne_crtime')->order('ne_view desc')->limit(10)->select();
	    	}
	    	
	    	else{
	    		$attr=$News->where("ne_class={$class}")->field('ne_id,ne_title,ne_author,ne_imgsrc,ne_abstract,ne_crtime')->order('ne_crtime desc')->limit(10)->select();

	    		$attr1=$News->where("ne_class={$class}")->field('ne_id,ne_title,ne_author,ne_imgsrc,ne_abstract,ne_crtime')->order('ne_view desc')->limit(10)->select();   		
	    	}
    	}


    	$this->assign('new',$attr);
    	$this->assign('hot',$attr1);
        $this->display();
    }
}