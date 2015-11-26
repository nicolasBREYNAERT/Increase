<?php
class UseCasesController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Usecase";
	}
	
	public function tachesAction($code=NULL){
		$taches=Tache::find("codeUseCase='".$code."'");
		foreach ($taches as $t){
			$this->jquery->click(".".$t->getId(),"$('#btn-".$code."').slideToggle('slow');");
		}
		$this->jquery->compile($this->view);
		$this->view->setVars(array("taches"=>$taches,"code"=>$code));
	}
}