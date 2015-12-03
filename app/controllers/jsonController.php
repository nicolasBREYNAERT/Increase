<?php

class JsonController extends ControllerBase
{
	public function usecaseAction($code){
		$usecase=Usecase::findFirst("code='".$code."'");		
		print_r(json_encode($usecase->toArray()));
		$this->view->disable();
	}
	
	public function tachesAction($id){
		$tache=Tache::findFirst("id='".$id."'");
		print_r(json_encode($tache->toArray()));
		$this->view->disable();
	}
}