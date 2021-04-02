<?php $this->title = "Créer un article"; ?>

<h1 class="text-center mb-3">Créer un nouvel article</h1>

<div>
    <form class="p-md-5 p-xs-3">
        <div class="row m-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="postTitle">
        </div>
        <div class="row m-3">
            <label for="excerpt" class="form-label">Introduction</label>
            <textarea class="form-control" id="excerpt" name="excerpt" aria-describedby="postExcerpt"></textarea>
        </div>
        <div class="row m-3">
            <label for="content" class="form-label">Contenu</label>
            <textarea class="form-control" id="content" name="content" aria-describedby="Content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary m-3">Créer</button>
    </form>
</div>