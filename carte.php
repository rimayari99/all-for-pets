<?php
    class carte
    {
        private $idcarte;
        private $ID_CLIENT;
        private $total;
        private $type;
       

        function __construct($ID_CLIENT,$total,$type){
            //$this->idprom = $idprom;
            $this->ID_CLIENT= $ID_CLIENT;
            $this->total = $total;
            $this->type = $type;
            
        }

       
      
       
        function getidcarte(){
            return $this->idcarte;
        }


        function getID_CLIENT(){
            return $this->ID_CLIENT;
        }

        function gettotal(){
            return $this->total;
        }

        function gettype(){
            return $this->type;
        }

      
          function setidcarte($idcarte){
            $this->idcarte = $idcarte;
        }

        function setID_CLIENT($ID_CLIENT){
            $this->ID_CLIENT = $ID_CLIENT;
        }

        function settotal($total){
            $this->total= $total;
        }

        function settype($type){
            $this->type = $type;
        }

    }
?>