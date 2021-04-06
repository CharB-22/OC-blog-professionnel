<?php $this->title="Tous les articles"; ?>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
    <h1>Articles Publiés</h1>
    <a href="index.php?route=adminCreatePost" class="btn btn-primary m-5">Créer un nouvel article</a>
</div>

<?php foreach ($postList as $post)
{
?>
<!-- Post Line -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title"><?= htmlspecialchars($post->getTitle());?></h2>
            <p class="card-text"><?= htmlspecialchars($post->getExcerpt());?></p>
            <div class="d-flex flex-column flex-md-row">
                <!-- To update with the correct route-->
                <a href="index.php?route=adminUpdatePost&id=<?= htmlspecialchars($post->getId());?>" class="btn btn-primary m-3">Modifier l'article</a>
                <a href="index.php?route=adminDeletePost&id=<?= htmlspecialchars($post->getId());?>" class="btn btn-primary m-3">Supprimer l'article</a>
            </div>
        </div>
    </div>
<?php
}
