<?php 
require "Post.php";

class PostManager extends Manager
{
    public function getBlogList()
    {
        $sql = "SELECT post.id AS id, title, excerpt, content, dateModification, username FROM post JOIN users ON post.authorId = users.id";

        return $this->createQuery($sql);
    }

    public function getPost($id)
    {
        $sql = "SELECT title, excerpt, content, dateModification, users.name AS authorName, users.lastName AS authorLastName FROM post JOIN users ON post.authorId = users.id WHERE post.id = :id";

        $data = $this->createQuery($sql, array('id' => $id));

        $postData = $data->fetch();

        return new Post($postData);
    }
}