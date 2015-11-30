<div class="col-md-12">
<h4><b>Equipe</b></h4>

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