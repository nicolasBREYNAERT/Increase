
	{{ form("Projects/message", "method": "post", "name":"ajoutMessage", "id":"ajoutMessage") }}
		<fieldset>
			<legend>Ajouter un message</legend>
			<div class="form-group col-md-9">
				<input type="hidden" name="id" id="id">
				<div class="col-md-12">Objet :</div>
				<div class="col-md-12"><input type="text" name="nObjet" id="nObjet" value="" placeholder="Entrez l'objet de votre message" class="form-control" ></div>
				<div class="col-md-12">Message :</div>
				<div class="col-md-12"><input type="text" name="nMsg" id="nMsg" value="" placeholder="Entrez votre message" class="form-control" style="height:200px;" ></div>
				<input type="hidden" name="date" id="date">
				<input type="hidden" name="user" id="user" value="{{user.getId()}}">
				<input type="hidden" name="projet" id="projet" value="{{projet.getId()}}">
				<input type="hidden" name="idFil" id="idFil">
			</div>
			<div class="form-group col-md-3">
				<div class="col-md-12"><a type="submit" class="btn btn-primary validate col-md-12" style="margin-bottom:5px;margin-top:20px;" >valider</a></div>
				<div class="col-md-12"><a class="btn btn-primary cancel col-md-12" href="" data-ajax="">Annuler</a></div>
			</div>
		</fieldset>
	</form>
