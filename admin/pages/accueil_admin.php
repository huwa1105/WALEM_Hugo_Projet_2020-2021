
<?php
include('./lib/php/verifier_connexion.php');

if(isset($_SESSION['admin'])) {
    ?>
    <h2 class="text-light">Accueil admin</h2>
    <div id="mosaique"></div>
    <?php
}
?>