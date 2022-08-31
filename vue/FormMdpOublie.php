<!doctype html>

<?php
    include("head.php");
?>

<html>
	<head>
		<title>Mot de Passe Oublié ?</title>
		<meta charset='utf-8'>
		<link rel='stylesheet' href='style/styleConnexion.css'>
	</head>

	<header>
        <h1>MyFile.com</h1>
    </header>

<center>
<?php
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	if (!empty($_SESSION['messageclear']))
	{
		?>
		<div class="alert alert-success" role="alert" id="alert" >
		<?php echo $_SESSION['messageclear'] ." <i class='far fa-check-circle'></i>" ; $_SESSION['messageclear'] = null; ?>
		</div>

<?php
	}

	if (!empty($_SESSION['messageerror']))
	{
		?>
		<div class="alert alert-danger" role="alert" id="alert" >
			<?php echo $_SESSION['messageerror'] ." <i class='fas fa-times'></i>"; $_SESSION['messageerror'] = null; ?>
		</div>
	<?php
	}
?>
</center>


	<body>
		
		<form class="box" method="POST" action="index.php?uc=utilisateur&action=MailEnvoiMDP&mailaction=MdpOublie">
		<h2>Mot de Passe Oublié ?</h2>
		<hr>
		<label for="identifiant"> <h6> <b>Veuillez saisir votre adresse e-mail afin de réinitialiser votre mot de passe :</b> </h6> </label>
		<input type='email' name='mail' required="">
		<input type="submit" value="Envoyer"/>
		</form>
	</body>
</html>	