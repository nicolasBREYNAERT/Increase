<html>
	<legend>Mes projets : [{{ user.getIdentite() }}]</legend>
	<table class='table table-striped'>
		<thead>
		</thead>
		<tbody>
		{% for project in projects %}
			<tr>
				<td>{{project.toString()}}</td>
				<td class="col-md-7">
					{{q["pb1"]}}
				</td>
				<td class="td-center">Reste {{project.getJourRestant()}} jours</td>
				<td class="td-center"><a class="btn btn-primary" href="">Ouvrir...</a></td>
			</tr>
		{% endfor %}
		</tbody>
	</table>
</html>