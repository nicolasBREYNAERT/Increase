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
			<a class="btn btn-primary btn-sm clickRep" data-ajax="{{msg.getId()}}">Répondre</a>
			<div class="nReponse" id="nReponse-{{msg.getId()}}" style="margin-top:10px;">
			</div>
		</div>
{% endfor %}

<div class="col-md-8"></div class="col-md-4"><div><a class="btn btn-info clickAjout" align="right" style="padding-left:40px;padding-right:40px;">+ Nouveau message</a></div>
<div class="nMessage" id="nMessage" style="margin-top:10px;">
</div>

		
{{script_foot}}