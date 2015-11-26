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
		$i=0;
		if ($n==1){
			$this->jquery->click(".".$t->getId(),"$('#modifier-".$t->getId()."').slideToggle('slow');$('#supprimer-".$t->getId()."').slideToggle('slow');");
		}else{
			foreach ($taches as $t){
				$i=$i+1;
				if ($i==1){
					$tApr=$taches[$i]->getId();
					$this->jquery->click(".".$t->getId(),"$('#modifier-".$t->getId()."').slideToggle('slow');$('#modifier-".$tApr."').hide(100);$('#supprimer-".$t->getId()."').slideToggle('slow');");
				}elseif ($i==$n){
					$tAvt=$taches[$i-2]->getId();
					$this->jquery->click(".".$t->getId(),"$('#modifier-".$t->getId()."').slideToggle('slow');$('#modifier-".$tAvt."').hide(100);$('#supprimer-".$t->getId()."').slideToggle('slow');");
				}else{
					$tAvt=$taches[$i-2]->getId();
					$tApr=$taches[$i]->getId();
					$this->jquery->click(".".$t->getId(),"$('#modifier-".$t->getId()."').slideToggle('slow');$('#modifier-".$tAvt."').hide(100);$('#modifier-".$tApr."').hide(100);$('#supprimer-".$t->getId()."').slideToggle('slow');");
				}
			}
		}
		$this->jquery->compile($this->view);
		$this->view->setVars(array("taches"=>$taches,"code"=>$code,"n"=>$n));
	}
}