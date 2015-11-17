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
		$this->view->setVars(array("user"=>$user, "projects"=>$p));
	}
}