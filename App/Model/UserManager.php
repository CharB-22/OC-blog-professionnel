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
}