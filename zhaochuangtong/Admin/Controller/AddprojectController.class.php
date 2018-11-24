<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class AddprojectController extends AdminController {
	public function index(){

		if(empty($_POST['title']) && empty($_POST['instr']) && empty($_POST['show'])){

        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);


            $user=D('User');
            $attr4=$user->field('u_id,u_name')->order('u_crtime desc')->select();

			$label= D('Pro_cla_label');
	    	$attr=$label->field('lab_id,lab_name,lab_claid')->select();

	    	$money= D('Money');
	    	$attr1=$money->field('mo_id,mo_limit')->select();

	    	$joinsty= D('Joinstyle');
	    	$attr2=$joinsty->field('jo_id,jo_name')->select();

	    	$suitpeo= D('Suitpeople');
	    	$attr3=$suitpeo->field('su_id,su_name')->select();

            $class=D('Project_class');
            $attr5=$class->select();

            $this->assign('user',$attr4);
	    	$this->assign('label',$attr);
	    	$this->assign('money',$attr1);
	    	$this->assign('joinsty',$attr2);
	    	$this->assign('suitpeo',$attr3);
            $this->assign('class',$attr5);
	        $this->display();

			
        }
        else{

        	//$con = file_get_contents("http://www.jb51.net/news/jb-1.html");
        	//$URL="http://localhost/tp/index.php/Home/project1/index/pro_id/";

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
			$Project_01->pro_miximg=$miximg;
            $Project_01->pro_userid=$_POST['user'];
        	$Project_01->pro_usname=$_POST['author'];
        	$Project_01->pro_title=$_POST['title'];
        	$Project_01->pro_logo=$logo;
        	$Project_01->pro_twobar=$twobar;
        	
        	$Project_01->pro_shortdescription=mb_substr($str,0,56,'utf-8');
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
	    	$pro_id=$Project_01->add();
        	
        	
            $Project_02= D('Project_02');
            $Project_02->pro_id=$pro_id;
            $Project_02->pro_website=$URL.$pro_id;
            $Project_02->pro_usname=$_POST['author'];
            $Project_02->pro_instr=$_POST['instr'];
            $Project_02->pro_advantage=$_POST['advantage'];
            $Project_02->pro_show=$_POST['show'];
            $Project_02->pro_support=$_POST['support'];
            $Project_02->pro_navimg=$navimg;
            $z=$Project_02->add();


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
            unset($str);
             if($z)
            {
                $this->success("添加成功!",U("Showproject/index"));
            }
            else
            {
                $this->error("添加失败！","index");
            }


        }
    	
	}
}