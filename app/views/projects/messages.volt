<div class="col-md-12">

<table class="table table-striped bg-warning">
	<tbody>
		{% for msg in message %}
		<tr class="clickMessage"  style="cursor:pointer">
			<td>Message.{{msg.getUser()}} - {{msg.getObjet()}}</td>
			<td align="right">[{{msg.getDate()}}]</td>
		</tr>
		<tr class="discussion" id="discussion" style="display:none" >
			<td colspan="2">

				<table class="table table-striped bg-success col-md-12">
				<tbody>
					<tr>
						<td><b>Message de {{msg.getUser()}} </b><br>
						<i>{{msg.getContent()}}</i></td>
					<tr>
				{% for rep in reponse %}
					<tr>
						<td><b>Réponde de {{rep.getUser()}}</b><br>
						<i>{{rep.getContent()}}</i></td>
					</tr>
				{% endfor %}
				</tbody>
				</table>

			<td>
		</tr>
		{% endfor %}
		
	</tbody>
</table>
</div>
{{script_foot}}