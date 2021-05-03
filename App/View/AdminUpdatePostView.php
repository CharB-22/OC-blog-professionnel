<?php $this->title = "Modifier le post" ?>

<h1 class="text-center mb-3">Modifier un article</h1>

<div>
<?php 
    if (!empty($message))
    {
        echo "<div class='alert alert-". $message->getMessageFormat(). " alert-dismissible fade show' role='alert'>"
        . $message->getMessageContent() .
             " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
?>
    <form method="post" action="index.php?route=adminUpdatePost&id=<?= htmlspecialchars($postToUpdate->getId());?>" class="p-md-5 p-xs-3">
        <div class="row m-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($postToUpdate->getTitle());?>" aria-describedby="postTitle">
        </div>
        <div class="row m-3">
            <label for="title" class="form-label">Modifié par</label>
            <input type="text" class="form-control" id="title" name="author" value="<?= htmlspecialchars($postToUpdate->getAuthorName());?> <?= htmlspecialchars($postToUpdate->getAuthorLastName());?>" aria-describedby="postTitle">
        </div>
        <div class="row m-3">
            <label for="excerpt" class="form-label">Introduction</label>
            <textarea class="form-control" id="excerpt" name="excerpt" rows="4" cols="50" aria-describedby="postExcerpt"><?= htmlspecialchars($postToUpdate->getExcerpt());?></textarea>
        </div>
        <div class="row m-3">
            <label for="editTextArea" class="form-label">Contenu</label>
            <textarea class="form-control" id="editTextArea" name="content" rows="10" cols="50" aria-describedby="Content"><?= htmlspecialchars($postToUpdate->getContent());?></textarea>
        </div>
        <div class="text-center">
            <button type="submit" name="updatePost" class="btn btn-primary m-3">Modifier</button>
            <a href="index.php?route=adminPostList" type="button" class="btn btn-secondary">Retour à la liste de posts</a>
        </div>
    </form>
</div>