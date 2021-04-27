<?php
include('./lib/php/verifier_connexion.php');
?>
<div class="text-light">
    <?php
    if (isset($_SESSION['admin'])) {
        $ad = new AdminBD($cnx);
        $liste_admin = $ad->getAdminById($_GET['id_user']);
    }//TODO formulaire de modification

    if (isset($_GET['maj'])) {
        extract($_GET, EXTR_OVERWRITE);
        $add = new AdminBD($cnx);
        $us = $add->majAdmin($id_user, $nom, $prenom, $login, $password, $droit_admin);

        if (!is_null($us)) {
            unset($_SESSION['page']);
        } else {
            //print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php\">";
        }

    }
    ?>
</div>
<div class="d-flex justify-content-around">
    <form class="bg-dark text-light container px-5 mx-5" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <h3 class="mt-2 maj">Modifier <?php print $liste_admin[0]->nom; ?>
            &nbsp;<?php print $liste_admin[0]->prenom ?></h3>
        <div class="container">
            <input type="hidden"class="form-control" value="<?php print $liste_admin[0]->id_user; ?>" id="id_user" name="id_user">
        </div>
        <div class="container">
            <label for="exampleInputEmail1" class="form-label mt-2">Nom</label>
            <input type="text" placeholder="Nom" class="form-control" id="nom" name="nom">
        </div>
        <div class="container">
            <label for="exampleInputEmail1" class="form-label mt-2">Prénom</label>
            <input type="text" placeholder="Prénom" class="form-control" id="prenom" name="prenom">
        </div>
        <div class="container">
            <label for="exampleInputEmail1" class="form-label mt-2">Adresse e-mail</label>
            <input type="email" placeholder="E-mail" class="form-control" id="login" name="login">
        </div>
        <div class="container">
            <label for="exampleInputPassword1" class="form-label mt-2">Mot de passe</label>
            <input type="password" placeholder="Mot de passe" class="form-control" id="password" name="password">
        </div>
        <div class="form-check form-check-inline mt-2">
            <input type="radio" id="oui" name="droit_admin" value="true">
            <label for="male">Administrateur</label><br>
            <input type="radio" id="female" name="droit_admin" value="false">
            <label for="female">Pas administrateur</label><br>
        </div>
        <div class="container">
            <button type="submit" class="btn btn-danger mb-4 mt-4" id="maj" name="maj">Inscription</button>
        </div>
    </form>
</div>
