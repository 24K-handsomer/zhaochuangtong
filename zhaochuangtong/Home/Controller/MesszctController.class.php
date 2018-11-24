<?php
namespace Home\Controller;
use Think\Controller;
class MesszctController extends Controller {

    public function index(){

    	$this->display();
    }

    public function addmess(){

        $tel=I('post.tel','','strip_tags');
        $other=I('post.other','','strip_tags');

        if(!empty($tel) || !empty($other)){
            $liuyan=D('Liuyan_zct');

            $liuyan->liu_name=I('post.name','','strip_tags');
            $re2=$liuyan->liu_tel=$tel;
            $re3=$liuyan->liu_other=$other;
            $liuyan->liu_city=I('post.city','','strip_tags');
            $z=$liuyan->add();
            if($z){
                $this->success("留言成功！","index");
            }
            else{
                $this->error("留言失败！","index");
            }
        }
        else
        {
            $this->error("提交数据不全","index");
        }


        
    }
}