<?php require 'header.php'; ?>

<?php
  $sql = 'SELECT * FROM `projects`';
  $result = mysqli_query($dbc, $sql);
  if($result){
    $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else{
    die('Error fetching, no results.');
  }
  $table = $_GET['table'];
?>

<div class="main-content">
    <h1>Web/UX <strong>designer</strong> and <strong>developer</strong> in Pōneke (Wellington) Aotearoa.</h1>
    
    
    <?php if($projects): ?>
      <div class="projects">
            <?php foreach ($projects as $project): ?>
                <p>Project</p>
            <?php endforeach; ?>
      </div>
          <?php else: ?>
            <div class="error-message">
              <p>Sorry, no projects could be found.</p>
            </div>
   <?php endif; ?>
    
</div>

<?php require 'footer.php'; ?>