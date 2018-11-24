<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
use Think\Page;
class ShownewsController extends AdminController {
	public function index(){
                $auth_infoA=session('auth_infoA');
                $auth_infoB=session('auth_infoB');

                //把获得的权限信息传递给模板显示
                $this -> assign('auth_infoA',$auth_infoA);
                $this -> assign('auth_infoB',$auth_infoB);

                if(session('role_id') == 1){
                    $where="";
                }
                else{
                    $u_id=session('u_id');
                    $where="ne_userid=$u_id";
                }

		$news=D("News");
                $total=$news->where($where)->count();

                $page=new \Think\Page($total,20);  //参数一为总数据数；参数二：每页显示的条数
                $show=$page->show();

                $attr=$news->field('ne_id,ne_title,ne_author,ne_view,ne_imgsrc,ne_abstract,ne_crtime')->where($where)->order('ne_crtime desc')->limit($page->firstRow.','.$page->listRows)->select();

                /*$Project_02=D("Project_02");
                $attr1=$Project_02->field('pro_website')->where("pro_id=$attr[$pro_id]")->select();*/

                $this->assign("count",$total);
                $this->assign("show",$show);
                $this->assign("news",$attr);
        	$this->display();
	}
}