<?php

class JsonController extends ControllerBase
{
	public function usecaseAction($code){
		$usecase=Usecase::findFirst("code='".$code."'");
		$array=$usecase->toArray();
		$array["nbTaches"]=$usecase->getNbTache();
		print_r(json_encode($array));
		$this->view->disable();
	}
	
	public function tachesAction($id){
		$tache=Tache::findFirst("id='".$id."'");
		print_r(json_encode($tache->toArray()));
		$this->view->disable();
	}
}