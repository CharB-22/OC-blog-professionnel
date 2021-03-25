<!doctype html>
<html lang="fr">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Import Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
        <link rel="icon"  type="image/png"  href="public\images\code_icon.png">
        <!-- Customized CSS-->
        <link type="text/css" href="./public/css/style.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="../vendor\twbs\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <!-- FontAwesome library access-->
        <link href="vendor/components/font-awesome/css/fontawesome.css" rel="stylesheet">
        <link href="vendor/components/font-awesome/css/brands.css" rel="stylesheet">
        <link href="vendor/components/font-awesome/css/solid.css" rel="stylesheet">

        <title><?= $title ?></title>
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
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?route=bloglist">Blog</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    </ul>
                </div>
                <div class="navbar-nav d-inline">
                    <a href="https://github.com/CharB-22" target="_blank"  class="iconLink"><i class="fab fa-github fa-2x m-2" style="color:#3C3549"></i></a>
                    <a href="https://www.linkedin.com/in/charlène-bennevault-78636361" target="_blank"  class="iconLink"><i class="fab fa-linkedin fa-2x m-2" style="color:#3C3549"></i></a>
                    <a href="https://twitter.com/Onehummingbird1" target="_blank" class="iconLink"><i class="fab fa-twitter fa-2x m-2" style="color:#3C3549"></i></a>
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
                <div class="row m-0">
                    <div class="col-xs-12 col-md-6 d-flex justify-content-xs-center justify-content-md-end"><a>S'inscrire</a></div>
                    <div class="col-xs-12 col-md-6 d-flex justify-content-xs-center justify-content-md-start"><a>Se connecter</a></div>
                </div>
                <p class="m-0 text-center">Mentions Légales</p>
                <p class="m-0 text-center">Copyright &copy; Your Website 2021</p>
            </div>
        </footer>

        <!-- Bootstrap Bundle with Popper -->
        <script src="../vendor/twbs\bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
    </body>
</html>
