<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {

    $film = new FilmBD($cnx);

    if (isset($_GET['id_cat'])) {
        $liste_film = $film->getFilmByCat($_GET['id_cat']);
    } else {
        $liste_film = $film->getAllFilm();
    }

//$liste_film = $film->getFilm();
    $nbr_film = count($liste_film);

//var_dump($liste_film);
    ?>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-6 g-4">
            <?php
            for ($i = 0;
            $i < $nbr_film;
            $i++){
            ?>
            <a href="./index.php?page=oeuvre.php&id_film=<?php print $liste_film[$i]->id_film ?>">
                <div class="col">
                    <div class="card bg-dark text-light">
                        <img src="./images/<?php print $liste_film[$i]->image ?>" class="card-img-top"
                             alt="image <?php print $liste_film[$i]->nom ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php print $liste_film[$i]->nom ?></h5>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </a>
        </div>
    </div>
    <?php
}