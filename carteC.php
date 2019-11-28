<?php
    include 'config.php';
    

    class carteC{




        function ajoutCarte($C)
        {
            $sql = "INSERT INTO `cartefidélité` (`idcarte`, `ID_CLIENT`, `total`, `type`) VALUES (NULL, :idcarte, :ID_CLIENT, :total, :type);";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);

                
               

                $req->bindValue(':ID_CLIENT',$C->getID_CLIENT());
                $req->bindValue(':total',$C>gettotal());
                $req->bindValue(':dateF',$P->gettype());
                $req->execute();   
            }
            catch (Exception $e){
                    echo 'Erreur: '.$e->getMessage();

            }    
        }

        function affichercarte()
        {
            $sql="select * from cartefidélité";
            $db = config::getConnexion();
            try 
            {
                $list=$db->query($sql) ;
                return $list ;
            }
            catch (Exeption $e)
            {
                die('erreur:' .$e->getMessage());
            }
        }


        function modifiercarte($idcarte,$ID_CLIENT,$total,$type)
        {

            $sql= "Update cartefidélité set idcarte='$idcarte',ID_CLIENT='$ID_CLIENT',total='$total',type='$type' where idcarte='$idcarte'" ;
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




 function supprimercarte($idcarte)
{
    $sql="DELETE FROM `cartefidélité` WHERE `idcarte` LIKE '$idcarte' ";
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