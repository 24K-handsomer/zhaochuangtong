<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class DeletenewsController extends AdminController {

	public function index($ne_id){

		$news=D("News");
        $z=$news->delete($ne_id);
        if($z)
        {
            $this->success("删除成功",U("Shownews/index"));
        }
        else
        {
            $this->error("删除失败",U("Shownews/index"));
        }
	}
}