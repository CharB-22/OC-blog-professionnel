<?php

class CommentManager extends Manager
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

    public function getCommentsToApprove()
    {
        $commentsToApprove = [];

        $sql = "SELECT commentContent, commentDate, users.username
        FROM comments
        JOIN users ON comments.userId = users.id
        WHERE commentValidation = 0";

        $response = $this->createQuery($sql);

        while ($commentData = $response->fetch())
        {
            $commentsToApprove[] = new Comment($commentData);
        }

        return $commentsToApprove;
    }
}