<div class="col-md-12 bg-warning" style="width:100%;padding:0px;">	
<div class="col-md-8" style="font-size:20px;margin:5px">Mes Uses Cases</div>
  		<table class="table table-striped">
  			<thead>
  			</thead>
  			<tbody></tbody>
  			<tr></tr>
  			{% for usecase in usecases %}
  				<tr>
  					<td class="col-md-4"><b>{{ usecase.getNom() }} [{{ usecase.getPoids() }}]</b></td>
  					<td class="col-md-6" id="progressbar{{usecase.getCode()}}">{{q[usecase.getCode()]}}</td>
  					<td class="col-md-2"><b><center><a class="taches" id='bt-{{usecase.getCode()}}' href='{{url.get(baseHref~"/taches/"~usecase.getCode())}}' data-ajax="{{ baseHref ~ "/taches/"~usecase.getCode()  }}">{{ usecase.getNbTache() }}</a></center></b></td>
  				</tr>
  				<tr class="trUseCase-{{usecase.getCode()}}" style="display:none">
  					<td colspan="3">
  						<div class="divUseCase-{{usecase.getCode()}}" id="divUseCase-{{usecase.getCode()}}" style="display:none">
  						</div>
  					</td>
  				</tr>
  			{% endfor %}
  		</table>
</div>	
{{ script_foot }}	