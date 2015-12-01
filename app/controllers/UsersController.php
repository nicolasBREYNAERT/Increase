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
 			$TempsEcoule=0;
 			$tempsTotal=0;
 			
 			$TempsEcoule=time() - strtotime($projet->getDateLancement());
 			$TempsEcoule=floor($TempsEcoule/86400);
 			
 			$tempsTotal=strtotime($projet->getDateFinPrevue())-strtotime($projet->getDateLancement());
 			$tempsTotal=$tempsTotal/86400;
 			
 			$TempsEcoule=$TempsEcoule/$tempsTotal;
 			$TempsEcoule=floor($TempsEcoule*100);
 			
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
 			
 			if ($avancementFinal>=$TempsEcoule){
 				$colorProgressBar="success";
 			}elseif ($projet->getJourRestant()==0){
 				$colorProgressBar="danger";
 			}else {
 				$colorProgressBar="warning";
 			}
 			$this->jquery->bootstrap()->htmlProgressbar($projet->getId(),$colorProgressBar,$avancementFinal)->setStriped(true)->setActive(true)->showcaption(true);
 			$this->jquery->compile($this->view);
			$this->jquery->getOnClick(".ouvrir","","#content",array("attr"=>"data-ajax"));
			
		}
		
		$this->view->setVars(array("user"=>$user, "projects"=>$p,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher->getControllerName()));
		
	}
	
	public function projectAction($id=NULL){
		$p=Projet::findFirst("id=".$id);
		$user=User::findFirst("id=".$p->getId());
		
		//image a mettre
		if($p->getImage() == NULL){
			$source="../../public/img/increase.png";
		}else{
			$source=$p->getImage();
		}
		
		$message=Message::find("idProjet=".$p->getId()." AND idFil is NULL");
		$nbMsg=0;
		
		foreach ($message as $msg){
			$nbMsg=$nbMsg+1;
		}
		
		$this->view->setVars(array("project"=>$p,"user"=>$user,"source"=>$source, "nbMsg"=>$nbMsg));
		$this->jquery->get("Projects/equipe/".$p->getId(),"#detailProject");
		$this->jquery->click(".btnMessages", "$('#divMessages').slideToggle('slow');");
		$this->jquery->get("Projects/messages/".$p->getId(),"#divMessages");
		$this->jquery->compile($this->view);
		
		
		
	}

}

