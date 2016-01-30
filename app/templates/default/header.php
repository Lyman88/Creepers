<?php

use Helpers\Assets,
    Helpers\Url,
    Helpers\Hooks,
    Helpers\Session;

//initialise hooks
$hooks = Hooks::get();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<?php
	//hook for plugging in meta tags
	$hooks->run('meta');
	?>
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/Core/Config.php ?></title>

	<!-- CSS -->
	<?php
	Assets::css(array(
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
		Url::templatePath() . 'css/style.css',
	));

	//hook for plugging in css
	$hooks->run('css');
	?>

</head>
<body>
<?php
//hook for running code after body tag
$hooks->run('afterBody');
?>

<div class="container">

<nav class="navbar navbar-default" role = "navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" >
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo DIR;?>"><?php echo SITETITLE;?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <li><a href="<?php echo DIR;?>accepted">Přijaté příběhy</a></li> 
            <?php if (Session::get('loggedin')) {?>
              <?php if (Session::get('role') == "uživatel") {?>
                <li><a href="<?php echo DIR;?>tales">Vaše příběhy</a></li>
              <?php } else if (Session::get('role') == "recenzent") {?>
                <li><a href="<?php echo DIR;?>ratings">Vaše recenze</a></li>
              <?php } else {?>
                <li><a href="<?php echo DIR;?>admin">Admin</a></li>
              <?php} { ?>

              <?php } ?>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
              <p class="navbar-text"><?php echo Session::get('username'), " (", Session::get('role'), ")";?></p>
              <li><a href="<?php echo DIR;?>logout">Odhlásit</a></li>   

            <?php } else { ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo DIR;?>register">Registrace</a></li>
              <li><a href="<?php echo DIR;?>login">Přihlásit</a></li>

              <?php } ?>
            </ul>
          </div>
        </div>
</nav>

