<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {
    if ($_SESSION['droit_user'] == 1) {

        $us = new AdminBD($cnx);
        $liste_user = $us->getAdminById($_GET['id_user']);
        $id_user = $liste_user[0]->id_user;

        if (isset($_GET['delete'])) {
            extract($_GET, EXTR_OVERWRITE);
            $add = new AdminBD($cnx);
            $users = $add->DeteteAdmin($id_user);

            print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php?page=liste_utilisateur.php\">";

        }

        ?>

        <h2 class="text-light">Etes-vous sur de vouloir supprimer <?php print $liste_user[0]->nom ?></h2>
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <div class="container">
                <input type="hidden" placeholder="ID" readonly value="<?php print $liste_user[0]->id_user; ?>"
                       class="form-control" id="id" name="id_user">
            </div>
            <input class="btn-danger px-2 rounded" type="submit" id="delete1" name="delete" value="OUI">
            <input class="btn-danger px-2 rounded" type="submit" id="delete2" name="nodelete" value="NON">
        </form>

        <?php
    } else {
        ?>
        <h2 class="text-light">Accès réservés aux adminsitrateurs</h2>
        <?php
    }

}
?>
