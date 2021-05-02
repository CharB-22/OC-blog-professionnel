<?php 

$this->title = "Se connecter"; 

if (!empty($message))
{
    echo "<div class='alert alert-". $message->getMessageFormat(). " alert-dismissible fade show' role='alert'>"
     . $message->getMessageContent() .
          " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
         </div>";
}

?>

<h1 class="text-center mb-3">Se Connecter</h1>
<div class="d-flex align-items-center justify-content-center">
    <form method="post" action="index.php?route=connect" class="p-md-5 p-xs-3">
        <div class="row m-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="userUsername">
        </div>
        <div class="row m-3">
            <label for="userPassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="userPassword" name="userPassword" aria-describedby="userPassword">
        </div>
        <div class="text-center">
            <button type="submit" name="connect" class="btn btn-primary m-3">Se Connecter</button>
        </div>
    </form>
</div>