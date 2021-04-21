<?php $this->title = "Créer un article"; ?>

<h1 class="text-center mb-3">Créer un nouvel article</h1>
<?php 
    if (!empty($message))
    {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                $message
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
             </div>";
    }
?>
<div>
    <form method="post" action="index.php?route=adminCreatePost" class="p-md-5 p-xs-3">
        <div class="row m-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $newPost !== null? htmlspecialchars($newPost->getTitle()) : null ?>" aria-describedby="postTitle">
        </div>
        <div class="row m-3">
            <label for="excerpt" class="form-label">Introduction</label>
            <textarea class="form-control" id="excerpt" name="excerpt" aria-describedby="postExcerpt"><?= $newPost !== null? htmlspecialchars($newPost->getExcerpt()) : null ?></textarea>
        </div>
        <div class="row m-3">
            <label for="editTextArea" class="form-label">Contenu</label>
            <textarea class="form-control" id="editTextArea" name="content" aria-describedby="Content"><?= $newPost !== null? htmlspecialchars($newPost->getContent()) : null ?></textarea>
        </div>
        <button type="submit" name="createPost" class="btn btn-primary m-3">Créer</button>
        <a href="index.php?route=adminPostList" type="button" class="btn btn-primary">Retour à la liste de posts</a>
    </form>
</div>