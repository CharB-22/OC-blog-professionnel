<?php 
require "Post.php";

class PostManager extends Manager
{
    public function getBlogList()
    {
        $postList = [];
        
        $sql = "SELECT id, title, excerpt FROM post";

        $response = $this->createQuery($sql);

        while ($postData = $response->fetch())
        {
            $postList[] = new Post($postData);
        }

        return $postList;
    }

    public function getBlogListSidebar()
    {
        $postList = [];
        
        $sql = "SELECT id, title, excerpt FROM post LIMIT 5";

        $response = $this->createQuery($sql);

        while ($postData = $response->fetch())
        {
            $postList[] = new Post($postData);
        }

        return $postList;
    }

    public function getPost($id)
    {
        $sql = "SELECT post.id as id, title, excerpt, content, dateModification, users.name AS authorName, users.lastName AS authorLastName FROM post JOIN users ON post.authorId = users.id WHERE post.id = :id";

        $response = $this->createQuery($sql, array('id' => $id));

        $postData = $response->fetch();

        return new Post($postData);
    }
}