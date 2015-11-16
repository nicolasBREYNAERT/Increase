{% for user in users %}
	{{ user.getIdentite() }}<br>
	<ul>
	{% for project in user.getProjects() %}
		<li>{{ project.getNom() }}</li>
	{% endfor %}
	</ul>
{% endfor %}