<?php 

class PostManager extends AbstractManager
{
    public function getBlogList()
    {
        $postList = [];
        
        $sql = "SELECT id, title, excerpt, DATE_FORMAT(dateModification, '%d/%m/%Y à %Hh%i') AS dateModification FROM post ORDER BY dateModification DESC";

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

    public function getPost($postId)
    {
        $sql = "SELECT post.id as id, title, excerpt, content, DATE_FORMAT(dateModification, '%d/%m/%Y à %Hh%i') AS dateModification, users.name AS authorName, users.lastName AS authorLastName FROM post JOIN users ON post.authorId = users.userId WHERE post.id = :id";

        $response = $this->createQuery($sql, array('id' => $postId));

        $postData = $response->fetch();

        return new Post($postData);
    }

    public function createPost($newPost)
    {
        // Create the entry in the db with the entity information
            
        $sql = "INSERT INTO post(title, excerpt, content, dateModification, authorId) VALUES (:title, :excerpt, :content, NOW(), :authorId)";
        
        $this->createQuery($sql, array(
            'title' => $newPost->getTitle(),
            'excerpt'=> $newPost->getExcerpt(), 
            'content'=> $newPost->getContent(),
            'authorId'=> $newPost->getAuthorId())); 
    }

    public function updatePost($postUpdated)
    {

        // Update the db with this information
        $sql = "UPDATE post SET title = :title, excerpt = :excerpt, content = :content, dateModification = NOW(), authorId = :authorId WHERE id = :id";

        $this->createQuery($sql, array(
            'id' => $postUpdated->getId(),
            'title' => $postUpdated->getTitle(),
            'excerpt' => $postUpdated->getExcerpt(),
            'content' => $postUpdated->getContent(),
            'authorId' => $postUpdated->getAuthorId()
        ));

    }

    public function deletePost($postId)
    {

        $sql = "DELETE FROM post WHERE id = :id";

        $this->createQuery($sql, array('id' => $postId));
    }

    public function deleteUserPost($authorId)
    {   
        $sql = "DELETE FROM post WHERE authorId = :authorId";

        $this->createQuery($sql, array('authorId' => $authorId));
    }
}