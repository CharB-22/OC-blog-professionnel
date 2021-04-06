<?php $this->title = "Les Articles Publiés"; ?>

<h1 class="pt-5 mb-3">Articles Publiés</h1>

<!-- Blog Line -->
    <?php 
    foreach ($postList as $post)
    {
    ?>
    <div class="row">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title"><?= htmlspecialchars($post->getTitle());?></h2>
                <p class="card-text"><?= htmlspecialchars($post->getExcerpt());?></p>
                <a href="index.php?route=post&id=<?= htmlspecialchars($post->getId());?>" class="btn btn-primary">Lire l'article &rarr;</a>
            </div>
        </div>
    </div>
  <?php
    }
