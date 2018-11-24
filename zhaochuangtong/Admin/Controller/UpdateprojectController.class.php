<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class UpdateprojectController extends AdminController {

	public function index($pro_id){

		if(empty($_POST['title']) && empty($_POST['instr']) && empty($_POST['show'])){

        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        $auth_infoC=session('auth_infoC');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);

        $this -> assign('auth_infoC',$auth_infoC);
        $this -> assign('pro_id',$pro_id);
        
            //$pro_id=$_GET["pro_id"];

            $Project_01= D('Project_01');
            $attr_01=$Project_01->find($pro_id);

            $lb=substr($attr_01['pro_label'],1,-1);
            $label_01=explode(",", $lb);

            $sp=substr($attr_01['pro_suitpeo'],1,-1);
            $suitpeo_01=explode(",", $sp);

            $Project_02= D('Project_02');
            $attr_02=$Project_02->find($pro_id);

			$label= D('Pro_cla_label');
	    	$attr=$label->select();

	    	$money= D('Money');
	    	$attr1=$money->select();

	    	$joinsty= D('Joinstyle');
	    	$attr2=$joinsty->select();

	    	$suitpeo= D('Suitpeople');
	    	$attr3=$suitpeo->select();

            $class=D('Project_class');
            $attr5=$class->select();


            $this->assign('label_01',$label_01);
            $this->assign('suitpeo_01',$suitpeo_01);

            $this->assign('project_01',$attr_01);
            $this->assign('project_02',$attr_02);
	    	$this->assign('label',$attr);
	    	$this->assign('money',$attr1);
	    	$this->assign('joinsty',$attr2);
	    	$this->assign('suitpeo',$attr3);
            $this->assign('class',$attr5);
	        $this->display();

			
        }
        else{
        	
        	//$con = file_get_contents("http://www.jb51.net/news/jb-1.html");
			$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
			$logo=$_POST['logo'];
        	preg_match_all($pattern,$logo,$attr);
        	$logo=$attr[1][0];

        	$twobar=$_POST['twobar'];
        	preg_match_all($pattern,$twobar,$attr1);
        	$twobar=$attr1[1][0];

        	$showimg=$_POST['show'];
        	preg_match_all($pattern,$showimg,$attr2);
        	$miximg=$attr2[1][0];

        	//pro_shortdescription
        	
        	$attrla=$_POST["label"];
            $label=implode(",",$attrla);
            $label=",".$label.",";

            $attrsp=$_POST["suitpeo"];
            $suitpeo=implode(",",$attrsp);
            $suitpeo=",".$suitpeo.",";

	        $navimg=$_POST['navimg'];
        	preg_match_all($pattern,$navimg,$attr3);
        	$navimg=$attr3[1][0];
  
            //$str=$_POST['instr'];
            $str=I('post.instr','','strip_tags');


			$Project_01= D('Project_01');
        	$Project_01->pro_usname=$_POST['author'];
        	$Project_01->pro_title=$_POST['title'];
        	$Project_01->pro_logo=$logo;
        	$Project_01->pro_twobar=$twobar;
        	$Project_01->pro_miximg=$miximg;
        	$Project_01->pro_shortdescription=mb_substr($str,0,100,'utf-8');
        	$Project_01->pro_company=$_POST['company'];
        	$Project_01->pro_com_addr=$_POST['addr'];
        	$Project_01->pro_com_tel=$_POST['tel'];
        	$Project_01->pro_com_website=$_POST['website'];
        	$Project_01->pro_weixin=$_POST['weixin'];
        	$Project_01->pro_label=$label;
        	$Project_01->pro_city=$_POST['city'];
        	$Project_01->pro_money=$_POST['money'];
        	$Project_01->pro_joinsty=$_POST['joinsty'];
        	$Project_01->pro_suitpeo=$suitpeo;
	    	$re=$Project_01->where("pro_id=$pro_id")->save();
        	
        	
            $Project_02= D('Project_02');
            //$Project_02->pro_id=$z;
            $Project_02->pro_usname=$_POST['author'];
            $Project_02->pro_instr=$_POST['instr'];
            $Project_02->pro_advantage=$_POST['advantage'];
            $Project_02->pro_show=$_POST['show'];
            $Project_02->pro_support=$_POST['support'];
            $Project_02->pro_navimg=$navimg;
            $z=$Project_02->where("pro_id=$pro_id")->save();


            unset($logo);
            unset($twobar);
            unset($showimg);
            unset($miximg);
            unset($attrla);
            unset($label);
            unset($attrsp);
            unset($suitpeo);
            unset($navimg);
            unset($pattern);
            unset($attr);
            unset($attr1);
            unset($attr2);
            unset($attr3);
             if($re || $z)
            {
                $this->success("添加成功!",U("Showproject/index"));
            }
            else
            {
                $this->error("添加失败！","$pro_id");
            }


        }
    	
	}

    public function basic($pro_id){
        if(empty($_POST['title'])){
        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        $auth_infoC=session('auth_infoC');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);

        $this -> assign('auth_infoC',$auth_infoC);

            $Project_01= D('Project_01');
            $attr_01=$Project_01->field('pro_id,pro_usname,pro_title,pro_logo,pro_twobar,pro_company,pro_com_addr,pro_com_tel,pro_com_website,pro_weixin')->find($pro_id);
            $this->assign('project_01',$attr_01);
            $this->display();

        }
        else{
            $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
            $logo=$_POST['logo'];
            preg_match_all($pattern,$logo,$attr);
            $logo=$attr[1][0];

            $twobar=$_POST['twobar'];
            preg_match_all($pattern,$twobar,$attr1);
            $twobar=$attr1[1][0];


            $Project_01= D('Project_01');
            $Project_01->pro_usname=$_POST['author'];
            $Project_01->pro_title=$_POST['title'];
            $Project_01->pro_logo=$logo;
            $Project_01->pro_twobar=$twobar;
            $Project_01->pro_company=$_POST['company'];
            $Project_01->pro_com_addr=$_POST['addr'];
            $Project_01->pro_com_tel=$_POST['tel'];
            $Project_01->pro_com_website=$_POST['website'];
            $Project_01->pro_weixin=$_POST['weixin'];
            $re=$Project_01->where("pro_id=$pro_id")->save();

            if($re)
            {
                $this->success("添加成功!",U("Admin/Updateproject/index/pro_id/$pro_id"));
            }
            else
            {
                $this->error("添加失败！","$pro_id");
            }

        } 
    }

    public function instr($pro_id){

        if(empty($_POST['instr'])){
        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        $auth_infoC=session('auth_infoC');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);

        $this -> assign('auth_infoC',$auth_infoC);

            $Project_02= D('Project_02');
            $attr_02=$Project_02->field("pro_id,pro_instr")->find($pro_id);
            $this->assign('project_02',$attr_02);
            $this->display();
        }
        else{

            $str=I('post.instr','','strip_tags');
            $Project_01= D('Project_01');
            $Project_01->pro_shortdescription=mb_substr($str,0,100,'utf-8');
            $re=$Project_01->where("pro_id=$pro_id")->save();

            $Project_02= D('Project_02');
            $Project_02->pro_instr=$_POST['instr'];
            $z=$Project_02->where("pro_id=$pro_id")->save();

            if($re || $z)
            {
                $this->success("添加成功!",U("Admin/Updateproject/index/pro_id/$pro_id"));
            }
            else
            {
                $this->error("添加失败！","$pro_id");
            }

        }
        
    }

    public function advantage($pro_id){
        if(empty($_POST['advantage'])){
        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        $auth_infoC=session('auth_infoC');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);

        $this -> assign('auth_infoC',$auth_infoC);

            $Project_02= D('Project_02');
            $attr_02=$Project_02->field("pro_id,pro_advantage")->find($pro_id);
            $this->assign('project_02',$attr_02);
            $this->display();
        }
        else{
            $Project_02= D('Project_02');
            $Project_02->pro_advantage=$_POST['advantage'];
            $z=$Project_02->where("pro_id=$pro_id")->save();

            if($z)
            {
                $this->success("添加成功!",U("Admin/Updateproject/index/pro_id/$pro_id"));
            }
            else
            {
                $this->error("添加失败！","$pro_id");
            }
        }
    }

    public function showgoods($pro_id){
        if(empty($_POST['show'])){
        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        $auth_infoC=session('auth_infoC');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);

        $this -> assign('auth_infoC',$auth_infoC);

            $Project_02= D('Project_02');
            $attr_02=$Project_02->field("pro_id,pro_show")->find($pro_id);
            $this->assign('project_02',$attr_02);
            $this->display();
        }
        else{
            $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
            $showimg=$_POST['show'];
            preg_match_all($pattern,$showimg,$attr2);
            $miximg=$attr2[1][0];
            $Project_01= D('Project_01');
            $Project_01->pro_miximg=$miximg;
            $re=$Project_01->where("pro_id=$pro_id")->save();
            $Project_02= D('Project_02');
            $Project_02->pro_show=$showimg;
            $z=$Project_02->where("pro_id=$pro_id")->save();

            if($re || $z)
            {
                $this->success("添加成功!",U("Admin/Updateproject/index/pro_id/$pro_id"));
            }
            else
            {
                $this->error("添加失败！","$pro_id");
            }
        }
    }

    public function support($pro_id){
        if(empty($_POST['support'])){
        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        $auth_infoC=session('auth_infoC');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);

        $this -> assign('auth_infoC',$auth_infoC);

            $Project_02= D('Project_02');
            $attr_02=$Project_02->field("pro_id,pro_support")->find($pro_id);
            $this->assign('project_02',$attr_02);
            $this->display();
        }
        else{
            $Project_02= D('Project_02');
            $Project_02->pro_support=$_POST['support'];
            $z=$Project_02->where("pro_id=$pro_id")->save();

            if($z)
            {
                $this->success("添加成功!",U("Admin/Updateproject/index/pro_id/$pro_id"));
            }
            else
            {
                $this->error("添加失败！","$pro_id");
            }
        }
    }

    public function navimg($pro_id){
        if(empty($_POST['navimg'])){
        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        $auth_infoC=session('auth_infoC');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);

        $this -> assign('auth_infoC',$auth_infoC);

            $Project_02= D('Project_02');
            $attr_02=$Project_02->field("pro_id,pro_navimg")->find($pro_id);
            $this->assign('project_02',$attr_02);
            $this->display();
        }
        else{
            $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
            $navimg=$_POST['navimg'];
            preg_match_all($pattern,$navimg,$attr3);
            $navimg=$attr3[1][0];

            $Project_02= D('Project_02');
            $Project_02->pro_navimg=$navimg;
            $z=$Project_02->where("pro_id=$pro_id")->save();

            if($z)
            {
                $this->success("添加成功!",U("Admin/Updateproject/index/pro_id/$pro_id"));
            }
            else
            {
                $this->error("添加失败！","$pro_id");
            }
        }
    }

    public function feature($pro_id){
        if(empty($_POST)){
        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        $auth_infoC=session('auth_infoC');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);

        $this -> assign('auth_infoC',$auth_infoC);

            $Project_01= D('Project_01');
            $attr_01=$Project_01->field("pro_id,pro_label,pro_city,pro_money,pro_joinsty,pro_suitpeo")->find($pro_id);

            $lb=substr($attr_01['pro_label'],1,-1);
            $label_01=explode(",", $lb);

            $sp=substr($attr_01['pro_suitpeo'],1,-1);
            $suitpeo_01=explode(",", $sp);

            $label= D('Pro_cla_label');
            $attr=$label->select();

            $money= D('Money');
            $attr1=$money->select();

            $joinsty= D('Joinstyle');
            $attr2=$joinsty->select();

            $suitpeo= D('Suitpeople');
            $attr3=$suitpeo->select();

            $class=D('Project_class');
            $attr5=$class->select();

            $this->assign('class',$attr5);
            $this->assign('project_01',$attr_01);
            $this->assign('label_01',$label_01);
            $this->assign('suitpeo_01',$suitpeo_01);
            $this->assign('label',$attr);
            $this->assign('money',$attr1);
            $this->assign('joinsty',$attr2);
            $this->assign('suitpeo',$attr3);
            $this->display();
        }
        else{
            $attrla=$_POST["label"];
            $label=implode(",",$attrla);
            $label=",".$label.",";

            $attrsp=$_POST["suitpeo"];
            $suitpeo=implode(",",$attrsp);
            $suitpeo=",".$suitpeo.",";

            $Project_01= D('Project_01');
            $Project_01->pro_label=$label;
            $Project_01->pro_city=$_POST['city'];
            $Project_01->pro_money=$_POST['money'];
            $Project_01->pro_joinsty=$_POST['joinsty'];
            $Project_01->pro_suitpeo=$suitpeo;
            $re=$Project_01->where("pro_id=$pro_id")->save();

            if($re)
            {
                $this->success("添加成功!",U("Admin/Updateproject/index/pro_id/$pro_id"));
            }
            else
            {
                $this->error("添加失败！","$pro_id");
            }
        }
    }

}