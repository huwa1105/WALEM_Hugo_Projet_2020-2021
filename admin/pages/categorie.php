<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {

    $cat = new CategorieBD($cnx);
    $liste_cat = $cat->getCategorie();
    $nbr_cat = count($liste_cat);

//var_dump($liste_cat);
    ?>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            for ($i = 0;
            $i < $nbr_cat;
            $i++){
            ?>
            <a href="./index.php?page=catalogue.php&id_cat=<?php print $liste_cat[$i]->id_cat ?>">
                <div class="col">
                    <div class="card bg-dark text-light">
                        <img src="./images/<?php print $liste_cat[$i]->image ?>" class="card-img-top"
                             alt="image <?php print $liste_cat[$i]->libelle ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php print $liste_cat[$i]->libelle ?></h5>
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