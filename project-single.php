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
                <img src="<?= $thumbnail ?>" id="<?= $key ?>" class="project-thumbnail" alt="Mockup of the project, websites are displayed on different device sizes and graphic projects are displayed as photos of printed material.">
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
                    <?php if($project['website_link']): ?> <a href="<?= $project['website_link'] ?>" target="_blank" class="icon-link"><i class="fas fa-globe icon-link-icon globe"></i><span>visit the site</span></a><?php endif; ?>
                    <?php if($project['documentation_link']): ?> <a href="<?= $project['documentation_link'] ?>" target="_blank"  class="icon-link"><i class="far fa-sticky-note icon-link-icon"></i><span>view the process</span></a><?php endif; ?>
                    <?php if($project['code_link']): ?> <a href="<?= $project['code_link'] ?>" target="_blank"  class="icon-link"><i class="fab fa-github icon-link-icon"></i><span>read the code</span></a><?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- MODAL -->

<div class="drop-shadow">

    <div class="close-icon"><img src="images/cross.png" alt="close icon"></div>

    <div class="aligner-top"></div>
        <div class="image-modal">
          <div class="chevron"><img src="images/arrow-left.png" class="chevron chevron-left" id="imagePrev" alt="arrow left"></div>
          <div id="imageContainer"></div>
          <div class="chevron"><img src="images/arrow-right.png" class="chevron chevron-right" id="imageNext" alt=" arrow right"></div>
        </div>
    <div class="aligner-bottom"></div>

</div>

<script>
    var thumbnailsArray = <?php echo json_encode($thumbnails); ?>;
    var imagesArray = <?php echo json_encode($images); ?>;
</script>

<?php require 'footer.php'; ?>