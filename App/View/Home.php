<?php
require "C:\MAMP\htdocs\blog-professionnel\App\Model\Manager.php";
require "C:\MAMP\htdocs\blog-professionnel\App\Model\PostManager.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
    <div>
        <h1>Mon blog</h1>
        <p>En construction</p>

        <?php
            $post = new PostManager();
            $data = $post->getBlogList();

            // Display all articles

            while ($post = $data->fetch())
            {
                ?>
                <div>
                    <h2><?= htmlspecialchars($post->title);?></h2>
                    <p><?= htmlspecialchars($post->author);?></p>
                    <p><?= htmlspecialchars($post->excerpt);?></p>
                    <p><?= htmlspecialchars($post->content);?></p>
                    <p>Créé le : <?= htmlspecialchars($post->date_modification);?></p>
                </div>
                <br>
        <?php
            }

            $data->closeCursor();
        ?>
    </div>

</body>
</html>