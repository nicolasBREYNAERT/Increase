<div class="panel panel-warning detailProject col-md-12" style="width:100%;padding-left:0px;padding-right:0;margin-top:10px;margin-bottom:10px">
<div class="col-md-12 panel-heading"><h4><b>Equipe</b></h4></div>

<table class="table table-striped bg-warning">
	<tbody>
		{% for d in dev %}
		<tr>
			<td>{{ d.getIdentite() }}</td>
			<td>[{{poids[d.getId()]}} %]</td>
		</tr>
		{% endfor %}
	</tbody>
</table>

</div>