<?php $this->title = $post->getTitle(); ?>
      <h1 class="mt-5 mb-3">
        <?= htmlspecialchars($post->getTitle());?> <small>by <?= htmlspecialchars($post->getAuthorName());?> <?= htmlspecialchars($post->getAuthorLastName());?></small>
      </h1>

      <div class="row col">
        <div class="col-md-8 col-xs-12">
          <p>Posted <?= htmlspecialchars($post->getDateModification());?></p>
          <hr>
          <div>
            <p class="lead"><?= htmlspecialchars($post->getExcerpt());?></p>
            <p><?= htmlspecialchars($post->getContent());?></p>
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
            foreach ($commentsList as $comment)
            {
          ?>
            <div class="media mb-4">
              <div class="media-body">
                <h5 class="mt-0"><?= htmlspecialchars($comment->getUserName());?><small><?= htmlspecialchars($comment->getCommentDate());?></small></h5>
                <?= htmlspecialchars($comment->getCommentContent());?>
              </div>
            </div>
          <?php
            }
          ?>
        </div>

        <!-- Sidebar -->   
        <div class="col-md-4 col-xs-12 px-3">
          <h2>Ajouts Récents</h2>
          <?php

            foreach ($blogListSidebar as $post)
            {
          ?>
          <div class="card mb-4">
            <div class="card-body">
              <h3 class="card-title"><?= htmlspecialchars($post->getTitle());?></h3>
              <p class="card-text"><?= htmlspecialchars($post->getExcerpt());?></p>
              <a href="index.php?route=post&id=<?= htmlspecialchars($post->getId());?>" class="btn btn-primary">Lire l'article &rarr;</a>
            </div>
          </div>
          
          <?php
            }


