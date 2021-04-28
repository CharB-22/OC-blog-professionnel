<?php

class Post extends AbstractEntity
{
    protected $id;
    protected $title;
    protected $excerpt;
    protected $content;
    protected $dateModification;
    protected $authorId;
    protected $authorName;
    protected $authorLastName;

    public function __construct(array $postData)
    {
        $this->hydrate($postData);
    }



    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getExcerpt()
    {
        return $this->excerpt;
    }

    public function getContent()
    {
        return $this->content;
    }


    public function getDateModification()
    {
        return $this->dateModification;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function getAuthorName()
    {
        return $this->authorName;
    }

    public function getAuthorLastName()
    {
        return $this->authorLastName;
    }

    public function setId($postId)
    {
        $id = (int) $postId;

        if ($id > 0)
        {
            $this->id = $postId;
        }

        else
        {
            throw new Exception ("Un id doit être un nombre entier positif");
        }
    }

    public function setTitle($title)
    {
        // Must be a string and the limit of caracters must not be over 100
        if (is_string($title) && strlen($title) <= 100)
        {
            $this->title = $title;
        } 
        else
        {
            throw new Exception("Ce n'est pas une chaîne de caractère ou il y a trop de caractères");
        }
    }

    public function setExcerpt($excerpt)
    {
        // Must be a string and the limit of caracters must not be over 255
        if (is_string($excerpt) && strlen($excerpt) <= 255)
        {
            $this->excerpt = $excerpt;
        } 
        else
        {
            throw new Exception ("Ce n'est pas une chaîne de caractère ou il y a trop de caractères");
        }
    }

    public function setContent($content)
    {
        // Must be a string
        if (is_string($content))
        {
            $this->content = $content;
        } 
        else
        {
            throw new Exception("Ce n'est pas une chaîne de caractère");
        }
    }

    public function setDateModification($dateModification)
    {
        
        $this->dateModification = $dateModification;
    }

    public function setAuthorId($authorId)
    {
        // Must be an int AND give the valid rights (must be = 1)
        $authorId = (int) $authorId;
        if ($authorId > 0)
        {
            $this->authorId = $authorId;
        } 
        else
        {
            throw new Exception ("Cet id n\'est pas un nombre entier ou ne donne pas les droits nécessaires.");
        }
    }

    public function setAuthorName($authorName)
    {
        // Must be an int AND give the valid rights (must be = 1)
        if (is_string($authorName) && strlen($authorName) < 60)
        {
            $this->authorName = $authorName;
        } 
        else
        {
            throw new Exception ("Ce n\'est pas une chaîne de caractère ou le nom est trop long");
        }
    }

    public function setAuthorLastName($authorLastName)
    {
        // Must be an int AND give the valid rights (must be = 1)
        if (is_string($authorLastName) && strlen($authorLastName) < 60)
        {
            $this->authorLastName = $authorLastName;
        } 
        else
        {
            throw new Exception ("Ce n\'est pas une chaîne de caractère ou le nom est trop long");        }
    }

    public function isValid(&$message)
    {
        
        if (empty($this->getTitle()))
        {
            $message = new UserMessage ("Veuillez renseigner le titre.", "danger");
        }

        else if (empty($this->getExcerpt()))
        {
            $message = new UserMessage("Veuillez écrire une introduction.", "danger");
        }

        else if (empty($this->getContent()))
        {
            $message = new UserMessage("Veuillez écrire le corps de texte.", "danger");
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