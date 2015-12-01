
<div class="col-md-12 row">
	<div class="col-md-2">
		<img src="{{ source }}" alt="img" class="img-rounded">
	</div>
	<div class="col-md-10">
		<div class="col-md-12 " style="width:100%;padding:8px;">
				<legend><div class="col-md-10"><b>Projet.{{ project.getNom() }} [{{ user.getIdentite() }}]</b></div><a class="btn btn-primary precedent" href='{{url.get("author/projects/"~user.getId())}}' data-ajax="{{"author/projects/"~user.getId()}}" style="margin-bottom:5px">liste des projets</a></legend>
		</div>
		<div class="col-md-12 bg-warning" style="width:100%;padding:8px;margin-top:10px;margin-bottom:10px"><h3>Détail du projet</h3>
  			<div class="col-md-12">
       			<h4><b>Description</b></h4>
	 			{{ project.getDescription() }}
	 			<hr>
       			<div class="col-md-6"><b>Début [{{ project.getDateLancement() }}]</b></div>
       			<div class="col-md-6"><b>Fin prévue [{{ project.getDateFinPrevue() }}]</b></div>
      		</div> 	
      	</div>	
      	<a id="afficher" class="btn btn-success afficher" href='{{url.get(baseHref~"/author/"~project.getId()~"/"~user.getId())}}' data-ajax="{{ baseHref ~ "/author/" ~ project.getId()~"/"~user.getId() }}">Afficher/Masquer les Uses Cases</a>
      	<br>
      	<div class="detailProject col-md-12" id="detailProject" style="margin-top:10px;display:none">	
      	</div>
      			
	</div>
</div>
<div class="clearfix"></div>
{{script_foot}}