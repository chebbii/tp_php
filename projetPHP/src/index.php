<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>TP PHP</title>
	</head>
	<body>
		<?php require_once('controller.php'); ?>

			<nav class="navbar menuBar">
				<?php 
					if (isset($_SESSION["connexion"])) { 
						include('header.php');
				?>
					
					<div class="identifier">
						<div class="logMsg">
							<?= "Logged as, ".$_SESSION["connexion"] ?>
						</div>
						<button onclick="Nav('logout')" class="btnLogin">Logout</button>
					</div>

				<?php } else { ?>   

				<div class="identifier">
					<button onclick="Nav('signup')" class="btnLoginSignUp">SignUp</button>
						<div class="logMsg">
							- or -
						</div>
		    			<button onclick="Nav('login')" class="btnLoginSignUp">Login</button>
					</div>

		    	<?php } ?>
	    	</nav>
	    	<?php 
	    	if(isset($_SESSION["connexion"])) { 
	    		include('articles.php'); 
	    	} 
	    	?>
	</body>
</html>