<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class AddController extends AdminController {
    
    public function index(){
    	

        if(!empty($_POST['content'])){
        	//$con = file_get_contents("http://www.jb51.net/news/jb-1.html");
        	$con=$_POST['content'];
            $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
            $imgsrc='';
            $z=preg_match_all($pattern,$con,$match);
            if($z){
                $imgsrc=$match[1][0];
            }

            if(session('role_id')==1){
                $u_id=$_POST['user'];
            }
            else{
                $u_id=session('u_id');
            }

            if(strlen($_POST['abstract'])>=9){
                $str=strip_tags($_POST['abstract']);
                $str=mb_substr($str,0,56,'utf-8');
            }
            else{
                $str=strip_tags($con);
                $str=mb_substr($str,0,56,'utf-8');
            }

        	$news= D('News');
        	$news->ne_content=$con;
        	$news->ne_imgsrc=$imgsrc;
            $news->ne_userid=$u_id;
	    	$news->ne_title=$_POST['title'];
	    	$news->ne_author=$_POST['author'];
	    	$news->ne_key=$_POST['keyword'];
	    	$news->ne_abstract=$str;
	    	$news->ne_class=$_POST['classes'];
	    	
	    	$z=$news->add();
            if($z){
                $this->success("文章发布成功！",U("Shownews/index"));
            }
            else{
                $this->success("发布失败！","index");
            }

        }
        else{

        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);

            if(session('role_id')==1){
                $user=D('User');
                $attr4=$user->field('u_id,u_name')->order('u_crtime desc')->select();
                $this->assign('user',$attr4);
            }

            $class= D('News_class');
            $attr=$class->field('class_id,class_name')->select();
            $this->assign('class',$attr);
            $this->display();
        }
    
    }


}