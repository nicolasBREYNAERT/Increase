<table class="table" style="margin-top:0px;margin-bottom:0px;">
	<thead></thead>
	<tbody>
		{% for tache in taches %}
			<tr id="tachezz{{tache.getId()}}" class="{{tache.getId()}} bg-success tache" style="cursor:pointer">
					<td class=""><b><span id="libelle">{{ tache.getLibelle() }}</span></b> <span id="avancement" class="badge">{{ tache.getAvancement() }}</span></td>
					<td class=" col-md-5"></td>
					<td class=""><b><span id="date">{{ tache.getDate() }}</span></b></td>
					<td><span class="glyphicon glyphicon-ok" id="icon-{{tache.getId()}}" style="display:none"></span></td>
			</tr>
		{% endfor %}
			<tr>
				<td colspan="4">
					<a id="ajouter" class="btn btn-primary ajouter" href='{{url.get("taches/ajouter/") }}' data-ajax="{{"taches/ajouter"}}">+ Ajouter une tâche</a>
					{% for tache in taches %}
						<a id="modifier-{{tache.getId()}}" class="btn btn-primary modifier-{{usecase.getCode()}}" href='{{url.get("taches/modification/"~tache.getId()) }}' data-ajax="{{"taches/modification/"~tache.getId() }}" style="display:none">Modifier...</a>
						<a id="supprimer-{{tache.getId()}}" class="btn btn-primary supprimer" href='{{url.get("taches/delete/"~tache.getId()) }}' data-ajax="{{"taches/delete/"~tache.getId() }}" style="display:none">Supprimer</a>
					{% endfor %}
				</td>
			</tr>
	</tbody>
</table>
<div class="col-md-12 bg-success" id="modifier-{{usecase.getCode()}}" style="display:none">
</div>
{{script_foot}}