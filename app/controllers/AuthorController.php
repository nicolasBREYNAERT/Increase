<?php
use Ajax\bootstrap\html\html5\HtmlSelect;
use Ajax\ui\Components\Progressbar;
class AuthorController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="User";
	}
	public function ProjectsAction($id=NULL){
		$user=User::findFirst("id=".$id);
 		$p=Projet::find("idAuthor=".$id);
		$this->jquery->bootstrap()->htmlProgressbar("pb1","success",80)->setStriped(true)->setActive(true)->showcaption(true);
		$this->jquery->compile($this->view);
		$this->view->setVars(array("user"=>$user, "projects"=>$p));
	}
}