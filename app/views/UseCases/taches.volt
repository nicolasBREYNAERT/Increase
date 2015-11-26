<table class="table" style="margin-top:0px;margin-bottom:5px;">
	<thead></thead>
	<tbody>
	<form action="select.htm">
	{% for tache in taches %}
		<tr id="{{tache.getId()}}" class="{{tache.getId()}} bg-success" style="cursor:pointer">
			
				<td class=""><b>{{ tache.getLibelle() }}</b> [{{ tache.getAvancement() }}]</td>
				<td class=" col-md-6"></td>
				<td class=""><b>{{ tache.getDate() }}</b></td>
			
		</tr>
	{% endfor %}	
	</form>
	</tbody>
</table>

<a id="ajouter" class="btn btn-info ajouter" href='' data-ajax="">+ Ajouter une tâche</a>
<div id="btn-{{code}}" class="bt-{{tache.getId()}}" style="display:none"">
	<a id="modifier" class="btn btn-info modifier" href='' data-ajax="">Modifier...</a>
	<a id="supprimer" class="btn btn-info supprimer" href='' data-ajax="">Supprimer</a>
</div>
{{script_foot}}