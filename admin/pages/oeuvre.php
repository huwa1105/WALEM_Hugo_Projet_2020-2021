<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {

    $film = new FilmBD($cnx);
    $liste_film = $film->getFilmById($_GET['id_film']);
    ?>
    <div class="card bg-dark">
        <div class="card-horizontal bg-dark text-light">
            <div class="img-square-wrapper">
                <img class="" src="./images/<?php print $liste_film[0]->image ?>" alt="Card image cap">
            </div>
            <div class="card-body">
                <h1 class="card-title"><?php print $liste_film[0]->nom ?></h1>
                <p class="card-text"><?php print $liste_film[0]->realisateur ?></p>
                <p class="card-text"><?php print $liste_film[0]->date ?></p>
                <p class="card-text"><?php print $liste_film[0]->description ?></p>
                <a class="text-danger" href="<?php print $liste_film[0]->video ?>"><p>Regarder</p><i
                            class="fas fa-play"></i></a>
            </div>
        </div>
    </div>
    <?php
}