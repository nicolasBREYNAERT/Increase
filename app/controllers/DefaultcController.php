<?php

class DefaultcController extends \Phalcon\Mvc\Controller
{
	protected $model;
	
    public function indexAction(){
		$objects=call_user_func($this->model."::find");
		$this->view->setVars(array("objects"=>$objects,"title"=>$this->model,"baseHref"=>$this->url->getBaseUri()));
		$this->view->pick("main/index");
    }
    
    public function deleteAction($id=NULL){
    	echo "non implémenté";
    }

}

