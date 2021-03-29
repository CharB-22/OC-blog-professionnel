<?php 

class PostManager extends Manager
{
    public function getBlogList()
    {
        $sql = "SELECT post.id, title, excerpt, content, date_modification, users.name, users.last_name FROM post JOIN users ON post.author = users.id";

        return $this->createQuery($sql);
    }

    public function getPost($id)
    {
        $sql = "SELECT title, excerpt, content, date_modification, users.name, users.last_name FROM post JOIN users ON post.author = users.id WHERE post.id = :id";

        return $this->createQuery($sql, array('id' => $id));

        //$post = $data->fetch();
    }
}