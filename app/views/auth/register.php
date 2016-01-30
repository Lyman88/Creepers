<?php  echo \Core\Error::display($error); ?>

<form class="form-signin" method='post'>
    <h2 class="form-signin-heading">Registrace</h2>
    <div class="form-group">
    	<label for="inputName">Jméno</label>
    	<input type="text" id="inputName" class="form-control" name="username" placeholder="Jméno" value="<?php if(isset($error)){ echo $_POST['username']; }?>" required autofocus>
    </div>
    <div class="form-group">
    	<label for="inputEmail">Email</label>
    	<input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" value="<?php if(isset($error)){ echo $_POST['email']; }?>" required autofocus>
    </div>
    <div class="form-group">
    	<label for="inputPassword">Heslo</label>
    	<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Heslo" required>
    </div>
    <div class="form-group">
    	<label for="inputPassword">Ověření hesla</label>
    	<input type="password" id="inputPassword" class="form-control" name="repeatPassword" placeholder="Zopakovat Heslo" required>
    </div>
    <button class="btn btn-lg btn-default btn-block" type="submit" name="submit">Registrovat</button>	
</form>