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
		
		//g�n�ration des progress barre pour chaque usecase
		foreach ($usecases as $u){
			//progressbar
			$avancement=$u->getAvancement();
			$this->jquery->bootstrap()->htmlProgressbar($u->getCode(),"success",$avancement)->setStriped(true)->setActive(true)->showcaption(true);
		}
		
		
		
		
		$this->jquery->compile($this->view);
		$this->view->setVars(array("usecases"=>$usecases,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher-> getControllerName()));
	}
	
	public function equipeAction($id=NULL){
		$p=Projet::findFirst("id=".$id);
		$usecases=Usecase::find("idProjet=".$p->getId());
		
		foreach ($usecases as $u){
			$dev=User::findFirst("id=".$u->getIdDev());
			//ajuoter des objet entre eux
		}
		
		$this->view->setVars(array("dev"=>$dev));

		
		
	}
}

