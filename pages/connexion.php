<?php
if (isset($_POST['submit'])) {
    extract($_POST, EXTR_OVERWRITE);
    $ad = new AdminBD($cnx);
    $admin = $ad->getAdmin($login, $password);
    if($admin){
        $_SESSION['admin']=1;
        //print "OK";
        ?>
        <meta http-equiv="refresh": content="0;URL=./admin/index.php">
<?php
    }else{
        $message = "Identifiants incorrects";
    }
}
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
            if(isset($message)){
                print $message;
            }
            ?>
        </p>
    </form>
    <!--<form class="bg-dark text-light container px-5 mx-5">
        <h2 class="mt-2">Inscription</h2>
        <div class="container">
            <label for="exampleInputEmail1" class="form-label mt-2">Nom</label>
            <input type="text" placeholder="Nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="container">
            <label for="exampleInputEmail1" class="form-label mt-2">Prénom</label>
            <input type="text" placeholder="Prénom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="container">
            <label for="exampleInputEmail1" class="form-label mt-2">Adresse e-mail</label>
            <input type="email" placeholder="E-mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="container">
            <label for="exampleInputPassword1" class="form-label mt-2">Mot de passe</label>
            <input type="password" placeholder="Mot de passe" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="container">
            <button type="submit" class="btn btn-danger mb-4 mt-4">Inscription</button>
        </div>
    </form>-->
</div>