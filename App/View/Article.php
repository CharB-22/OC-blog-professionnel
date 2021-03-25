<?php 

require "C:\MAMP\htdocs\blog-professionnel\App\Model\Database.php";
require "C:\MAMP\htdocs\blog-professionnel\App\Model\PostManager.php";
require "C:\MAMP\htdocs\blog-professionnel\App\Model\CommentManager.php";

$post = new PostManager();
$data = $post->getPost($_GET['id']);
$post = $data->fetch();

$title = $post['title'];
ob_start() 

?>
      <h1 class="mt-5 mb-3">
        <?= htmlspecialchars($post['title']);?> <small>by <?= htmlspecialchars($post['last_name']);?></small>
      </h1>

      <div class="row col">
        <div class="col-md-8 col-xs-12">
          <p>Posted <?= htmlspecialchars($post['date_modification']);?></p>
          <hr>
          <div>
            <p class="lead"><?= htmlspecialchars($post['excerpt']);?></p>
            <p><?= htmlspecialchars($post['content']);?></p>
          </div>
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
              </form>
            </div>
          </div>
          <?php
            $comments = new CommentManager;
            $data = $comments->getCommentsPost($_GET['id']);

            while ($comments = $data->fetch())
            {
          ?>
          <div class="media mb-4">
            <div class="media-body">
              <h5 class="mt-0"><?= htmlspecialchars($comments['username']);?><small></small><?= htmlspecialchars($comments['comment_date']);?></h5>
              <?= htmlspecialchars($comments['comment_content']);?>
            </div>
          </div>

          <?php
            }

            ?>
        </div>


<?php 
    $content= ob_get_clean();
    require("Layout.php"); 
?>

