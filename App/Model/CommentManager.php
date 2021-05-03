<?php

class CommentManager extends AbstractManager
{
    public function getCommentsPost($postId)
    {
        $commentsList = [];
        
        $sql = "SELECT commentContent, DATE_FORMAT(commentDate,'%d/%m/%Y à %Hh%i') AS commentDate, users.username
        FROM comments
        JOIN users ON comments.userId = users.userId
        WHERE postId = :id
        AND commentValidation = 1";

        $response = $this->createQuery($sql, array("id"=>$postId));

        while ($commentData = $response->fetch())
        {
            $commentsList[] = new Comment($commentData);
        }

        return $commentsList;
    }

    public function createComment($newComment)
    {
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

        $sql = "SELECT comments.commentId, commentContent, DATE_FORMAT(commentDate,'%d/%m/%Y à %Hh%i') AS commentDate, users.username
        FROM comments
        JOIN users ON comments.userId = users.userId
        WHERE commentValidation = 0";

        $response = $this->createQuery($sql);

        while ($commentData = $response->fetch())
        {
            $commentsToManage[] = new Comment($commentData);
        }

        return $commentsToManage;
    }

    public function approveComment($commentApproved)
    {

        $sql = "UPDATE comments SET commentValidation = :commentValidation WHERE commentId = :commentId";

        $response = $this->createQuery($sql, array(
            'commentValidation' => $commentApproved->getCommentValidation(),
            'commentId' => $commentApproved->getCommentId()
        ));

    }

    public function deleteComment($commentId)
    {
        $sql = "DELETE FROM comments WHERE commentId = :commentId";

        $this->createQuery($sql, array(
            'commentId' => $commentId
        ));
    }

    public function deletePostComments($postId)
    {
        $sql = "DELETE FROM comments WHERE postId = :postId";

        $this->createQuery($sql, array(
            'postId' => $postId
        ));
    }

    public function deleteUserComments($userId)
    {
        $sql = "DELETE FROM comments WHERE userId = :userId";

        $this->createQuery($sql, array(
            'userId' => $userId
        ));
    }
}