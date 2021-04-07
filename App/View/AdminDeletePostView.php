<?php $this->title = "Modifier le post" ?>

<h1 class="text-center mb-3">Confirmez la suppression</h1>

<div>
    <form method="post" action="index.php?route=adminDeletePost&id=<?= htmlspecialchars($postToDelete->getId());?>" class="p-md-5 p-xs-3">
        <div class="row m-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($postToDelete->getTitle());?>" aria-describedby="postTitle">
        </div>
        <div class="row m-3">
            <label for="excerpt" class="form-label">Introduction</label>
            <textarea class="form-control" id="excerpt" name="excerpt" rows="4" cols="50" aria-describedby="postExcerpt">
                <?= htmlspecialchars($postToDelete->getExcerpt());?>
            </textarea>
        </div>
        <div class="row m-3">
            <label for="content" class="form-label">Contenu</label>
            <textarea class="form-control" id="content" name="content" rows="10" cols="50" aria-describedby="Content">
                <?= htmlspecialchars($postToDelete->getContent());?>
            </textarea>
        </div>
        <button type="submit" name="deletePost" class="btn btn-primary m-3">Confirmer suppression</button>
        <button type="submit" name="cancelDelete" class="btn btn-primary m-3">Annuler</button>
    </form>
</div>