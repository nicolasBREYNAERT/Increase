<?php

class ProjectsController extends \DefaultcController
{
	public function initialize(){
		$this->model="Projet";
	}
	
    public function indexAction(){
    	parent::indexAction();
		
    }

}

