<html>
	<img src="{{ project.getImage() }}" alt="img" class="img-rounded">
	<div><legend>Projet.{{ project.getNom() }} [{{ user.getIdentite() }}]</legend></div>
	
	
	<div class="row-fluid">
  		<div class="span12">
    		Description du projet 
		
			<div class="row-fluid">
      			<div class="span6">
       				Description <br/>
	 				{{ project.getDescription() }}
        				<div class="row-fluid">
          					<div class="span6">Début [{{ project.getDateLancement() }}]</div>
          					<div class="span6">Fin prévue [{{ project.getDateFinPrevue() }}]</div>
        				</div>
      			</div>
			</div> 			
		</div>
	</div>

	
</html>