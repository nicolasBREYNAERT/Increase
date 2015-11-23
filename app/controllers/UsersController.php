<?php

use Ajax\bootstrap\html\html5\HtmlSelect;

class UsersController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="User";
	}

	public function frmAction($id=NULL){
		$user=$this->getInstance($id);
		$select=new HtmlSelect("role","Rôle","Sélectionnez un rôle...");
		$select->fromArray(array("admin","user","author"));
		$select->setValue($user->getRole());
		$select->compile($this->jquery,$this->view);
		$this->view->setVars(array("user"=>$user,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName()));
		parent::frmAction($id);
	}
	
	public function projectsAction($id=NULL){

		$user=User::findFirst("id=".$id);
		$p=Projet::find("idClient=".$id);
		
		//calcul du poids de chaque projet
		foreach ($p as $projet){
			$u=Usecase::find("idProjet=".$projet->getId());
			$totalPoid=0;
			$avancement=0;
			$avancementFinal=0;
			$useCaseAccomplie=0;
			foreach ($u as $usecase){
				$totalPoid=$totalPoid + $usecase->getPoids();
				if ($usecase->getAvancement()==100){
					$avancement=$avancement+$usecase->getPoids();
				}
			}
			$avancementFinal=$avancement/$totalPoid;
			$avancementFinal=$avancementFinal*100;
			$avancementFinal=floor($avancementFinal);
			$colorProgressBar="";
			if ($avancementFinal<=30){
				$colorProgressBar="danger";
			}elseif ($avancementFinal<=70){
				$colorProgressBar="warning";
			}else{
				$colorProgressBar="success";
			}
			$this->jquery->bootstrap()->htmlProgressbar($projet->getId(),$colorProgressBar,$avancementFinal)->setStriped(true)->setActive(true)->showcaption(true);
			$this->jquery->compile($this->view);
			$this->jquery->getOnClick(".btn , .ouvrir","","#content",array("attr"=>"data-ajax"));
		}
		
		$this->view->setVars(array("user"=>$user, "projects"=>$p,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName()));
		
	}

}

