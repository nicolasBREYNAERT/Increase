<html>
	<legend>Mes projets : [{{ user.getIdentite() }}]</legend>
	<table class='table table-striped'>
		{% for project in projects %}
			<tr><td>{{project.toString()}}</td></tr>
		{% endfor %}
	</table>
</html>