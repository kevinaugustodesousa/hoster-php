<?php
	include('navbar.php');
?>

<html>
	<head>
		<title>Connexion</title>
		<meta charset='utf-8'>
		<link rel='stylesheet' href='style/styleConnexion.css'>
	</head>

	<header>
        <h1>MyFile.com</h1>
    </header>

<center>
<?php
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
		
		<form class="box" method="POST" action="index.php?uc=utilisateur&action=seConnecter">
		<h2>Connexion</h2>
		<hr>
		<input type='text' name='login' placeholder="Email" required="">
		<input type='password' name='pass' placeholder="Mot de Passe" required="">
		
		<input type="submit" value="Se Connecter"/>
		<hr>
		<label for="identifiant"> <p> Pas Encore Inscrit ? <a href="index.php?uc=utilisateur&action=Inscription">S'incrire</a> </p> </label>
		<br>
		<button type="button" class="btn btn-secondary">Mot de passe oublié ? (Non disponible)</button>
		</form>
		
	</body>
</html>	