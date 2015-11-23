<html>
<div class="col-md-12 row">
	<div class="col-md-2">
		<img src="{{ source }}" alt="img" class="img-rounded">
	</div>
	<div class="col-md-10">
		<div class="col-md-12 bg-warning" style="width:100%;border:8px outset #FFCC99;padding:8px;">
				<h3><b>Projet.{{ project.getNom() }} [{{ user.getIdentite() }}]</b></h3>
		</div>
		<div class="col-md-12 bg-warning" style="width:100%;border:8px outset #FFCC99;padding:8px;margin-top:10px"><h3>Détail du projet</h3>
  			<div class="col-md-12">
       			<h4><b>Description</b></h4>
	 			{{ project.getDescription() }}
	 			<hr>
       			<div class="col-md-6"><b>Début [{{ project.getDateLancement() }}]</b></div>
       			<div class="col-md-6"><b>Fin prévue [{{ project.getDateFinPrevue() }}]</b></div>
      		</div> 	
      	</div>		
      	<div class="col-md-12 bg-warning" style="width:100%;border:8px outset #FFCC99;padding:8px;margin-top:10px">
      		<h3>Mes Uses Cases</h3>
  			<table class="table">
  				<thead></thead>
  				<tbody></tbody>
  				{% for usecase in usecases %}
  					<tr>
  						<td class="col-md-4"><b>{{ usecase.getNom() }} [{{ usecase.getPoids() }}]</b></td>
  						<td class="col-md-6">{{q[usecase.getCode()]}}</td>
  						<td class="col-md-2"><a class="" href="">{{ }}</a></td>
  					</tr>
  				{% endfor %}
  			</table>
      	</div>		
	</div>
</div>
</html>