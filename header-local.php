<?php

    require('database/connection-local.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="images/logo-izsi-icon-b.png">
  <title>Izsi Salmon</title>
</head>
<body>

<?php 
    
    $page = basename($_SERVER['PHP_SELF']);
    
?>

<?php if($page == 'about.php'): ?>

    <div class="navigation about-navigation">
        <a class="logo" href="index.php"><img src="images/logo-izsi-small.png" alt="Simple text logo: izsi"></a>
        <a href="index.php">Work</a>
    </div>
    
<?php elseif($page == 'project-single.php'): ?>

    <div class="navigation navigation-no-sticky">
        <a class="logo" href="index.php"><img src="images/logo-izsi-small.png" alt="Simple text logo: izsi"></a>
        <a href="about.php">About</a>
    </div>

<?php else: ?>
   
    <div class="navigation">
        <a class="logo" href="index.php"><img src="images/logo-izsi-small.png" alt="Simple text logo: izsi"></a>
        <a href="about.php">About</a>
    </div>

<?php endif; ?>