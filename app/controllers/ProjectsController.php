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
			$this->jquery->getOnClick("#bt-".$u->getCode(),"","#divUseCase-".$u->getCode(),array("attr"=>"data-ajax","jsCallback"=>"$('.trUseCase-".$u->getCode()."').slideToggle('slow');$('.divUseCase-".$u->getCode()."').slideToggle('slow');"));
		}
		
		
		
		$this->jquery->compile($this->view);
		$this->view->setVars(array("usecases"=>$usecases,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>"usecases"));
	}
	
	public function equipeAction($id=NULL){
		$devs=User::find();
		$p=Projet::findFirst("id=".$id);
		$usecases=Usecase::find("idProjet=".$p->getId());
		$dev=array();
		$poids=array();
		$totalUc=0;
		foreach ($usecases as $uc){
			$totalUc=$totalUc+$uc->getPoids();
		}
		foreach ($usecases as $uc){
			$u=User::findFirst("id=".$uc->getIdDev());
			$dev[$u->getId()]=$u;
			$poids[$u->getId()]=($poids[$u->getId()]+$uc->getPoids());
		}
		foreach ($devs as $de){
			$poids[$de->getId()]=floor($poids[$de->getId()]/$totalUc*100);
		}
		
		$this->view->setVars(array("dev"=>$dev,"poids"=>$poids,"p"=>$totalUc));
		
		
		
	}
}

