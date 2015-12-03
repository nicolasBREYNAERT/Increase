<div class="col-md-12 row">
	<div class="col-md-2">
		<img src="{{ source }}" alt="img" class="img-rounded">
	</div>
	<div class="col-md-10">
		<div class="col-md-12" style="width:100%;padding:8px;">
				<legend><b>Projet.{{ project.getNom() }} [{{ user.getIdentite() }}]</b></legend>
		</div>
		<div class="panel panel-warning col-md-12" style="width:100%;padding-left:0px;padding-right:0;margin-top:10px;margin-bottom:10px">
			<div class="col-md-12 panel-heading"><h4>Détail du projet</h4></div>
	  			<div class="col-md-12 panel-body">
	       			<h4><b>Description</b></h4>
		 			<p>{{ project.getDescription() }}</p>
	       			<div class="col-md-6"><b>Début [{{ project.getDateLancement() }}]</b></div>
	       			<div class="col-md-6"><b>Fin prévue [{{ project.getDateFinPrevue() }}]</b></div>
	      		</div> 
      	</div>
      	<div class="detailProject col-md-12" id="detailProject" style="width:100%;padding-left:0px;padding-right:0;margin-top:10px;margin-bottom:10px">
      			
      	</div>
      	<a class="btn btn-primary btnMessages" style="margin-top:20px" id="btnMessages">{{ nbMsg }} Message(s)</a>
      		
      	<div class="divMessages col-md-12 bg-warning" id="divMessages" style="display:none;width:100%;padding:8px;margin-top:15px;margin-bottom:10px">
      	
      	</div>	
	</div>
</div>
<div class="clearfix"></div>
{{script_foot}}