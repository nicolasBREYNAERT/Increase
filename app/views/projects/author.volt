<div class="col-md-12 bg-warning" style="width:100%;padding:0px;">	
<div class="col-md-8" style="font-size:20px;margin:5px">Mes Uses Cases</div>
  		<table class="table table-striped">
  			<thead>
  			</thead>
  			<tbody></tbody>
  			{% for usecase in usecases %}
  				<tr>
  					<td class="col-md-4"><b>{{ usecase.getNom() }} [{{ usecase.getPoids() }}]</b></td>
  					<td class="col-md-6">{{q[usecase.getCode()]}}</td>
  				<td class="col-md-2"><b><center><a class="" href="">{{ usecase.getNbTache() }}</a></center></b></td>
  			</tr>
  		{% endfor %}
  	</table>
</div>		