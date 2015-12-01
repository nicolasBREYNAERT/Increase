{{ form("Taches/update", "method": "post", "name":"modifier", "id":"modifier") }}
<fieldset>
	<legend>Modification ({{ tache.getLibelle() }})</legend>
	<div class="form-group col-md-9">
		<div class="col-md-12">Libelle :</div>
		<input type="hidden" name="id" id="id" value="{{tache.getId()}}">
		<div class="col-md-12"><input type="text" name="libelle" id="libelle" value="{{tache.getLibelle()}}" placeholder="Entrez un libelle" class="form-control" ></div>
		<div class="col-md-4">avancement (en%) :</div>
		<div class="col-md-6">Date :</div>
		<div class="col-md-4"><input type="text" name="poid" id="poid" value="{{tache.getAvancement()}}" class="form-control"></div>
		<div class="col-md-6"><input type="date" name="date" id="date" value="{{tache.getDate()}}" class="form-control"></div>
	</div>
	<div class="form-group col-md-3">
		<div class="col-md-12"><a type="submit" class="btn btn-primary validate col-md-12" style="margin-bottom:5px;margin-top:20px;" >valider</a></div>
		<div class="col-md-12"><a class="btn btn-primary cancel col-md-12" href="" data-ajax="">Annuler</a></div>
	</div>
</fieldset>
</form>
<div class="col-md-12" id="modifie"></div>
{{script_foot}}