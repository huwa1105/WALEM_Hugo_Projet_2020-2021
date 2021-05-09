<?php
include('./lib/php/verifier_connexion.php');
$user = new AdminBD($cnx);
$liste = $user->getAllAdmin();
$nbr = count($liste); //TODO Verifier si admin
if ($_SESSION['droit_user'] == 1){
?>
<div class="container">
    <table class="table text-light">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Admin</th>
            <th scope="col" class="edit">Editer</th>
            <th scope="col" class="delete">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php

        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <th scope="row">
                    <?php print $liste[$i]->id_user; ?>
                </th>
                <td>
                <span contenteditable="true" name="id_user" id="<?php print $liste[$i]->id_user; ?>" class="maj">
                <?php print $liste[$i]->nom; ?>
                </span>
                </td>
                <td>
                <span contenteditable="true" name="prenom" id="<?php print $liste[$i]->id_user; ?>" class="maj">
                <?php print $liste[$i]->prenom; ?>
                </span>
                </td>
                <td>
                <span contenteditable="true" name="login" id="<?php print $liste[$i]->id_user; ?>">
                <?php print $liste[$i]->login; ?>
                </span>
                </td>
                <td>
                    <?php if ($liste[$i]->droit_admin == 1) { ?>
                        <span class="etiquette" id="<?php print $liste[$i]->id_user; ?>">ADMIN</span>
                    <?php }; ?>
                </td>
                <td class="edit"><a href="./index.php?page=edit_user.php&id_user=<?php print $liste[$i]->id_user; ?>"><i
                                class="fas fa-edit text-light"></i></a></td>
                <td class="delete"><a
                            href="./index.php?page=delete_user.php&id_user=<?php print $liste[$i]->id_user; ?>"><i
                                class="fas fa-trash-alt text-light"></i></a></td>
            </tr>
            <?php
        }
        } else {
            ?>
            <h2 class="text-light">Accès réservés aux adminsitrateurs</h2>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>