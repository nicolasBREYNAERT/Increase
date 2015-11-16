{% for project in projects %}
	{{ project.getNom()~"-"~project.getClient().getIdentite() }}<br>
{% endfor %}