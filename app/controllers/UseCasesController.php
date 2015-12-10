<?php
class UseCasesController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="Usecase";
	}
	
	public function tachesAction($code=NULL){
		
		$taches=Tache::find("codeUseCase='".$code."'");
		$usecase=Usecase::findFirst("code='".$code."'");
		$n=$usecase->getNbreTache();
		if ($n==1){
			$this->jquery->click(".".$taches[0]->getId(),"$('#modifier-".$taches[0]->getId()."').slideToggle('slow');$('#supprimer-".$taches[0]->getId()."').slideToggle('slow');$('#icon-".$taches[0]->getId()."').slideToggle('fast');");
		}else{
			for ($i = 0; $i < $n; $i++) {
				if ($i == 0) {
					$Apr=$taches[$i+1]->getId();
					$this->jquery->click(".".$taches[$i]->getId(),"$('#modifier-".$Apr."').hide();$('#supprimer-".$Apr."').hide();$('#icon-".$Apr."').hide();$('#modifier-".$taches[$i]->getId()."').slideToggle('slow');$('#supprimer-".$taches[$i]->getId()."').slideToggle('slow');$('#icon-".$taches[$i]->getId()."').slideToggle('fast');");
				}elseif ($i == $n-1){
					$Avt=$taches[$i-1]->getId();
					$this->jquery->click(".".$taches[$i]->getId(),"$('#modifier-".$Avt."').hide();$('#supprimer-".$Avt."').hide();$('#icon-".$Avt."').hide();$('#modifier-".$taches[$i]->getId()."').slideToggle('slow');$('#supprimer-".$taches[$i]->getId()."').slideToggle('slow');$('#icon-".$taches[$i]->getId()."').slideToggle('fast');");	
				}else{
					$Apr=$taches[$i+1]->getId();
					$Avt=$taches[$i-1]->getId();
					$this->jquery->click(".".$taches[$i]->getId(),"$('#modifier-".$taches[$i]->getId()."').slideToggle('slow');$('#supprimer-".$taches[$i]->getId()."').slideToggle('slow');$('#icon-".$taches[$i]->getId()."').slideToggle('fast');$('#modifier-".$Apr."').hide(100);$('#modifier-".$Avt."').hide(100);$('#supprimer-".$Apr."').hide(100);$('#supprimer-".$Avt."').hide(100);$('#icon-".$Apr."').hide();$('#icon-".$Avt."').hide();");
				}
			}
		}
		$this->jquery->click(".tache","$('#modifier-".$usecase->getCode()."').hide(400);");
		$this->jquery->getOnClick(".modifier-".$usecase->getCode(),"","#modifier-".$usecase->getCode(),array("attr"=>"data-ajax","jsCallback"=>"$('#modifier-".$usecase->getCode()."').show(400);"));
		
		$this->jquery->click(".ajouter","$('#modifier-".$usecase->getCode()."').hide(400);");
		$this->jquery->getOnClick(".ajouter", "","#modifier-".$usecase->getCode(),array("attr"=>"data-ajax","jsCallback"=>"$('#modifier-".$usecase->getCode()."').show(400);"));
		
		$this->jquery->getOnclick(".supprimer", "","#supprimer-".$usecase->getCode(),array("attr"=>"data-ajax","jsCallback"=>"$('#supprimer-".$usecase->getCode()."').show(400);"));
		
		$this->jquery->compile($this->view);
		$this->view->setVars(array("taches"=>$taches,"code"=>$code,"n"=>$i,"usecase"=>$usecase));
	}
}