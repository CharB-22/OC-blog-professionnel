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
        return $this->commentId;
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

    public function setCommentId($commentId)
    {
        $commentId = (int) $commentId;

        if ($commentId > 0)
        {
            return $this->commentId = $commentId;
        }
        else
        {
            throw new Exception("Un id doit être un nombre entier positif");
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
            throw new Exception ("Il faut une chaîne de caractères");
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
            throw new Exception("Ceci ne respecte pas le format de la date");
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
            throw new Exception("Ceci ne respecte pas le format souhaité");
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
            throw new Exception ("Un id doit être un nombre entier positif");
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
            throw new Exception ("Un id doit être un nombre entier positif");
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
            throw new Exception("Ceci n'est pas une chaîne de caractère");
        }
    }

    public function isValid(&$message)
    {
        
        if (empty($this->getCommentContent()))
        {
            $message = new UserMessage("Veuillez écrire un message.", "danger");
        }

        if (empty($message))
        {
            return true;
        }
        else
        {
            return false;
        }

    }


}