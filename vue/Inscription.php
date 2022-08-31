<!doctype html>

<?php
    include("head.php");
	include('navbar.php');
?>

<html>
	<head>
		<title>Inscription</title>
		<meta charset='utf-8'>
		<link rel='stylesheet' href='style/styleConnexion.css'>
	</head>

	

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

<header>
        <h1>MyFile.com</h1>
      </header>
</center>

	<body>
      <form class="box" method="POST" action="index.php?uc=utilisateur&action=Ajout">
      <h2>Inscription</h2>
      
      <hr>

      <label for="identifiant"> <h6> <b>Nom</b> </h6> </label>
      <input type='text' name='nom' placeholder="Nom" required="">

      <label for="identifiant"> <h6> <b>Prénom</b> </h6> </label>
      <input type='text' name='prenom' placeholder="Prénom" required="">
      
      <label for="mail"> <h6> <b>E-mail</b> </h6> </label>
      <input type='email' name='mail' placeholder="E-mail" required="">
      
      <label for="mdp"> <h6> <b>Mot de Passe</b> </h6> </label>
      <input type='password' name='mdp1' placeholder="Mot de Passe" required="">

      <label for="mdp"> <h6> <b>Confirmez votre Mot de Passe</b> </h6> </label>
      <input type='password' name='mdp2' placeholder="Mot de Passe" required="">

      <input type="submit" value="S'inscrire"/>

      </form>
	</body>

</html>