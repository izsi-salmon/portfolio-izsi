<?php
    $dbc = mysqli_connect('localhost', 'root', '', 'portfolio-izsi');
//  $dbc = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_TABLE'));
//    var_dump(getenv('PROJECT_URL'));
  if($dbc){
    $dbc->set_charset('utf8');
  } else{
    die('Connect to database failed, please check your environment files and make sure username, password and table names are coorect.');
  }
 ?>