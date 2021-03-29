<?php

class Post
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

    public function hydrate(array $postData)
    {
        foreach ($postData as $key => $value)
        {
          $method = 'set'.ucfirst($key);
              
          if (method_exists($this, $method))
          {
            $this->$method($value);
          }
        }    
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

    public function setId($id)
    {
        // Must be a number AND be > 100
        if (is_int($id) && $id > 0)
        {
            $this->id = $id;
        }

        else
        {
            trigger_error("Un id doit être un nombre entier positif", E_USER_WARNING);
            return;
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
            trigger_error("Ce n\'est pas une chaîne de caractère ou il y a trop de caractères", E_USER_WARNING);
            return;
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
            trigger_error("Ce n\'est pas une chaîne de caractère ou il y a trop de caractères", E_USER_WARNING);
            return;
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
            trigger_error("Ce n\'est pas une chaîne de caractère", E_USER_WARNING);
            return;
        }
    }

    public function setDateModification($dateModification)
    {
        // Check if the format is correct with a regex
        $this->dateModification = $dateModification;
    }

    public function setAuthorId($authorId)
    {
        // Must be an int AND give the valid rights (must be = 1)
        if (is_int($authorId) && $authorId === 1)
        {
            $this->authorId = $authorId;
        } 
        else
        {
            trigger_error("Cet id n\'est pas un nombre entier ou ne donne pas les droits nécessaires.", E_USER_WARNING);
            return;
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
            trigger_error("Ce n\'est pas une chaîne de caractère ou le nom est trop long", E_USER_WARNING);
            return;
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
            trigger_error("Ce n\'est pas une chaîne de caractère ou le nom est trop long", E_USER_WARNING);
            return;
        }
    }

}