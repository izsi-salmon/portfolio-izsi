<?php require 'header.php'; ?>

<?php
    $sql = 'SELECT * FROM `projects`';
    $result = mysqli_query($dbc, $sql);
    if($result){
        $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else{
        die('Error fetching, no results.');
    }
//    $table = $_GET['table'];
    
    
?>

<div class="main-content">
    <h1>Web/UX <strong>designer</strong> and <strong>developer</strong> in Pōneke (Wellington) Aotearoa.</h1>
    
    
    <?php if($projects): ?>
      <div class="projects">
            <?php foreach ($projects as $project): ?>
                <div class="project-block">
                    <div class="project-img-container">
                        <img src="images/<?=$project['image_directory']?>/<?=$project['featured_image']?>" alt="project displayed on mock up">
                    </div>
                    <div class="project-text">
                        <a href="#" class="project-title"><h2><?= $project['title']; ?></h2></a>
                        <a href="#" class="project-title invisible"><h2>invisible</h2></a>
                        <div class="project-text-details">
                            <div class="date-container"><div class="date-hr"></div><span class="date"><?=$project['year']?></span></div>
                            <span class="project-type"><?=$project['project_type']?></span>
                            <p><?=$project['summary']?></p>
                            <a href="#" class="view-more-link view-project-container"><i class="fas fa-ellipsis-h project-icon"></i><span>view project</span></a>
                            <?php // if statement ?>
                                <a href="#" class="view-more-link view-site-container"><i class="fas fa-globe globe"></i><span>view site</span></a>
                            <?php //endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
      </div>
          <?php else: ?>
            <div class="error-message">
              <p>Sorry, no projects could be found.</p>
            </div>
   <?php endif; ?>
    
</div>

<?php require 'footer.php'; ?>