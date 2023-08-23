<form method="post" action=" <?=BASE_URL?>auth/register">
	<div class="form-group">
		<label for="auth-login">Login</label>
		<input type="text" value="<?=$login?>" class="form-control" id="auth-login" name="login"> 
	</div>
	<div class="form-group">
		<label for="auth-password">Password</label>
		<input type="password" class="form-control" id="auth-password" name="password1"> 
	</div>
	<div class="form-group">
		<label for="auth-password">Repeat password</label>
		<input type="password" class="form-control" id="auth-password" name="password2">
	</div>
	<div class="form-group">
		<label for="auth-login">Email</label>
		<input type="text" value="<?=$email?>" class="form-control" id="auth-login" name="email"> 
	</div>
	<div class="form-group">
		<label for="auth-login">Name</label>
		<input type="text" value="<?=$name?>" class="form-control" id="auth-login" name="name"> 
	</div>
	<hr>
	<button class="btn btn-primary">Registration</button>
        <?if($regErr !== ''):?>
		<hr>
		<div class="alert alert-danger">
			<?=$regErr?>
		</div>
        <? endif; ?>
</form>