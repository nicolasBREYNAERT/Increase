{% for msg in message %}
		<div class="col-md-12 clickMessage" style="cursor:pointer;">
			<div class="col-md-6">Message.{{msg.getUser()}} - {{msg.getObjet()}}</div>
			<div class="col-md-2"></div>
			<div class="col-md-4">[{{msg.getDate()}}]</div>
		</div>
		<hr>
		<div class="discussion" id="discussion" style="display:none">
		<div class="panel panel-info">
				<div class="panel-heading"><b>Message de {{msg.getUser()}} </b></div>
    			<div class="panel-body"><p><i>{{msg.getContent()}}</i></p></div>
  		</div>		
			{% for rep in reponse %}
			<div class="panel panel-info">
				<div class="panel-heading"><b>Réponde de {{rep.getUser()}}</b></div>
    			<div class="panel-body"><p><i>{{rep.getContent()}}</i></p></div>
  			</div>		
			{% endfor %}
			<a class="btn btn-primary btn-sm clickRep">Répondre</a>
			<div class="nReponse" id="nReponse" style="display:none">
				<legend>Ajouter un message</legend>
				{{ form("Projects/message", "method": "post", "name":"ajoutReponse", "id":"ajoutReponse") }}
					<fieldset>
						<div class="form-group col-md-9">
							<input type="hidden" name="id" id="id">
							<div class="col-md-12">Objet :</div>
							<div class="col-md-12"><input type="text" name="nObjet" id="nObjet" value="" placeholder="Entrez l'objet de votre message" class="form-control" ></div>
							<div class="col-md-12">Message :</div>
							<div class="col-md-12"><input type="text" name="nMsg" id="nMsg" value="" placeholder="Entrez votre message" class="form-control" style="height:200px;" ></div>
							<input type="hidden" name="date" id="date" value="">
							<input type="hidden" name="user" id="user" value="{{user.getId()}}">
							<input type="hidden" name="projet" id="projet" value="{{projet.getId()}}">
							<input type="hidden" name="idFil" id="idFil" value="{{message.getId()}}">
						</div>
						<div class="form-group col-md-3">
							<div class="col-md-12"><a type="submit" class="btn btn-primary validate col-md-12" style="margin-bottom:5px;margin-top:20px;" >valider</a></div>
							<div class="col-md-12"><a class="btn btn-primary cancel col-md-12" href="" data-ajax="">Annuler</a></div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
{% endfor %}

<div class="col-md-8"></div class="col-md-4"><div><a class="btn btn-info clickAjout" align="right" style="padding-left:40px;padding-right:40px;">+ Nouveau message</a></div>
<div class="nouveauMessage" id="nouveauMessage" style="display:none">
	<legend>Ajouter un message</legend>
	{{ form("Projects/message", "method": "post", "name":"ajoutMessage", "id":"ajoutMessage") }}
		<fieldset>
			<div class="form-group col-md-9">
				<input type="hidden" name="id" id="id">
				<div class="col-md-12">Objet :</div>
				<div class="col-md-12"><input type="text" name="nObjet" id="nObjet" value="" placeholder="Entrez l'objet de votre message" class="form-control" ></div>
				<div class="col-md-12">Message :</div>
				<div class="col-md-12"><input type="text" name="nMsg" id="nMsg" value="" placeholder="Entrez votre message" class="form-control" style="height:200px;" ></div>
				<input type="hidden" name="date" id="date" value="">
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
</div>

		
{{script_foot}}