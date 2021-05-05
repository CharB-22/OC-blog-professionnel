<?php 
    $this->title = "S'inscrire"; 

    if (!empty($message))
    {
        echo "<div class='alert alert-". htmlspecialchars($message->getMessageFormat()). " alert-dismissible fade show' role='alert'>"
         . htmlspecialchars($message->getMessageContent()) .
              " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
             </div>";
    }
?>

<h1 class="text-center mb-3">S'inscrire</h1>
<div class="d-flex align-items-center justify-content-center">
    <form method="post" action="index.php?route=register" class="p-md-5 p-xs-3" autocomplete="off">
        <div class="row m-3">
            <label for="name" class="form-label">Prénom</label>
            <input autocomplete="false" type="text" class="form-control" id="name" name="name" value="<?= $userInformation !== null? htmlspecialchars($userInformation->getName()) : null ?>" aria-describedby="name">
        </div>
        <div class="row m-3">
            <label for="lastname" class="form-label">Nom</label>
            <input autocomplete="false" type="text" class="form-control" id="lastname" name="lastName" value="<?= $userInformation !== null? htmlspecialchars($userInformation->getLastName()) : null ?>"aria-describedby="userLastName">
        </div>
        <div class="row m-3">
            <label for="userEmail" class="form-label">Email address</label>
            <input autocomplete="off" type="email" class="form-control" id="userEmail" name="userEmail" value="<?= $userInformation !== null? htmlspecialchars($userInformation->getEmail()) : null ?>" aria-describedby="userEmail">
        </div>
        <div class="row m-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input autocomplete="false" type="text" class="form-control" id="username" name="username" value="<?= $userInformation !== null? htmlspecialchars($userInformation->getUsername()) : null ?>" aria-describedby="userUsername">
        </div>
        <div class="row m-3">
            <label for="userPassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="userPassword" name="userPassword" aria-describedby="userPassword">
        </div>
        <div class="text-center">
            <button type="submit" name="createUser" class="btn btn-primary m-3">S'inscrire</button>
        </div>
    </form>
</div>

