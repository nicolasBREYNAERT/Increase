<?php

use Phalcon\Mvc\View;
class UsersController extends \DefaultcController
{
	public function initialize(){
		$this->model="User";
	}
    public function indexAction(){
		parent::indexAction();
		/*$this->view->setVars(array("users"=>$users));	
		$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);*/
    }
    public function frmAction($id){
    	echo "non implémenté";
    }

}

