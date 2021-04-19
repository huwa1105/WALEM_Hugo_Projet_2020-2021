
<?php
include('./lib/php/verifier_connexion.php');

if(isset($_SESSION['admin'])) {
    print "<h2>Accueil admin</h2>";
}