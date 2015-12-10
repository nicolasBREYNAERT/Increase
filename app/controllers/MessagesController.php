<?php
class MessagesController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Message";
	}
	
	public function repondreAction(){
		if($this->request->isPost()){
			$object=$this->getInstance(@$_POST["id"]);
			$this->setValuesToObject($object);
			if($_POST["id"]){
				try{
					$object->save();
					$msg=new DisplayedMessage($this->model." `{$object->toString()}` mis à jour");
				}catch(\Exception $e){
					$msg=new DisplayedMessage("Impossible de modifier l'instance de ".$this->model,"danger");
				}
			}else{
				try{
					$object->save();
					$msg=new DisplayedMessage("Instance de ".$this->model." `{$object->toString()}` ajoutée");
				}catch(\Exception $e){
					$msg=new DisplayedMessage("Impossible d'ajouter l'instance de ".$this->model,"danger");
				}
			}
		}
		//AJAX REFRESH LA DIV
		
	}
	
	public function nMessageAction(){
		if($this->request->isPost()){
			$object=$this->getInstance(@$_POST["id"]);
			$this->setValuesToObject($object);
			if($_POST["id"]){
				try{
					$object->save();
					$msg=new DisplayedMessage($this->model." `{$object->toString()}` mis à jour");
				}catch(\Exception $e){
					$msg=new DisplayedMessage("Impossible de modifier l'instance de ".$this->model,"danger");
				}
			}else{
				try{
					$object->save();
					$msg=new DisplayedMessage("Instance de ".$this->model." `{$object->toString()}` ajoutée");
				}catch(\Exception $e){
					$msg=new DisplayedMessage("Impossible d'ajouter l'instance de ".$this->model,"danger");
				}
			}
		}
	}
}