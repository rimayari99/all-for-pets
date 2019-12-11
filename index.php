<?php
session_start();

  require_once('connection.php');

  if (isset($_GET['core']) && isset($_GET['action'])) {
    $core =  $_GET['core'];
    $action= $_GET['action'];
  } else {
    $core       = 'user'; 
    $action     = 'login'; //teb3a view
  }

  require_once('routes.php');
?>