<?php
    include 'config.php';
    

    class promotionC{




        function ajoutPromotion($P)
        {
            $sql = "INSERT INTO `promotion` (`idprom`, `idProduit`, `pourcentage`, `dateD`, `dateF`) VALUES (NULL, :idProduit, :pourcentage, :dateD, :dateF);";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);

                
               

                $req->bindValue(':idProduit',$P->getidProduit());
                $req->bindValue(':pourcentage',$P->getpourcentage());
                $req->bindValue(':dateD',$P->getdateD());
                $req->bindValue(':dateF',$P->getdateF());
                $req->execute();   
            }
            catch (Exception $e){
                    echo 'Erreur: '.$e->getMessage();

            }    
        }

        function afficherpromo()
        {
            $sql="select * from promotion";
            $db = config::getConnexion();
            try 
            {
                $list=$db->query($sql);
                return $list ;
            }
            catch (Exeption $e)
            {
                die('erreur:' .$e->getMessage());
            }
        }


        function modifier($idprom,$idProduit,$pourcentage,$dateD,$dateF)
        {

            $sql= "Update promotion set idProduit='$idProduit',pourcentage='$pourcentage',dateD='$dateD',dateF='$dateF' where idprom='$idprom'" ;
            $db = config::getConnexion();
              try 
            {
              $db->query($sql);
              
            }
            catch (Exception $e)
            {
                die('Erreur:' .$e->getMessage());
            }

        }




 function supprimerpromo($idprom)
{
    $sql="DELETE FROM `promotion` WHERE `idprom` LIKE '$idprom' ";
    $db = config::getConnexion();
    try
    {
        $db->query($sql);
    }
    catch (Exception $e)
    {
        die('Erreur: ' .$e->getMessage());

    }

} 
}   
?>