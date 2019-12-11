<?php


require_once 'connection.php';
require_once 'produit.php';

class ProduitM
{
	public function getProduits()
    {
    	$db=Db::getInstance();
    	$req="SELECT * FROM produits p";
    	$sql=$db->query($req);
    	return $sql;
    }

	public function getProduit($code)
	{
		$db=Db::getInstance();
    	$req="SELECT * FROM produits WHERE idProduit= '$code'";
    	$sql=$db->query($req);
    	
    	return $sql->fetch();
	}
 

}


 ?>