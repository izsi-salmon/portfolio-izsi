<?php
  $dbc = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_TABLE'));
  if($dbc){
    $dbc->set_charset('utf8');
  } else{
    die('Connect to database failed, please check your environment files and make sure username, password and table names are correct.');
  }
 ?>