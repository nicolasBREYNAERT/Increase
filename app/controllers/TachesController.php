<?php
class TachesController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Tache";
	}
	
	public function updateAction($id){
		$tache=Tache::findFirst("id=".$id);
		$this->view->setVars(array("tache"=>$tache));
	}
	
	public function deleteAction($id){
		
	}
	
	public function insertAction(){
		
	}
}