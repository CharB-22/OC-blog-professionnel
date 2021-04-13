<?php $this->title = "Liste des utilisateurs"; ?>


<h1 class="text-center mb-3">Liste d'Utilisateurs</h1>

<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php 

        foreach ($userList as $user)
        {
            ?>
            <tr>
                <th scope="row"><?= htmlspecialchars($user->getUserId());?></th>
                <td><?= htmlspecialchars($user->getName());?></td>
                <td><?= htmlspecialchars($user->getLastName());?></td>
                <td><?= htmlspecialchars($user->getUsername());?></td>
                <td><?= htmlspecialchars($user->getEmail());?></td>
                <td>
                    <div>                                
                        <a href="#" class="btn btn-primary">Supprimer</a>
                        <a href="#" class="btn btn-primary">Modifier</a>
                    </div>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>