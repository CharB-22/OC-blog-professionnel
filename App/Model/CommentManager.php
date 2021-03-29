<?php

class CommentManager extends Manager
{
    public function getCommentsPost($id)
    {
        $sql = "SELECT comment_content, comment_date, users.username
        FROM comments
        JOIN users ON comments.user_id = users.id
        WHERE post_id = :id
        AND comment_validation = 1";

        return $this->createQuery($sql, array("id"=>$id));
    }
}