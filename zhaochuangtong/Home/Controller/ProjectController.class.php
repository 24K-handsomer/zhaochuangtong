<?php
namespace Home\Controller;
use Think\Controller;
class ProjectController extends Controller {

    public function index(){   //label行业标签查询

    	$project_01= D('Project_01');

    	$label=$_GET['label'];

    	if($label==0){   //从首页分类标签第一次打开该网页
    		$attr=$project_01->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_crtime desc')->limit(10)->select();

    		$attr1=$project_01->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_views desc')->limit(10)->select();

    		$attr2=$project_01->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_views desc,pro_crtime desc')->limit(10)->select();
    	}
    	
    	else{
    		$attr=$project_01->where("pro_label like '%,{$label},%'")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_crtime desc')->limit(10)->select();

    		$attr1=$project_01->where("pro_label like '%,{$label},%'")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_views desc')->limit(10)->select();

    		$attr2=$project_01->where("pro_label like '%,{$label},%'")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_views desc,pro_crtime desc')->limit(10)->select();   		
    	}
    	$this->assign('zonghe',$attr2);
    	$this->assign('new',$attr);
    	$this->assign('hot',$attr1);

        $this->assign("hidden1","label");
        $this->assign("hidden2",$label);

        $class=D("Project_class");
        $classattr=$class->select();
        $cla_label=D("Pro_cla_label");
        $labelattr=$cla_label->select();

        $this->assign('class',$classattr);
        $this->assign('label',$labelattr);

        $this->display();
    }


    public function indexmoney(){   //投资额度查询
    	$project_01= D('Project_01');

    	$label=$_GET['money'];

		$attr=$project_01->where("pro_money={$label}")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_crtime desc')->limit(10)->select();

		$attr1=$project_01->where("pro_money={$label}")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_views desc')->limit(10)->select();

		$attr2=$project_01->where("pro_money={$label}")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_views desc,pro_crtime desc')->limit(10)->select(); 

    	$this->assign('zonghe',$attr2);
    	$this->assign('new',$attr);
    	$this->assign('hot',$attr1);

        $this->assign("hidden1","money");
        $this->assign("hidden2",$label);

        $class=D("Project_class");
        $classattr=$class->select();
        $cla_label=D("Pro_cla_label");
        $labelattr=$cla_label->select();

        $this->assign('class',$classattr);
        $this->assign('label',$labelattr);

        $this->display('index');
    }

    public function indexsuitpeo(){   //适应人群查询
    	$project_01= D('Project_01');

    	$label=$_GET['suitpeo'];

		$attr=$project_01->where("pro_suitpeo like '%,{$label},%'")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_crtime desc')->limit(10)->select();

		$attr1=$project_01->where("pro_suitpeo like '%,{$label},%'")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_views desc')->limit(10)->select();

		$attr2=$project_01->where("pro_suitpeo like '%,{$label},%'")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_views desc,pro_crtime desc')->limit(10)->select(); 

    	$this->assign('zonghe',$attr2);
    	$this->assign('new',$attr);
    	$this->assign('hot',$attr1);

        $this->assign("hidden1","suitpeo");
        $this->assign("hidden2",$label);

        $class=D("Project_class");
        $classattr=$class->select();
        $cla_label=D("Pro_cla_label");
        $labelattr=$cla_label->select();

        $this->assign('class',$classattr);
        $this->assign('label',$labelattr);

        $this->display('index');
    }


    public function indexjoinsty(){   //参与模式查询
    	$project_01= D('Project_01');

    	$label=$_GET['joinsty'];

		$attr=$project_01->where("pro_joinsty={$label}")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_crtime desc')->limit(10)->select();

		$attr1=$project_01->where("pro_joinsty={$label}")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_views desc')->limit(10)->select();

		$attr2=$project_01->where("pro_joinsty={$label}")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_views desc,pro_crtime desc')->limit(10)->select(); 

    	$this->assign('zonghe',$attr2);
    	$this->assign('new',$attr);
    	$this->assign('hot',$attr1);

        $this->assign("hidden1","joinsty");
        $this->assign("hidden2",$label);

        $class=D("Project_class");
        $classattr=$class->select();
        $cla_label=D("Pro_cla_label");
        $labelattr=$cla_label->select();

        $this->assign('class',$classattr);
        $this->assign('label',$labelattr);

        $this->display('index');
    }


    public function indexlike(){   //搜索模糊查询
    	$project_01= D('Project_01');

    	$label=$_POST['text'];

		$attr=$project_01->where("pro_title like '%{$label}%'")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_crtime desc')->limit(10)->select();

		$attr1=$project_01->where("pro_title like '%{$label}%'")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_views desc')->limit(10)->select();

		$attr2=$project_01->where("pro_title like '%{$label}%'")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order('pro_views desc,pro_crtime desc')->limit(10)->select(); 

    	$this->assign('zonghe',$attr2);
    	$this->assign('new',$attr);
    	$this->assign('hot',$attr1);

        $this->assign("hidden1","text");
        $this->assign("hidden2",$label);

        $class=D("Project_class");
        $classattr=$class->select();
        $cla_label=D("Pro_cla_label");
        $labelattr=$cla_label->select();

        $this->assign('class',$classattr);
        $this->assign('label',$labelattr);
        
        $this->display('index');
    }


    public function jiazai(){
        $a=$_GET['code'];
        $hidden1=$_GET['hidden1'];
        $label=$_GET['hidden2'];
        $biaozi=$_GET['biaozi'];
        
        /*$project_01= D('Project_01');
        $attr=$project_01->field('pro_id,pro_title,pro_miximg,pro_shortdescription')->order('pro_views desc')->limit("$a,10")->select();
        if($attr){
            $data['info'] = $attr;
            $data['status'] = 1;
            $this->ajaxReturn($data);
        }
        else{
            $data['status'] = 2;
            $this->ajaxReturn($data);
        }*/
        $order="";
        if($biaozi=="zonghe"){
            $order="pro_views desc,pro_crtime desc";
        }
        else if ($biaozi=="new") {
            $order="pro_crtime desc";
        }
        else{
            $order="pro_views desc";
        }
        

        $project_01= D('Project_01');

        switch ($hidden1) {
            case 'label':
                if($label!=0){
                    $attr2=$project_01->where("pro_label like '%,{$label},%'")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order("{$order}")->limit("{$a},10")->select();
                }
                else{
                    $attr2=$project_01->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order("{$order}")->limit("{$a},10")->select();
                }
                
                break;
            
            case 'money':
                $attr2=$project_01->where("pro_money={$label}")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order("{$order}")->limit("{$a},10")->select();
                break;

            case 'suitpeo':
                $attr2=$project_01->where("pro_suitpeo like '%,{$label},%'")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order("{$order}")->limit("{$a},10")->select();
                break;

            case 'joinsty':
                $attr2=$project_01->where("pro_joinsty={$label}")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order("{$order}")->limit("{$a},10")->select();
                break;

            default:
                $attr2=$project_01->where("pro_title like '%{$label}%'")->field('pro_id,pro_title,pro_miximg,pro_shortdescription,pro_crtime,pro_views')->order("{$order}")->limit("{$a},10")->select();
                break;
        }

        if($attr2){
            $data['info'] = $attr2;
            $data['status'] = 1;
            $this->ajaxReturn($data);
        }
        else{
            $data['status'] = 2;
            $this->ajaxReturn($data);
        }

    }

}