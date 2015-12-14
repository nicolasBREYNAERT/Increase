<div class="col-md-12 ">
	<div class="col-md-10">
		<div class="col-md-12 ">
				<legend><div class="col-md-10"><b> [{{ user.getIdentite() }}]</b></div></legend>
		</div>
		<div class="panel panel-warning col-md-12" style="width:100%;padding-left:0px;padding-right:0;margin-top:10px;margin-bottom:10px">
			<div class="col-md-12 panel-heading"><h4>liste des Usecases</h4></div>
	  			<div class="col-md-12 panel-body">
	  				<table class="table table-striped bg-warning">
	  					<thead>
	  						<tr><td><b>Nom</b></td><td><b>Avancement</b></td><td><b>Projet</b></td></tr>
	  					</thead>
	  					<tbody>
	  					{% for usecase in usecases %}
	  						<tr>
	  							<td>{{usecase.getNom()}}</td>
	  							<td>{{q[usecase.getCode()]}}</td>
	  							<td>{{usecase.getProjet()}}</td>
	  						</tr>
	  					{% endfor %}
	  					</tbody>
					</table>
	      		</div> 
      	</div>     			
	</div>
</div>
<div class="clearfix"></div>

