<?php 


$title = "Les Articles Publiés";
ob_start() ?>

<h1 class="pt-5 mb-3">Articles Publiés</h1>

<!-- Blog Line -->
<?php

    while ($postManager = $blogList->fetch())
    {
?>
    <div class="row">
        <div class="card mb-4 col-xs-12 col-md-6">
            <div class="card-body">
                <h2 class="card-title"><?= htmlspecialchars($postManager['title']);?></h2>
                <p class="card-text"><?= htmlspecialchars($postManager['excerpt']);?></p>
                <a href="index.php?route=post&id=<?= htmlspecialchars($postManager['id']);?>" class="btn btn-primary">Lire l'article &rarr;</a>
            </div>
        </div>
    </div>
  <?php 
    }
    $content= ob_get_clean();
    require("Layout.php"); ?>