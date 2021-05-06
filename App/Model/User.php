<?php

class User extends AbstractEntity
{
    protected $userId;
    protected $lastName;
    protected $name;
    protected $email;
    protected $username;
    protected $password;
    protected $role;
    protected $roleUser;

    const ROLE_ADMIN = 1;
    const ROLE_VISITOR = 2;
    const NO_ROLE = 0;

    public function __construct(array $userData)
    {
        $this->hydrate($userData);
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getRoleUser()
    {
        return $this->roleUser;
    }

    public function setUserId($id)
    {
        $id = (int) $id;

        if ($id > 0)
        {
            $this->userId = $id;
        }

        else
        {
            throw new Exception("Un id doit être un nombre entier positif.");
        }
    }

    public function setLastName($lastName)
    {
        if (is_string($lastName) && strlen($lastName) <= 60)
        {
            $this->lastName = $lastName;
        } 
        else
        {
            throw new Exception ("Ce n'est pas une chaîne de caractère ou il y a trop de caractères.");
        }
    }

    public function setName($name)
    {
        if (is_string($name) && strlen($name) <= 60)
        {
            $this->name = $name;
        } 
        else
        {
            throw new Exception ("Ce n'est pas une chaîne de caractère ou il y a trop de caractères.");
        }
    }

    public function setEmail($email)
    {
        if (is_string($email)) 
        {
            $this->email = $email;
        } 
        else
        {
            throw new Exception("Cela ne respecte pas le format.");
        }
    }

    public function setPassword($password)
    {
        if (is_string($password))
        {
            $this->password = $password;
        } 
        else
        {
            throw new Exception ("Cela ne respecte pas le format.");
        }
    }

    public function setUsername($userName)
    {
        if (is_string($userName) && strlen($userName) <= 60)
        {
            $this->username = $userName;
        } 
        else
        {
            throw new Exception("Ce n'est pas une chaîne de caractère ou il y a trop de caractères.");
        }
    }

    public function setRole($role)
    {
        $role = (int) $role;

        if (in_array($role, [self::ROLE_ADMIN, self::ROLE_VISITOR]))
        {
            $this->role = $role;
        }
    }

    public function setRoleUser($roleUser)
    {
        if (is_string($roleUser)) // add later a regular expression 
        {
            $this->roleUser = $roleUser;
        } 
        else
        {
            throw new Exception("Cela ne respecte pas le format.");
        }
    }

    public function isValid(&$message)
    {
        
        if (empty($this->getLastName()))
        {
            $message = new UserMessage("Veuillez renseigner votre nom de famille.", "danger");
        }

        else if (empty($this->getName()))
        {
            $message = new UserMessage ("Veuillez renseignez votre prénom.", "danger");
        }

        else if (empty($this->getEmail()))
        {
            $message = new UserMessage("Veuillez renseigner votre email.", "danger");
        }

        else if (empty($this->getUsername()))
        {
            $message = new UserMessage("Veuillez créer un nom d'utilisateur.", "danger");
        }
        else if (empty($this->getPassword()))
        {
            $message = new UserMessage("Veuillez créer un mot de passe.", "danger");
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