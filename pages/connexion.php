<?php
if (isset($_POST['submit'])) {
    extract($_POST, EXTR_OVERWRITE);
    $ad = new AdminBD($cnx);
    $admin = $ad->getAdmin($login, $password);
    //$nbr = count($admin);
    if ($admin) {
        $_SESSION['admin'] = 1;
        print "OK";
        //if (!is_null($admin)) {
            //$_SESSION['login'] = $_POST['login'];
            //$_SESSION['password'] = $_POST['password'];
        //}
        ?>
        <meta http-equiv="refresh" : content="0;URL=./admin/index.php?page=accueil_admin.php">
        <?php
    } else {
        $message = "Identifiants incorrects";
    }
}

if(isset($_GET['register'])){
    extract($_GET, EXTR_OVERWRITE);
    $add = new AdminBD($cnx);
    $us = $add->ajoutAdmin($nom, $prenom, $login, $password, $droit_admin);

    if (!is_null($us)){
        unset($_SESSION['page']);
    }else{
        print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php\">";
    }

}
?>
<?php

//for ($i = 0;
//$i<$nbr;
//$i++){
//print $admin[$i]->droit_admin;
//}
?>

<div class="d-flex justify-content-around">

    <form class="bg-dark text-light container px-5 mx-5" action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
        <h2 class="mt-2">Connexion</h2>
        <div class="container">
            <label for="email" class="form-label mt-2">Adresse e-mail</label>
            <input type="email" placeholder="E-mail" class="form-control" id="login" name="login">
        </div>
        <div class="container">
            <label for="password" class="form-label mt-4">Mot de passe</label>
            <input type="password" placeholder="Mot de passe" class="form-control" id="password" name="password">
        </div>

        <div class="container">
            <button type="submit" class="btn btn-danger mb-4 mt-4" name="submit">Connexion</button>
        </div>
        <p class=""><?php
            if (isset($message)){
            print $message;
            }
            ?>
        </p>
    </form>


    <form class="bg-dark text-light container px-5 mx-5" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get"> <!--TODO formulaire d'inscription-->
        <h2 class="mt-2">Inscription</h2>
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
        <div class="container">
            <input type="hidden" value="false" class="form-control" id="droit_admin" name="droit_admin">
        </div>
        <div class="container">
            <button type="submit" class="btn btn-danger mb-4 mt-4" id="register" name="register">Inscription</button>
        </div>
    </form>
</div>