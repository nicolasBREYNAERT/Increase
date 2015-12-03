<?php
use Ajax\Jquery;
class TachesController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Tache";
	}
	
	public function modificationAction($id){
		$tache=Tache::findFirst("id=".$id);
		$this->view->setVars(array("tache"=>$tache));
		$this->jquery->postFormOnClick(".validate","Taches/update/".$id,"modifier","#modifie","");
		
		$use=Usecase::findFirst("code='".$tache->getCodeUseCase()."'");
		$this->jquery->click(".validate","$('#modifier-".$use->getCode()."').hide('400')");
		$this->jquery->click(".cancel","$('#modifier-".$use->getCode()."').hide('400')");
		
		$this->jquery->compile($this->view);
		
	}
	
	public function ajouterAction(){
		
	}
	
	public function deleteAction($id){
		
	}
	
	public function insertAction(){
		
	}
	
	public function updateAction(){
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
		
		
		$use=$object->getUsecase();
		$taches=$use->getTaches();
		$avt=0;
		$i=0;
		foreach($taches as $t){
			$avt=$avt+$t->getAvancement();
			$i=$i+1;
		}
		$avt=$avt/$i;
		
		$use->setAvancement($avt);
		$use->save();
		
		$this->view->disable();
		
		$this->jquery->json("json/taches/".$_POST["id"],"get","{}",NULL,"id","$('#tachezz".$_POST["id"]."')",true);
		$this->jquery->json("json/usecase/".$use->getCode(),"get","{}","$('#".$use->getCode()."').css('width', data['avancement']+'%').attr('aria-valuenow', data['avancement']).html(data['avancement']+'%');","id","$('progressbar".$use->getCode()."')",true);
		
		echo $this->jquery->compile();
		
		
	}
}