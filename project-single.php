<?php require 'header.php'; ?>

<?php
    $id = $_GET['project'];

    $sql = 'SELECT * FROM `projects` WHERE ID = '.$id;
    $result = mysqli_query($dbc, $sql);
    if($result){
        $project = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
    } else{
        die('Error fetching, no results.');
    }
?>

<div class="project-main-content">
    <div class="images">
        <?php 
            $thumbnails = glob('images/'. $project['image_directory'] . '/thumbnails/*.jpg');
            $images = glob('images/'. $project['image_directory'] . '/*.jpg');
        ?>
        <?php foreach ($thumbnails as $key => $thumbnail):?>
            <div class="img-container">
                <img src="<?= $thumbnail ?>" alt="Mockup of the project, websites are displayed on different device sizes and graphic projects are displayed as photos of printed material.">
            </div>
        <?php endforeach; ?>
    </div>
    <div class="text">
        <div class="text-wrapper">
            <h1><?= $project['title'] ?></h1>
            <div class="date-container">
                <div class="date"><?= $project['year'] ?></div><div class="date-line"></div>
            </div>
            <div class="project-type"><?= $project['project_type'] ?></div>
            <div class="description">
                <?= $project['description'] ?>
            </div>
            <?php if($project['website_link'] || $project['documentation_link'] || $project['code_link']): ?>
                <div class="links">
                    <?php if($project['website_link']): ?> <a href="<?= $project['website_link'] ?>" class="icon-link"><i class="fas fa-globe globe"></i><span>visit the site</span></a><?php endif; ?>
                    <?php if($project['documentation_link']): ?> <a href="<?= $project['documentation_link'] ?>" class="icon-link"><i class="far fa-sticky-note"></i><span>view the process</span></a><?php endif; ?>
                    <?php if($project['code_link']): ?> <a href="<?= $project['code_link'] ?>" class="icon-link"><i class="fab fa-github"></i><span>read the code</span></a><?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>