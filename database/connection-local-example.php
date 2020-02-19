<?php
    $dbc = mysqli_connect('host', 'user', 'password', 'table');
  if($dbc){
    $dbc->set_charset('utf8');
  } else{
    die('Connect to database failed, please check your environment files and make sure username, password and table names are coorect.');
  }
 ?>