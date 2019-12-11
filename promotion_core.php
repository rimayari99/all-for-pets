<?php
include("entities/Promotion.php");
include("entities/promotionC.php");

 Class promotion_core{
  public function login()
  {
  require_once 'views/login.php';
  }
  public function verif(){
    $nom=$_POST["nom"];
     $password=$_POST["password"];
$promo= new promotionC() ;
     $listpromo= $promo->verif($nom,$password);
     if($listpromo!=false)
     {$rows=$listpromo->fetch();
 if(($nom=="admin")&& ($password=="admin"))
 {
  header("location:?core=promotion&action=acc_admin");
 }
else
  { require_once 'views/acceuil_client.php';}
}
    
  }
  public function page_promo_client(){$promo= new promotionC() ;
     $listpromo= $promo->afficherpromo();require_once 'views/promotion_page_client.php';}

public function acc_admin()
{
 require_once 'views/acceuil.php';}

public function page_ajouter()
  {require_once 'views/ajout_promotion.php';
   }
   public function ajouter_promo()
   {
   if(isset($_POST["idProduit"]) and isset($_POST["pourcentage"]) and isset($_POST["dateD"]) and isset($_POST["dateF"]) )
{
    $P=new promotion($_POST["idProduit"],$_POST["pourcentage"],$_POST["dateD"],$_POST["dateF"] );
 
    $ajouC=new promotionC();
    $ajouC->ajoutPromotion($P);
     header("location:?core=promotion&action=afficher_promo");
 
}
else
{
    echo "Erreur";
}
   }


   public function afficher_promo()
   { $promo= new promotionC() ;
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