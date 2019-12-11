<?php
include("entities/produit.php");
include("entities/produitM.php");
include("entities/Promotion.php");
include("entities/promotionC.php");

 Class produit_core{
  public function login()
  {
  require_once 'views/login.php';
  }
  public function verif(){
    $nom=$_POST["nom"];
     $password=$_POST["password"];
$produit= new produitM() ;
     $listproduit= $produit->verif($nom,$password);
     if($listproduit!=false)
     {$rows=$listproduit->fetch();
 if(($nom=="admin")&& ($password=="admin"))
 {
  header("location:?core=produit&action=acc_admin");
 }
else
  { require_once 'views/acceuil_client.php';}
}
    
  }
  public function page_produit(){$produit= new produitM() ;
     $listproduit= $produit->getProduits();
     $promo= new promotionC() ;
     $listpromo= $promo->afficherpromo();
     require_once 'views/produits.php';
   }
  public function afficher_produit(){$produit= new produitM() ;
     $prod= $produit->getProduit($_GET["id"]);
     $promo= new promotionC() ;
     $listpromo= $promo->afficherpromo();
     require_once 'views/produit.php';
   }

public function acc_admin()
{
 require_once 'views/acceuil.php';}








}
 ?>