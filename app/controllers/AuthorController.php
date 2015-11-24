<?php
use Ajax\bootstrap\html\html5\HtmlSelect;

class AuthorController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="User";
	}
	public function ProjectsAction($id=NULL){
		
		$user=User::findFirst("id=".$id);
 		$p=Projet::find("idAuthor=".$id);
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
 			
 		}
 		$this->jquery->getOnClick(".btn , .ouvrir","","#content",array("attr"=>"data-ajax"));
 		$this->jquery->compile($this->view);
 		$this->view->pick("author/projects");
		$this->view->setVars(array("user"=>$user, "projects"=>$p,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher-> getControllerName()));	
	}
	
	public function projectAction($id=NULL)
	{
		$p=Projet::findFirst("id=".$id);
		$user=User::findFirst("id=".$p->getIdAuthor());
		
		//g�n�ration des progress barre pour chaque usecase 
		foreach ($usecases as $u){
			//progressbar
			$avancement=$u->getAvancement();
			$this->jquery->bootstrap()->htmlProgressbar($u->getCode(),"success",$avancement)->setStriped(true)->setActive(true)->showcaption(true);
		}
		
		//image a mettre
		if($p->getImage() == NULL){
			$source="../../public/img/increase.png";
		}else{
			$source=$p->getImage();
		}
		$this->jquery->getOnClick(".btn , .afficher","","#detailProject",array("attr"=>"data-ajax","jsCallback"=>"$('#detailProject').slideToggle('slow');"));
		$this->jquery->compile($this->view);
		$this->view->setVars(array("project"=>$p,"user"=>$user,"source"=>$source,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>"Projects",));
	}
	
}