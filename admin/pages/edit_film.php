<?php
include('./lib/php/verifier_connexion.php');

$categorie = new CategorieBD($cnx);
$liste_cat = $categorie->getCategorie();
$nbr = count($liste_cat);
?>
<div class="text-light">
    <?php
    if (isset($_SESSION['admin'])) {
        $film = new FilmBD($cnx);
        $liste_film = $film->getFilmById($_GET['id_film']);
    }//TODO formulaire de modification

    if(isset($_GET['entrer'])){
        extract($_GET, EXTR_OVERWRITE);
        $add = new FilmBD($cnx);
        $films = $add->UpdateFilm($id_film, $nom, $description, $realisateur, $date, $categorie, $image, $video);

        if (!is_null($film)){
            unset($_SESSION['page']);
        }else{
            print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php\">";
        }
        print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php?page=catalogue.php ?>\">";

    }
    ?>
</div>
<div class="d-flex justify-content-around">
</div>
<div class="d-flex justify-content-around text-light">
    <form class="bg-dark text-light container px-5 mx-5" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <h3 class="mt-2 maj">Modifier <?php print $liste_film[0]->nom;?></h3>
        <div class="container">
            <label for="nom" class="form-label mt-2">ID</label>
            <input type="text" placeholder="ID" value="<?php print $liste_film[0]->id_film;?>" class="form-control" id="id" name="id">
        </div>
        <div class="container">
            <label for="nom" class="form-label mt-2">Nom</label>
            <input type="text" placeholder="Nom" class="form-control" id="nom" name="nom">
        </div>
        <div class="container">
            <label for="description" class="form-label mt-2">Description</label>
            <input type="text" placeholder="Description" class="form-control" id="description" name="description">
        </div>
        <div class="container">
            <label for="realisateur" class="form-label mt-2">Realisateur</label>
            <input type="text" placeholder="Realisateur" class="form-control" id="realisateur" name="realisateur">
        </div>
        <div class="container">
            <label for="date" class="form-label mt-2">Date</label>
            <input type="date" placeholder="Date" class="form-control" id="date" name="date">
        </div>
        <div class="container">
            <label for="video" class="form-label mt-2">Video</label>
            <input type="video" placeholder="Video" class="form-control" id="video" name="video">
        </div>
        <div class="container">
            <label for="categorie" class="form-label mt-2">Categorie</label>
            <select id="categorie" name="categorie" class="form-select">
                <?php
                for ($i = 0; $i < $nbr; $i++) {
                    ?>
                    <option value="<?php print $liste_cat[$i]->id_cat; ?>"><?php print $liste_cat[$i]->libelle; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="container">
            <label for="image" class="form-label mt-2">Image</label>
            <input type="text" placeholder="Image" class="form-control" id="image" name="image">
        </div>
        <!--<div class="container">
            <label for="image" class="form-label mt-2">Image</label>
            <select id="image" class="form-select">
                <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
                    <option><?php print $liste_film[$i]->image; ?></option>
                <?php } ?>
            </select>
        </div>-->
        <div class="container">
            <button type="submit" class="btn btn-danger mb-4 mt-4" id="entrer" name="entrer">Entrer</button>
        </div>
    </form>
</div>
