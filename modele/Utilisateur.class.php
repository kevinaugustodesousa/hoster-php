<?php
class Utilisateur
{
  private $id;
  private $nom;
  private $prenom;
  private $mail;
  private $mdp;
  private $admin;
  private $autoriser  ;
  private $droit_ajouter;
  private $droit_supprimer;
  private $adresse_ip;


  public function _construct($id,$prenom,$nom,$mail,$mdp,$admin,$autoriser,$droit_ajouter,$droit_supprimer){
    $this->id=$id;
    $this->prenom=$prenom;
    $this->nom=$nom;
    $this->mail=$mail;
    $this->mdp=$mdp;
    $this->admin = false;
    $this->autoriser = false;
    $this->droit_ajouter = false;
    $this->droit_supprimer = false;
  }


  // ID
  public function getId(){
    return $this->id;
  }

  // PRENOM
  public function getPrenom(){
    return $this->prenom;
  }
  public function setPrenom($prenom){
    $this->prenom = $prenom;
  }

  // NOM
  public function getNom(){
    return $this->nom;
  }
  public function setNom($nom){
    $this->nom = $nom;
  }

  // MAIL
  public function getMail(){
    return $this->mail;
  }
  public function setMail($mail){
    $this->mail = $mail;
  }

  //MOT DE PASSE
  public function getMdp(){
    return $this->mdp;
  }
  public function setMdp($nvMdp){
    $this->mdp = $nvMdp;
  }

  // ADMIN
  public function getAdmin(){
    return $this->admin;
  }
  public function setAdmin($nvAdmin){
    $this->admin =$nvAdmin;
  }

  // ADDRESSE IP
  public function getAddresseIP(){
    return $this->adresse_ip;
  }
  public function setAddresseIP($nvIp){
    $this->admin =$nvIp;
  }

  // AUTORISATION
  public function getAutoriser(){
    return $this->autoriser;
  }
  public function setAutoriser($autoriser){
     $this->autoriser = $autoriser;
  }

  // DROIT_AJOUTER
  public function getDroit_ajouter(){
    return $this->droit_ajouter;
  }
  public function setDroit_ajouter($droit_ajouter){
     $this->droit_ajouter = $droit_ajouter;
  }

  // DROIT_SUPPRIMER
  public function getDroit_supprimer(){
    return $this->droit_supprimer;
  }
  public function setDroit_supprimer($droit_supprimer){
    $this->droit_supprimer = $droit_supprimer;
 }

  public static function ajouterUtilisateur(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("insert into utilisateur(prenom,nom,mdp,mail,admin,autoriser,droit_ajouter,droit_supprimer) values(:prenom,:nom,MD5(:mdp),:mail,:admin,:autorise,:droit_ajouter,:droit_supprimer)");
    $prenom=$utilisateur->getPrenom();
    $req->bindParam(':prenom',$prenom);
    $nom=$utilisateur->getNom();
    $req->bindParam(':nom',$nom);
    $mail=$utilisateur->getMail();
    $req->bindParam(':mail',$mail);
    $mdp=$utilisateur->getMdp();
    $req->bindParam(':mdp',$mdp);
    $admin=$utilisateur->getAdmin();
    $req->bindParam(':admin',$admin);
    $autoriser=$utilisateur->getAutoriser();
    $req->bindParam(':autorise',$autoriser);
    $droit_ajouter=$utilisateur->getDroit_ajouter();
    $req->bindParam(':droit_ajouter',$droit_ajouter);
    $droit_supprimer=$utilisateur->getDroit_supprimer();
    $req->bindParam(':droit_supprimer',$droit_supprimer);
    $req->execute();
  }


  public static function supprimerUtilisateur(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("delete from utilisateur where id=:id ");
    $id=$utilisateur->getId();
    $req->bindParam(':id', $id);
    $req->execute();
  }

  public static function changerMdp(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("update utilisateur set mdp = :mdp where id=:id");
    $mdp=$utilisateur->getMdp();
    $req->bindParam(':mdp',$mdp);
    $id=$utilisateur->getId();
    $req->bindParam(':id',$id);
    $req->execute();
  }

  public static function changeAutorisation(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("update utilisateur set autoriser= :autoriser where id=:id"); //il faudra voir bdd
    $autoriser=$utilisateur->getAutoriser();
    $autoriser = (int)!$autoriser;
    $req->bindParam(':autoriser',$autoriser);
    $id=$utilisateur->getId();
    $req->bindParam(':id', $id);
    $req->execute();
  }

  public static function changeAdmin(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("update utilisateur set admin = :admin where id=:id");     // il faudra voir avec la base de données
    $admin=$utilisateur->getAdmin();
    $admin=(int)!$admin;
    $req->bindParam(':admin',$admin);
    $id=$utilisateur->getId();
    $req->bindParam(':id',$id);
    $req->execute();
  }

  public static function changeDroit_ajouter(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("update utilisateur set droit_ajouter= :droit_ajouter where id=:id");   // il faudra voir avec la base de données
    $droit_ajouter=$utilisateur->getDroit_ajouter();
    $req->bindParam(':droit_ajouter',$droit_ajouter);
    $droit_ajouter=(int)!$droit_ajouter;
    $id=$utilisateur->getId();
    $req->bindParam(':id',$id);
    $req->execute();
  }

