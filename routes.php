<?php
  function call($core, $action) {
    require_once('cores/' . $core . '_core.php');

    switch($core) {
        case 'promotion':
        $core = new promotion_core();
        break;

         case 'produit':
        $core = new produit_core();
        break;


    }

    $core->{ $action }();
  }
    // we're adding an entry for the new core and its actions
  $cores = array ('promotion' => ['login','acc_admin','page_ajouter','ajouter_promo','afficher_promo','supprimer_promo','page_modifier','modif_promo','verif','page_promo_client'],

'produit' => ['login','acc_admin','page_produit','verif','afficher_produit']
              
);

  if (array_key_exists($core, $cores)) 
     {if (in_array($action, $cores[$core]))  {call($core, $action);} 
     // else{call('categorie', 'accueil');}
     } 
  else {
    call('promotion', 'login');
  }
?>