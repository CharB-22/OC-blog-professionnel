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
            trigger_error("Un id doit être un nombre entier positif", E_USER_WARNING);
            return;
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
            trigger_error("Ce n\'est pas une chaîne de caractère ou il y a trop de caractères", E_USER_WARNING);
            return;
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
            trigger_error("Ce n\'est pas une chaîne de caractère ou il y a trop de caractères", E_USER_WARNING);
            return;
        }
    }

    public function setEmail($email)
    {
        if (is_string($email)) // add later a regular expression 
        {
            $this->email = $email;
        } 
        else
        {
            trigger_error("Cela ne respecte pas le format", E_USER_WARNING);
            return;
        }
    }

    public function setPassword($password)
    {
        if (is_string($password)) // add later a regular expression 
        {
            $this->password = $password;
        } 
        else
        {
            trigger_error("Cela ne respecte pas le format", E_USER_WARNING);
            return;
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
            trigger_error("Ce n\'est pas une chaîne de caractère ou il y a trop de caractères", E_USER_WARNING);
            return;
        }
    }

    public function setRole($role)
    {
        $role = (int) $role;

        if ($role == 1 OR $role == 2)
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
            trigger_error("Cela ne respecte pas le format", E_USER_WARNING);
            return;
        }
    }

    public function isValid(&$message)
    {
        
        if (empty($this->getLastName()))
        {
            $message = "Veuillez renseigner votre nom de famille.";
        }

        else if (empty($this->getName()))
        {
            $message = "Veuillez renseignez votre prénom.";
        }

        else if (empty($this->getEmail()))
        {
            $message = "Veuillez renseigner votre email.";
        }

        else if (empty($this->getUsername()))
        {
            $message = "Veuillez créer un nom d'utilisateur.";
        }
        else if (empty($this->getPassword()))
        {
            $message = "Veuillez créer un mot de passe.";
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