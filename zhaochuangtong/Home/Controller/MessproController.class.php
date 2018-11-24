<?php
namespace Home\Controller;
use Think\Controller;
class MessproController extends Controller {

    public function index(){
    	$pro_id=$_GET['pro_id'];
        $project_01=D('Project_01');
        $attr=$project_01->field('pro_title,pro_com_tel')->where("pro_id={$pro_id}")->find();

        $this->assign('pro_id',$pro_id);
        $this->assign('project_01',$attr);
    	$this->display();
    }

    public function addmess(){
        $contentattr=$_POST['message'];
        $content=implode("<br>",$contentattr);

        $pro_id=$_POST['pro_id'];
        $tel=I('post.tel','','strip_tags');
        $other=I('post.other','','strip_tags');

        if(!empty($content) && (!empty($tel) || !empty($other))){
            $liuyan=D('Liuyan_pro');

            $liuyan->liu_content=$content;
            $liuyan->liu_projid=$pro_id;
            $liuyan->liu_protitle=$_POST['pro_title'];
            $liuyan->liu_name=I('post.name','','strip_tags');
            $liuyan->liu_tel=$tel;
            $liuyan->liu_other=$other;
            $liuyan->liu_city=I('post.city','','strip_tags');
            $z=$liuyan->add();
            if($z){
                $this->success("留言成功！",U("Messpro/index/pro_id/$pro_id"));
            }
            else{
                $this->error("留言失败！",U("Messpro/index/pro_id/$pro_id"));
            }
        }
        else
        {
            $this->error("提交数据不全",U("Messpro/index/pro_id/$pro_id"));
        }

    }
}