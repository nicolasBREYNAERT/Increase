<?php

class IndexController extends ControllerBase
{

    public function indexAction(){
    	
    	$this->jquery->compile($this->view);
    }
}

