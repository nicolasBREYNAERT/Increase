<table class="table" style="margin-top:0px;margin-bottom:0px;">
	<thead></thead>
	<tbody>
		{% for tache in taches %}
			<tr id="{{tache.getId()}} " class="{{tache.getId()}} bg-success tache" style="cursor:pointer">
					<td class=""><b>{{ tache.getLibelle() }}</b> [{{ tache.getAvancement() }}]</td>
					<td class=" col-md-5"></td>
					<td class=""><b>{{ tache.getDate() }}</b></td>
					<td><span class="glyphicon glyphicon-ok" id="icon-{{tache.getId()}}" style="display:none"></span></td>
			</tr>
		{% endfor %}
			<tr>
				<td colspan="4">
					<a id="ajouter" class="btn btn-primary ajouter" href='{{url.get("taches/insert/") }}' data-ajax="{{"taches/insert"}}">+ Ajouter une tâche</a>
					{% for tache in taches %}
						<a id="modifier-{{tache.getId()}}" class="btn btn-primary modifier" href='{{url.get("taches/update/"~tache.getId()) }}' data-ajax="{{"taches/update/"~tache.getId() }}" style="display:none">Modifier...</a>
						<a id="supprimer-{{tache.getId()}}" class="btn btn-primary supprimer" href='{{url.get("taches/delete/"~tache.getId()) }}' data-ajax="{{"taches/delete/"~tache.getId() }}" style="display:none">Supprimer</a>
					{% endfor %}
				</td>
			</tr>
	</tbody>
</table>
<div class="col-md-12 bg-success" id="modifier-{{usecase.getCode()}}" style="display:none">
</div>
{{script_foot}}