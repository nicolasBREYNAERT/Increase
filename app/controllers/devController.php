<?php


class devController extends ControllerBase{
	public function ProjectsAction($id=NULL){
	
		$user=User::findFirst("id=".$id);
		$uses=Usecase::find("idDev=".$id);
		foreach ($u as $uses){
			//progressbar
			$avancement=$u->getAvancement();
			$this->jquery->bootstrap()->htmlProgressbar($u->getCode(),"success",$avancement)->setStriped(true)->setActive(true)->showcaption(true);
		}
		$this->jquery->compile($this->view);
		
		$this->view->setVars(array("user"=>$user, "usecases"=>$uses,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>$this->dispatcher-> getControllerName()));
	}
	
	
}