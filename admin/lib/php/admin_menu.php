<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a  href="./index.php?page=accueil_admin.php"><img src="./images/Omniflix.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Catalogue
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./index.php?page=categorie.php">Catégories</a></li>
                        <li><a class="dropdown-item" href="./index.php?page=catalogue.php">Tous</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="./index.php?page=ajouter_oeuvre.php">Ajouter un film</a></li>
                        <li><a class="dropdown-item" href="./index.php?page=pdffilm.php">Imprimer PDF</a></li>
                    </ul>
                </li>
                <?php
                if($_SESSION['droit_user'] == 1){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?page=liste_utilisateur.php">Utilisateurs</a>
                </li>
                <?php
                }
                ?>
                <a class="nav-link dropdown-toggle maj" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php print $_SESSION['nom_user']; print" "; print $_SESSION['prenom_user']?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="./index.php?page=disconnect.php">Deconnexion</a></li>
                </ul>
            </ul>

            <!--<a class="nav-link active text-light" aria-current="page" href="./index.php?page=disconnect.php"><?php print $nom_user; print $prenom_user?></a>-->
        </div>
</nav>