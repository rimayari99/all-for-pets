
<?php
include("entities/carte.php");
include("entities/carteC.php");

 Class carte_core{
  public function login()
  {
  require_once 'views/login.php';
  }
  public function verif(){
    $nom=$_POST["nom"];
     $password=$_POST["password"];
$carte= new carteC() ;
     $listcarte= $carte->verif($nom,$password);
     if($listcarte!=false)
     {$rows=$listcarte->fetch();
 if(($nom=="admin")&& ($password=="admin"))
 {
  header("location:?core=carte&action=acc_admin");
 }
else
  { require_once 'views/acceuil_client.php';}
}
    
  }
  public function page_carte_client(){$carte= new carteC() ;
     $listcarte= $carte->affichercarte();require_once 'views/_page_client.php';}

public function acc_admin()
{
 require_once 'views/acceuil.php';}

public function page_ajouter()
  {require_once 'views/ajout_carte.php';
   }
   public function ajouter_carte()
   {
   if(isset($_POST["ID_CLIENT"]) and isset($_POST["total"]) and isset($_POST["type"]) )
{
    $C=new cartefidelite($_POST["ID_CLIENT"],$_POST["total"],$_POST["type"] );
 
    $ajouCa=new carteC();
    $ajouCa->ajoutCarte($C);
     header("location:?core=carte&action=afficher_carte");
 
}
else
{
    echo "Erreur";
}
   }


   public function afficher_carte()
   { $carte= new carteC() ;
     $listpromo= $promo->afficherpromo();
     require_once 'views/page_promotions.php';}
     
     public function supprimer_promo()
    {
 $promo= new promotionC() ;

     $listpromo= $promo->supprimerpromo($_GET["id"]);
   header("location:?core=promotion&action=afficher_promo");
    }
 
 public function page_modifier()
 {$promo=new promotionC();
$listpromo=$promo->afficherpromobyid($_GET['id']);
$x=$_GET['id'];
  require_once 'views/page_modifier_promo.php';
 }

 public function modif_promo()
 {
  

$idprom=$_POST["idprom"];
$idProduit=$_POST["idProduit"];
$pourcentage=$_POST["pourcentage"] ;
$dateD=$_POST["dateD"];
$dateF=$_POST["dateF"];


$promoC=new promotionC();
$promoC->modifier($idprom,$idProduit,$pourcentage,$dateD,$dateF);

header("location:?core=promotion&action=afficher_promo");
 }






}
 ?>