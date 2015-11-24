<?php

class ProjectsController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Projet";
	}
	
	public function authorAction($idProjet=NULL, $idAuthor=NULL)
	{
		$p=Projet::findFirst("id=".$idProjet);
		$usecases=Usecase::find("idProjet=".$p->getId());
		
		//génération des progress barre pour chaque usecase
		foreach ($usecases as $u){
			//progressbar
			$avancement=$u->getAvancement();
			$this->jquery->bootstrap()->htmlProgressbar($u->getCode(),"success",$avancement)->setStriped(true)->setActive(true)->showcaption(true);
		}
		$this->jquery->compile($this->view);
		$this->view->setVars(array("usecases"=>$usecases));
	}
}

