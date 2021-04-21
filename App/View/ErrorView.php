<?php 

$this->title = "Déconnexion";

?>

<div id="about" class="container my-5">
        <div class="row text-center">
            <h2>Oops !</h2>
            <div class="container my-5">
                <?php
                    echo $errorMessage->getMessage();
                ?>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-evenly py-4">
            <a href="index.php?route=home" type="button" class="btn btn-primary">Retourner à la page principal</a>
        </div>
    </div>
