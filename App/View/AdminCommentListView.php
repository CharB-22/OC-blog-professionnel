<?php $this->title = "Commentaires à approuver"; ?>

<div class="d-flex flex-column flex-md-row justify-content-between">
    <h1 class="pt-5 mb-3">Commentaires à valider</h1>
    <a href="#" class="btn btn-primary m-5">Gérer les utilisateurs</a>
</div>

<!-- Loop through the comments to approve -->
<?php foreach($commentsToApprove as $comment)
        {
?>
<div class="card mb-4">
    <div class="card-body">
        <h3 class="card-title"><?= htmlspecialchars($comment->getUserName());?> - <small><?= htmlspecialchars($comment->getCommentDate());?></small></h3>
        <p class="card-text"><?= htmlspecialchars($comment->getCommentContent());?></p>
        <div class="d-flex flex-column flex-md-row">
            <a href="#" class="btn btn-primary m-3">Accepter</a>
            <a href="#" class="btn btn-primary m-3">Supprimer</a>
        </div>
    </div>
</div>

<?php
}