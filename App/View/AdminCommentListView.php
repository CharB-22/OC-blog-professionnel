<?php $this->title = "Gérer les commentaires"; ?>

<div class="d-flex flex-column flex-md-row justify-content-between">
    <h1 class="pt-5 mb-3">Gérer les commentaires</h1>
    <a href="#" class="btn btn-primary m-5">Gérer les utilisateurs</a>
</div>

<!-- Loop through the comments to approve -->
<?php foreach($commentsToManage as $comment)
        {
?>
<div class="card mb-4">
    <div class="card-body">
        <h3 class="card-title"><?= htmlspecialchars($comment->getUserName());?> - <small><?= htmlspecialchars($comment->getCommentDate());?></small></h3>
        <p class="card-text"><?= htmlspecialchars($comment->getCommentContent());?></p>
        <form method="post" action="index.php?route=adminCommentList&commentId=<?= htmlspecialchars($comment->getCommentId());?>" class="d-flex flex-column flex-md-row">
            <button type="submit" name="approveComment" class="btn btn-primary m-3">Accepter</button>
            <button type="submit" name="deleteComment" class="btn btn-primary m-3">Supprimer</button>
        </form>
    </div>
</div>

<?php
}