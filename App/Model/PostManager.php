<?php 

class PostManager extends AbstractManager
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

    public function createPost($newPost)
    {
        // Create the entry in the db with the entity information
            
        $sql = "INSERT INTO post(title, excerpt, content, dateModification, authorId) VALUES (:title, :excerpt, :content, NOW(), 1)";
        
        $response = $this->createQuery($sql, array(
            'title' => $newPost->getTitle(),
            'excerpt'=> $newPost->getExcerpt(), 
            'content'=> $newPost->getContent(),
            /*'authorId'=> 1*/)); // Implement dynamic authorId with Authentification
        
    }

    public function updatePost($postUpdated)
    {

        // Update the db with this information
        $sql = "UPDATE post SET title = :title, excerpt = :excerpt, content = :content, dateModification = NOW() WHERE id = :id";

        $response = $this->createQuery($sql, array(
            'id' => $postUpdated->getId(),
            'title' => $postUpdated->getTitle(),
            'excerpt' => $postUpdated->getExcerpt(),
            'content' => $postUpdated->getContent()
        ));

    }

    public function deletePost($id)
    {

        $sql = "DELETE FROM post WHERE id = :id";

        $response = $this->createQuery($sql, array('id' => $id));
    }
}