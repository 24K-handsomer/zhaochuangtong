<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class ShowuserController extends AdminController {
    
    public function index(){
    	
    	$auth_infoA=session('auth_infoA');
        $auth_infoB=session('auth_infoB');

        //把获得的权限信息传递给模板显示
        $this -> assign('auth_infoA',$auth_infoA);
        $this -> assign('auth_infoB',$auth_infoB);
    	
    	$this->display();
    }
}