<html>
	<img src="{{ source }}" alt="img" class="img-rounded">
	<div><legend>Projet.{{ project.getNom() }} [{{ user.getIdentite() }}]</legend></div>
	
	
	<div class="col-md-8">
  		Description du projet 
			<div class="span6">
       			Description <br/>
	 			{{ project.getDescription() }}
       			<div class="col-md-6">Début [{{ project.getDateLancement() }}]</div>
       			<div class="col-md-6">Fin prévue [{{ project.getDateFinPrevue() }}]</div>
      		</div> 			
	</div>
	
	<table>
	
	</table>

	
</html>