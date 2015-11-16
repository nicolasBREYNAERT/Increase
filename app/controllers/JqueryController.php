<?php

use Ajax\bootstrap\html\base\CssRef;
class JqueryController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
		$bs=$this->jquery->bootstrap();
		$button=$bs->htmlButton("bt-1","Utilisateurs");
		$button->onClick($this->jquery->getDeferred("users","#panelClients"));
		
		$panel=$bs->htmlPanel("panelClients");
		$panel->setStyle(CssRef::CSS_WARNING);
		
		$split=$bs->htmlSplitbutton("splitBtn","Opérations",array("Ajouter","Sélectionner"));
		
		$this->jquery->getOnClick("#a-splitBtn-dropdown-item-1","user/add","#panelClients");
		
		$modal=$bs->htmlModal("modal1","Liste des utilisateurs");
		
		$this->jquery->click("#a-splitBtn-dropdown-item-2",$modal->jsShow());
		
		$this->jquery->compile($this->view);
	}

}

