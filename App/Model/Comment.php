<?php

class Comment extends AbstractEntity
{
    protected $commentId;
    protected $commentContent;
    protected $commentDate;
    protected $commentValidation;
    protected $postId;
    protected $userId;
    protected $userName;

    public function __construct(array $commentData)
    {
        $this->hydrate($commentData);
    }

    public function getCommentId()
    {
        return $this->id;
    }
    
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    public function getCommentDate()
    {
        return $this->commentDate;
    }

    public function getCommentValidation()
    {
        return $this->commentValidation;
    }

    public function getPostId()
    {
        return $this->postId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setCommentId($id)
    {
        $id = (int) $id;

        if ($id > 0)
        {
            return $this->id = $id;
        }
        else
        {
            trigger_error("Un id doit être un nombre entier positif", E_USER_WARNING);
            return;
        }
    }

    public function setCommentContent($commentContent)
    {
        if (is_string($commentContent))
        {
            return $this->commentContent = $commentContent;
        }
        else
        {
            trigger_error("Il faut une chaîne de caractères", E_USER_WARNING);
            return;
        }
    }

    public function setCommentDate($commentDate)
    {
        if (is_string($commentDate))
        {
            return $this->commentDate = $commentDate;
        }
        else
        {
            trigger_error("Ceci ne respecte pas le format de la date", E_USER_WARNING);
            return;
        }
    }

    public function setCommentValidation($commentValidation)
    {
        $commentValidation = (int) $commentValidation;

        if ($commentValidation >= 0)
        {
            return $this->commentValidation = $commentValidation;
        }
        else
        {
            trigger_error("Ceci ne respecte pas le format souhaité", E_USER_WARNING);
            return;
        }
    }

    public function setPostId($postId)
    {
        $postId = (int) $postId;

        if ($postId > 0)
        {
            return $this->postId = $postId;
        }
        else
        {
            trigger_error("Un id doit être un nombre entier positif", E_USER_WARNING);
            return;
        }
    }

    public function setUserId($userId)
    {
        $userId = (int) $userId;

        if ($userId > 0)
        {
            return $this->userId = $userId;
        }
        else
        {
            trigger_error("Un id doit être un nombre entier positif", E_USER_WARNING);
            return;
        }
    }

    public function setUsername($userName)
    {
        if (is_string($userName))
        {
            return $this->userName = $userName;
        }
        else
        {
            trigger_error("Ceci n\'est pas une chaîne de caractère", E_USER_WARNING);
            return;
        }
    }


}