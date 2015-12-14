<div class="container">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<form method="post" action="DefaultC/connexion">
			<fieldset>
				<legend>Connection</legend>
				<label>Login</label>
				<input name="login" type="text" required class="form-control" >
				<br>
				<label>Password</label>
				<input name="password" type="password" required class="form-control">
				<br>
				<div class="form-group">
					<center><input type="submit" value="connection" class="btn btn-default"></center>
				</div>
			</fieldset>
		</form>
		<br>
	<a class="btn btn-primary" id="btn" data-ajax="">client</a>
	<a class="btn btn-primary" id="btn" data-ajax="">author</a>
	<a class="btn btn-primary" id="btn" data-ajax="">chef</a>
	</div>
	
</div>
{{ script_foot }}