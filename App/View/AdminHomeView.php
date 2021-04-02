<?php $this->title="Mon tableau de bord"; ?>

<h1 class="">Tableau de bord</h1>

<div class="row">
    <div class="card col-xs-12 col-md-4 d-flex align-items-center">
        <img src="./public/images/admin_posts.jpg" class="img-thumbnail my-3">
        <a href="index.php?route=adminPostList" class="btn btn-primary my-3">Voir tous les articles</a>
    </div>
    <div class="card col-xs-12 col-md-4 d-flex align-items-center">
        <img src="./public/images/admin_comments.jpg" class="img-thumbnail my-3">
        <a href="index.php?route=adminCommentList" class="btn btn-primary my-3">Voir tous les commentaires</a>
    </div>
    <div class="card col-xs-12 col-md-4 d-flex align-items-center">
        <img src="./public/images/admin_users.jpg" class="img-thumbnail my-3">
        <a href="UserList.php?p=user" class="btn btn-primary my-3">Gérer les utilisateurs</a>
    </div>
</div>