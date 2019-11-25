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
        
    </div>
    <di class="text">
        <h2><?= $project['title'] ?></h2>
        <div class="date"><?= $project['year'] ?></div>
        <div class="project-type"><?= $project['project_type'] ?></div>
        <div class="description">
            <?= $project['description'] ?>
        </div>
        <? if($project['website_link'] || $project['documentation_link'] || $project['code_link']): ?>
            <div class="links">
                <?if($project['website_link']): ?> <a href="<?= $project['website_link'] ?>"></a> visit website <? endif; ?>
                <?if($project['documentation_link']): ?> <a href="<?= $project['documentation_link'] ?>"></a> view the process <? endif; ?>
                <?if($project['code_link']): ?> <a href="<?= $project['code_link'] ?>"></a> read the code <? endif; ?>
            </div>
        <? endif; ?>
    </di>
</div>

<?php require 'footer.php'; ?>