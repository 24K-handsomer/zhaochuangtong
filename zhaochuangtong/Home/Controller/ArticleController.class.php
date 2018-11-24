<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {

    public function index(){
    	$news=D('News');
        $ne_id=$_GET['ne_id'];
        $attr=$news->field('ne_title,ne_author,ne_view,ne_crtime,ne_content')->where("ne_id={$ne_id}")->find();
        
        $news->ne_view=$attr['ne_view']+1;
        $news->where("ne_id={$ne_id}")->save();

        $this->assign('news',$attr);
    	$this->display();
    }

}