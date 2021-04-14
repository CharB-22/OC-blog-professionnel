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
}