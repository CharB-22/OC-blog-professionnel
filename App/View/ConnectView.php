<?php $this->title = "Se connecter"; ?>

<h1 class="text-center mb-3">Se Connecter</h1>
<div class="d-flex align-items-center justify-content-center">
    <form class="p-md-5 p-xs-3">
        <div class="row m-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="userUsername">
        </div>
        <div class="row m-3">
            <label for="userPassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="userPassword" name="userPassword" aria-describedby="userPassword">
        </div>
        <button type="submit" class="btn btn-primary m-3"><a href="Admin.php?p=admin">Se Connecter</a></button>
    </form>
</div>