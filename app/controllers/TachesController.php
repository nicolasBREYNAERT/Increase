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
	
	public function ajouterAction($code){
		$usecase=Usecase::findFirst("code='".$code."'");
		$this->view->setVars(array("usecase"=>$usecase));
		$this->jquery->postFormOnClick(".validate","Taches/insert","frmajouter","#autreAjouter".$usecase->getCode());
		$this->jquery->click(".validate","$('#modifier-".$usecase->getCode()."').hide('400')");
		$this->jquery->click(".cancel","$('#modifier-".$usecase->getCode()."').hide('400')");
		$this->jquery->compile($this->view);
	}
	
	public function deleteAction($id){
		$object=call_user_func($this->model."::findfirst",$id);
		$use=$object->getUsecase();
		$bs=$this->jquery->bootstrap();
		$btYes=$bs->htmlButton("btYes","Supprimer")->setSize("btn-sm");
		$btYes->getOnClick($this->dispatcher->getControllerName()."/_delete/".$id,"#tampon-".$use->getCode());
		$btYes->onClick("$('#message').html('');");
		$btCancel=$bs->htmlButton("btCancel","Annuler")->setSize("btn-sm");
		$btCancel->onClick("$('#message').html('');");
		$this->view->setVars(array("object"=>$object));
		$this->view->pick("main/delete");
		$this->jquery->compile($this->view);
	}
	
	public function _deleteAction($id){
		try{
			$object=call_user_func($this->model."::findfirst",$id);
			if($object!==NULL){
				$object->delete();
				$msg=new DisplayedMessage($this->model." `{$object->toString()}` supprimé(e)");
			}else{
				$msg=new DisplayedMessage($this->model." introuvable","warning");
			}
		}catch(\Exception $e){
			$msg=new DisplayedMessage("Impossible de supprimer l'instance de ".$this->model,"danger");
		}
		$this->dispatcher->forward(array("controller"=>$this->dispatcher->getControllerName(),"action"=>"index","params"=>array($msg)));
		$use=$object->getUsecase();
		$this->jquery->get("UseCases/taches/".$use->getCode(),"#divUseCase-".$use->getCode());
		$this->view->disable();
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
		$this->jquery->json("json/usecase/".$use->getCode(),"get","{}",
				"$('#bt-".$use->getCode()."').html(data['nbTaches']);$('#".$use->getCode()."').css('width', data['avancement']+'%').attr('aria-valuenow', data['avancement']).html(data['avancement']+'%');","id","$('progressbar".$use->getCode()."')",true);
		
		echo $this->jquery->compile();
	}
	
	public function insertAction(){
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
		
		$this->jquery->json("json/usecase/".$use->getCode(),"get","{}","$('#bt-".$use->getCode()."').html(data['nbTaches']);$('#".$use->getCode()."').css('width', data['avancement']+'%').attr('aria-valuenow', data['avancement']).html(data['avancement']+'%');","id","$('progressbar".$use->getCode()."')",true);
		
		$this->jquery->get("UseCases/taches/".$use->getCode(),"#divUseCase-".$use->getCode());
		
		echo $this->jquery->compile();
	
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