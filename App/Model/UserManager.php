<?php

class UserManager extends AbstractManager
{
    public function getUserList()
    {
        $userList = [];

        $sql = "SELECT userId, lastName, name, username, email, password, role.roleUser FROM users JOIN role ON users.roleId = role.roleId";

        $response = $this->createQuery($sql);

        while ($userData = $response->fetch())
        {
            $userList[] = new User($userData);
        }

        return $userList;

    }

    public function createUser($newUser)
    {
        $sql = "INSERT INTO users (lastName, name, email, username, password, roleId)
        VALUES (:lastName, :name, :email, :username, :password, :role)";

        $response = $this->createQuery($sql, array(
            'lastName' => $newUser->getLastName(),
            'name' => $newUser->getName(),
            'email' => $newUser->getEmail(),
            'username' => $newUser->getUsername(),
            'password' => $newUser->getPassword(),
            'role' => $newUser->getRole()
        ));
    }

    public function userExists($userCredentials)
    {
        // Check first if username is in database
        $sql = "SELECT * FROM users WHERE username = :username";
        $response = $this->createQuery($sql, array(
            'username' => $userCredentials->getUsername(),
        ));

        $userExists = $response->fetch();

        return $userExists;
    }

    public function updateStatus($userToUpdate)
    {
        $sql = "UPDATE users SET roleId = 1 WHERE userId = :userId";
        $response = $this->createQuery($sql, array(
            'userId' => $userToUpdate->getUserId()
        ));
    }

    public function deleteUser($userId)
    {
        $sql = "DELETE FROM users WHERE userId = :userId";
        $response = $this->createQuery($sql, array(
            'userId' => $userId
        ));
    }
}