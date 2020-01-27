<?php require 'header.php'; ?>

<?php
    $sql = 'SELECT * FROM `projects`';
    $result = mysqli_query($dbc, $sql);
    if($result){
        $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else{
        die('Error fetching, no results.');
    }
    
?>

<div class="main-content">
   
    <h1>Web/UX <strong>designer</strong> and <strong>developer</strong> in Pōneke (Wellington) Aotearoa.</h1>
    
    <?php if($projects): ?>
      <div class="projects">
            <?php foreach ($projects as $project): ?>
                <div class="project-block">
                    <div class="project-img-container">
                        <a href="project-single.php?project=<?= $project['id'] ?>"><img src="images/<?=$project['image_directory']?>/<?=$project['featured_image']?>" alt="project displayed on mock up"></a>
                    </div>
                    <div class="project-text">
                        <div><a href="project-single.php?project=<?= $project['id'] ?>" class="project-title" id="projectTitle"><h2><?= $project['title']; ?></h2></a></div>
                        <div class="project-text-details project-text-details-hidden">
                            <div class="date-container"><div class="date-hr"></div><span class="date"><?=$project['year']?></span></div>
                            <span class="project-type"><?=$project['project_type']?></span>
                            <p><?=$project['summary']?></p>
                            <div><a href="project-single.php?project=<?= $project['id'] ?>" class="icon-link view-project-container"><i class="fas fa-ellipsis-h icon-link-icon project-icon"></i><span>view project</span></a></div>
                            <?php if($project['website_link']): ?>
                                <div><a href="<?= $project['website_link'] ?>" target="_blank" class="icon-link view-site-container"><i class="fas fa-globe icon-link-icon globe"></i><span>visit site</span></a></div>
                            <?php endif; ?>
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

<div class="scroll-message" id="scrollMessage">
    <p>more projects this way</p><i class="fas fa-long-arrow-alt-down"></i>
</div>

<?php require 'footer.php'; ?>