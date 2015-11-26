<table class="table" style="margin-top:0px;margin-bottom:0px;">
	<thead></thead>
	<tbody>
		{% for tache in taches %}
			<tr id="{{tache.getId()}}" class="{{tache.getId()}} bg-success" style="cursor:pointer">
					<td class=""><b>{{ tache.getLibelle() }}</b> [{{ tache.getAvancement() }}]</td>
					<td class=" col-md-6"></td>
					<td class=""><b>{{ tache.getDate() }}</b></td>
			</tr>
		{% endfor %}
			<tr>
				<td colspan="3">
					<a id="ajouter" class="btn btn-info ajouter" href='' data-ajax="">+ Ajouter une tâche</a>
					{% for tache in taches %}
						<a id="modifier-{{tache.getId()}}" class="btn btn-info modifier" href='' data-ajax="" style="display:none">Modifier...</a>
						<a id="supprimer-{{tache.getId()}}" class="btn btn-info supprimer" href='' data-ajax="" style="display:none">Supprimer</a>
					{% endfor %}
				</td>
			</tr>
	</tbody>
</table>
{{script_foot}}