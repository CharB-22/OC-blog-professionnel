<!doctype html>
<html lang="fr">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Import Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
        <link rel="shortcut icon"  type="image/png"  href="public\images\code_icon.png">
        <!-- Customized CSS-->
        <link type="text/css" href="Public/css/style.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">        
        <title><?= $title ?></title>
        <script src="vendor\tinymce\tinymce\tinymce.min.js"></script>
        <script type="text/javascript">
        tinymce.init({
            selector: '#editTextArea'
        });
        </script>
    </head>

    <body>
        <header>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid d-flex flex-column">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?route=home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?route=home#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?route=bloglist">Blog</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?route=home#contact">Contact</a>
                    </li>
                    </ul>
                </div>
                <div class="navbar-nav d-inline">
                    <a href="https://github.com/CharB-22" target="_blank" ><img src="./public/images/github-icon.png" alt="Icône Github en noir" class="m-2" /></a>
                    <a href="https://www.linkedin.com/in/charlène-bennevault-78636361" target="_blank"  class="iconLink"><img src="./public/images/linkedin-icon.png" alt="Icône Linkedin en noir" class="m-2"/></a>
                    <a href="https://twitter.com/Onehummingbird1" target="_blank" class="iconLink"><img src="./public/images/twitter-icon.png" alt="Icône Twitter en noir" class="m-2"/></a>
                </div>
                </div>
            </nav>
        </header>

        <!-- Page Content -->
        <main class="my-5 pt-3">
            <div class="container my-5 pt-3">
                <?= $content ?>
            </div>
        </main>


        <footer class="py-5 bg-light">
            <div class="container">

            <?php 
            // Footer changed if you are connected or not
                if (isset($_SESSION["id"]))
                {
            ?>
                <div class="text-center">
                    <p>Vous êtes connecté en tant que <?= htmlspecialchars($_SESSION['name'])?> <?= htmlspecialchars($_SESSION['lastName'])  ?></p>
                    <?php
                        if ($_SESSION['roleId'] == 1)
                        {
                    ?>
                        <a href="index.php?route=adminHome" type="button" class="btn btn-primary">Espace Administration</a>
                    <?php
                    }
                    ?>
                    <a href="index.php?route=disconnect" type="button" class="btn btn-primary">Se déconnecter</a>
                </div>
            <?php
            }
            else
            {
            ?>
            <div class="container-fluid d-flex justify-content-center">
                <a class="btn btn-secondary m-2" href="index.php?route=register" >S'inscrire</a>
                <a class="btn btn-secondary m-2" href="index.php?route=connect">Se connecter</a>
            </div>
            <?php
            }
            ?>
                <p class="m-0 text-center">Mentions Légales</p>
                <p class="m-0 text-center">Copyright &copy; Your Website 2021</p>
            </div>
        </footer>
        
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>
