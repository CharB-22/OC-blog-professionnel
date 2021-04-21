<?php $this->title = "Liste des utilisateurs"; ?>
<?php 
    if (!empty($message))
    {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                $message
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
             </div>";
    }
?>

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
                    <form method="post" action="index.php?route=adminUserList&userId=<?= htmlspecialchars($user->getUserId());?>" class="d-flex flex-column flex-md-row">
                        <button type="submit" name="deleteUser" class="btn btn-primary m-3">Supprimer</button>
                        <button type="submit" name="updateRole" class="btn btn-primary m-3">Approuver en tant qu'administrateur</button>
                    </form>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>