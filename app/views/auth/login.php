<?php  echo \Core\Error::display($error); ?>

<form class="form-signin" method='post'>

    <h2 class="form-signin-heading">Přihlásit se</h2>
    <label for="inputName" class="sr-only">Jméno</label>
    <input type="text" id="inputName" class="form-control" name="username" placeholder="Jméno" required autofocus>
    <label for="inputPassword" class="sr-only">Heslo</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Heslo" required>
    <button class="btn btn-lg btn-default btn-block" type="submit" name="submit">Přihlásit</button>	
    
</form>
