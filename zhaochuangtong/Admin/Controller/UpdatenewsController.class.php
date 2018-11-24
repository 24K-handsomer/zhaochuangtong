<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class UpdatenewsController extends AdminController {

	public function index($ne_id){

		if(!empty($_POST['content'])){
        	//$con = file_get_contents("http://www.jb51.net/news/jb-1.html");
        	$con=$_POST['content'];
            $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
            $imgsrc='';
            $z=preg_match_all($pattern,$con,$match);
            if($z){
                $imgsrc=$match[1][0];
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
	    	$news->ne_title=$_POST['title'];
	    	$news->ne_author=$_POST['author'];
	    	$news->ne_key=$_POST['keyword'];
	    	$news->ne_abstract=$str;
	    	$news->ne_class=$_POST['classes'];
	    	$news->ne_crtime=date("Y-m-d H:i:s");
	    	
	    	$z=$news->where("ne_id=$ne_id")->save();
            if($z){
                $this->success("文章修改成功！",U("Shownews/index"));
            }
            else{
                $this->success("修改失败！","$ne_id");
            }
        }
        else{

        $auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);

        
        	$news=D("News");
        	$attr1=$news->field("ne_id,ne_title,ne_author,ne_key,ne_imgsrc,ne_abstract,ne_class,ne_content")->find($ne_id);

            $class= D('News_class');
            $attr=$class->field('class_id,class_name')->select();

            $this->assign("news",$attr1);
            $this->assign('class',$attr);
            $this->display();
        }

	}
}