<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {
    if ($_SESSION['droit_user'] == 1) {

        $film = new FilmBD($cnx);
        $liste_film = $film->getFilmById($_GET['id_film']);
        $id_film = $liste_film[0]->id_film;

        if (isset($_GET['delete'])) {
            extract($_GET, EXTR_OVERWRITE);
            $add = new FilmBD($cnx);
            $films = $add->DeteteFilm($id_film);

            print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php?page=catalogue.php\">";

        }

        ?>

        <h2 class="text-light">Etes-vous sur de vouloir supprimer <?php print $liste_film[0]->nom ?></h2>
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <div class="container">
                <input type="hidden" placeholder="ID" readonly value="<?php print $liste_film[0]->id_film; ?>"
                       class="form-control" id="id" name="id_film">
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