  public static function changeDroit_supprimer(Utilisateur $utilisateur){
    $req=MonPdo::getInstance()->prepare("update utilisateur set droit_supprimer= :droit_supprimer where id=:id");   // il faudra voir avec la base de données
    $droit_supprimer=$utilisateur->getDroit_supprimer();
    $req->bindParam(':droit_supprimer',$droit_supprimer);
    $droit_supprimer=(int)!$droit_supprimer;
    $id=$utilisateur->getId();
    $req->bindParam(':id',$id);
    $req->execute();
  }

  public static function afficherTous(){
    $req=MonPdo::getInstance()->prepare("select*from utilisateur");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->execute();
    $lesResultats=$req->fetchAll();
    return $lesResultats;
  }

  public static function afficherRechercheUtilisateur(){
    $recherche=$_POST["recherche"] ;
    $recherche=strtolower($recherche) ;
    $req=MonPdo::getInstance()->prepare("select*from utilisateur where lower(prenom) like'%$recherche%' OR lower(nom) like '%$recherche%'");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->execute();
    $lesResultats=$req->fetchAll();
    return $lesResultats;
  }

  public static function trouverUtilisateur($id){
    $req=MonPdo::getInstance()->prepare("select * from utilisateur where id=:id");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->bindParam(':id',$id);
    $req->execute();
    $leResultat=$req->fetch();
    return $leResultat;
  }

  public static function trouverUtilisateurparMail($mail){
    $req=MonPdo::getInstance()->prepare("select * from utilisateur where mail=:mail");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->bindParam(':mail',$mail);
    $req->execute();
    $leResultat=$req->fetch();
    return $leResultat;
  }

  public static function trouverUtilisateurparToken($token){
    $req=MonPdo::getInstance()->prepare("select * from utilisateur where token=MD5(:token)");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->bindParam(':token',$token);
    $req->execute();
    $leResultat=$req->fetch();
    return $leResultat;
  }

  public static function getDossiers()
  {
    //la requète récupe les info de chaque user pr les lignes
    $sql =  'SELECT utilisateur.id , utilisateur.prenom, utilisateur.nom, utilisateur.mail, utilisateur.droit_ajouter, utilisateur.droit_supprimer
    FROM fichier JOIN utilisateur on utilisateur.id=fichier.idutil
    GROUP BY idutil';

    $result = MonPdo::getInstance()->query($sql);
    $result->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $lesDossiers = $result->fetchAll();
    
    return $lesDossiers;
  }

  // Token Aléatoire

	public static function genererToken(
		int $length = 64,
		string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
	): string {
		if ($length < 1) {
			throw new \RangeException("Length must be a positive integer");
		}
		$pieces = [];
		$max = mb_strlen($keyspace, '8bit') - 1;
		for ($i = 0; $i < $length; ++$i) {
			$pieces []= $keyspace[random_int(0, $max)];
		}
		return implode('', $pieces);
	}

  // Maj Token

  public static function changerToken($token,$mail){
    $req=MonPdo::getInstance()->prepare("update utilisateur set token = MD5(:token) where mail=:mail");
    $req->bindParam(':token',$token);
    $req->bindParam(':mail',$mail);
    $req->execute();
  }

  // Vérfication Mdp Fort
  public static function MDPFort($password){
    $password = 'user-input-pass';
    $valid = false;

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $valid = false;
    }else{
        $valid = true;
    }

    return $valid;
  }

  // Maj Mdp (Mdp Oublie)

  public static function changerMDPOublie($token,$mdp){
    $req=MonPdo::getInstance()->prepare("update utilisateur set token = NULL, mdp = MD5(:mdp) where token=MD5(:token)");
    $req->bindParam(':token',$token);
    $req->bindParam(':mdp',$mdp);
    $req->execute();
  }

  // Validation et Vérification

  public static function verifier ($login,$mdp){
    $req=MonPdo::getInstance()->prepare("select * from utilisateur where mail=:login and mdp=:mdp");

    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->bindParam('login',$login);
    $req->bindParam('mdp',$mdp);
    $req->execute();
    $leResultat=$req->fetchAll();
    $nb_lignes= count($leResultat);
    if($nb_lignes==0)
    {
        $rep=false;
    } 
    else
    {
        $rep=true;
    }
    return $rep;
  }

  public static function valider ($login,$mdp){
    $req=MonPdo::getInstance()->prepare("select * from utilisateur where mail=:login and mdp=:mdp");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->bindParam('login',$login);
    $req->bindParam('mdp',$mdp);
    $req->execute();
    $leResultat=$req->fetchAll();

    return $leResultat;
  }

  // Déconnexion
  
  public static function deconnexion(){
    unset($_SESSION['connecte']);
  }

  // Adresse IP

  public static function addresseIP(){
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
          $ip = $_SERVER['REMOTE_ADDR'];
      }
    return $ip;
  }



  public static function afficherNonautorise(){
    $req=MonPdo::getInstance()->prepare("select * from utilisateur where autoriser=0");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->execute();
    $lesResultats=$req->fetchAll();
    return $lesResultats;
  }

  public static function trouverAdmin(){
    $req=MonPdo::getInstance()->prepare("select * from utilisateur where admin=1");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->execute();
    $lesResultats=$req->fetchAll();
    return $lesResultats;
  }

  public static function trouverInscrit($mail,$mdp){
    $req=MonPdo::getInstance()->prepare("select * from utilisateur where mail=:mail and mdp=:mdp");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'utilisateur');
    $req->bindParam(':mail',$mail);
    $req->bindParam(':mdp',$mdp);
    $req->execute();
    $leResultat=$req->fetch();
    return $leResultat;
  }

}
?>
