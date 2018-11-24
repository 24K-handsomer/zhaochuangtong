<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class DeleteprojectController extends AdminController {

	public function index($pro_id){
		$project_01=D("Project_01");
        $re=$project_01->delete($pro_id);
        $project_02=D("Project_02");
        $z=$project_02->delete($pro_id);
        if($re && $z)
        {
            $this->success("删除成功",U("Showproject/index"));
        }
        else
        {
            $this->error("删除失败",U("Showproject/index"));
        }
	}
}