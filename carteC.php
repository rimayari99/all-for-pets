<?php
    include 'config.php';
      
    

    class carteC{




        function ajoutCarte($C)
        {
            $sql = "INSERT INTO `cartefidelite` (`idcarte`, `ID_CLIENT`, `total`, `type`) VALUES (NULL, :ID_CLIENT, :total, :type);";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);

                
               

                $req->bindValue(':ID_CLIENT',$C->getID_CLIENT());
                $req->bindValue(':total',$C->gettotal());
                $req->bindValue(':type',$C->gettype());
                $req->execute();   
            }
            catch (Exception $e){
                    echo 'Erreur: '.$e->getMessage();

            }    
        }

       function affichiercarte()
        {
            $sql="select * from cartefidelite";
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


function affichercartebyid($idcarte)
        {
            $sql="select * from cartefidelite where idcarte='$idcarte' ";
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

        function modifiercarte($idcarte,$ID_CLIENT,$total,$type)
        {

            $sql= "Update cartefidelite set idcarte='$idcarte',ID_CLIENT='$ID_CLIENT',total='$total',type='$type' where idcarte='$idcarte'" ;
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
    $sql="DELETE FROM `cartefidelite` WHERE `idcarte` LIKE '$idcarte' ";
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


function verif($nom,$password) {
     //$liste = [];
      $db = Db::getInstance();
      $req = $db->prepare("SELECT * from clients WHERE ( (nomClient='".$nom."') AND (mdpClient='".$password."'))");
      $req-> execute();
    return  $req;

         }
 
}   
?>