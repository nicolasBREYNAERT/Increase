{{ form("Taches/insert", "method": "post", "name":"frmajouter", "id":"frmajouter") }}
<fieldset>
	<legend>Ajout</legend>
	<div class="form-group col-md-9">
		<div class="col-md-12">Libelle :</div>
		<input type="hidden" name="id" id="id">
		<div class="col-md-12"><input type="text" name="libelle" id="libelle" value="" placeholder="Entrez un libelle" class="form-control" ></div>
		<div class="col-md-4">avancement (en%) :</div>
		<div class="col-md-6">Date :</div>
		<div class="col-md-4"><input type="text" name="avancement" id="avancement" value="" class="form-control"></div>
		<div class="col-md-6"><input type="date" name="date" id="date" value="" class="form-control"></div>
		<div class="col-md-12"><input type="hidden" name="codeUseCase" id="codeUseCase" value="{{usecase.getCode()}}"></div>
	</div>
	<div class="form-group col-md-3">
		<div class="col-md-12"><a type="submit" id="validate" class="btn btn-primary validate col-md-12" style="margin-bottom:5px;margin-top:20px;" >valider</a></div>
		<div class="col-md-12"><a class="btn btn-primary cancel col-md-12" href="" data-ajax="">Annuler</a></div>
	</div>
</fieldset>
</form>
<div class="col-md-12" id="modifie"></div>
{{script_foot}}