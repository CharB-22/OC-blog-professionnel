<?php

class CommentManager extends AbstractManager
{
    public function getCommentsPost($id)
    {
        $commentsList = [];
        
        $sql = "SELECT commentContent, commentDate, users.username
        FROM comments
        JOIN users ON comments.userId = users.id
        WHERE postId = :id
        AND commentValidation = 1";

        $response = $this->createQuery($sql, array("id"=>$id));

        while ($commentData = $response->fetch())
        {
            $commentsList[] = new Comment($commentData);
        }

        return $commentsList;
    }

    public function createComment($postId)
    {
        //Create a new Comment entity
        $newComment = new Comment([
            'postId' => $postId,
            'commentContent' => $_POST["content"],
            'commentValidation' => 0,
            'userId' => 1 // to be dynamically determined with authentification
        ]);

        // Update this database with this new comment
        $sql = "INSERT INTO comments (commentContent, commentDate, commentValidation, postId, userId)
        VALUES (:commentContent, NOW(), :commentValidation, :postId, :userId)";

        $response = $this->createQuery($sql, array(
            'postId' => $newComment->getPostId(),
            'commentContent' => $newComment->getCommentContent(),
            'commentValidation' => $newComment->getCommentValidation(),
            'userId' => $newComment->getUserId()
        ));
    }

    public function getCommentsToManage()
    {
        $commentsToManage = [];

        $sql = "SELECT comments.commentId, commentContent, commentDate, users.username
        FROM comments
        JOIN users ON comments.userId = users.id
        WHERE commentValidation = 0";

        $response = $this->createQuery($sql);

        while ($commentData = $response->fetch())
        {
            $commentsToManage[] = new Comment($commentData);
        }

        return $commentsToManage;
    }

    public function approveComment($commentId)
    {

        $sql = "UPDATE comments SET commentValidation = :commentValidation WHERE commentId = :commentId";

        $response = $this->createQuery($sql, array(
            'commentValidation' => 1,
            'commentId' => $commentId
        ));

    }

    public function deleteComment($commentId)
    {
        $sql = "DELETE FROM comments WHERE commentId = :commentId";

        $response = $this->createQuery($sql, array(
            'commentId' => $commentId
        ));
    }
}