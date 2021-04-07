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

    public function createPost()
    {
        // Create a Post object with the information from the form
        $newPost = new Post([
                'title'=> $_POST['title'],
                'excerpt' => $_POST['excerpt'],
                'content' => $_POST['content']
            ]);

        // Create the entry in the db with the entity information
            
        $sql = "INSERT INTO post(title, excerpt, content, dateModification, authorId) VALUES (:title, :excerpt, :content, NOW(), 1)";
        
        $response = $this->createQuery($sql, array(
            'title' => $newPost->getTitle(),
            'excerpt'=> $newPost->getExcerpt(), 
            'content'=> $newPost->getContent(),
            /*'authorId'=> 1*/)); // Implement dynamic authorId with Authentification
        

        return $message = 'Le post a bien été créé';
        
    }

    public function updatePost($id)
    {
        // Create the object with the new information
        $postUpdated = new Post([
            'id' => $id,
            'title'=> $_POST['title'],
            'excerpt' => $_POST['excerpt'],
            'content' => $_POST['content']
        ]);

        // Update the db with this information
        $sql = "UPDATE post SET title = :title, excerpt = :excerpt, content = :content, dateModification = NOW() WHERE id = :id";

        $response = $this->createQuery($sql, array(
            'id' => $postUpdated->getId(),
            'title' => $postUpdated->getTitle(),
            'excerpt' => $postUpdated->getExcerpt(),
            'content' => $postUpdated->getContent()
        ));

        return $message = "L'article a bien été modifié";

    }

    public function deletePost($id)
    {
        $postToDelete = new Post([
            'id' => $id
        ]);

        $sql = "DELETE FROM post WHERE id = :id";

        $response = $this->createQuery($sql, array('id' => $postToDelete->getId()));
    }
}