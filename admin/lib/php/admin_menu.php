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
                        <li><a class="dropdown-item" href="./index.php?page=catalogue.php">Films</a></li>
                        <li><a class="dropdown-item" href="./index.php?page=series.php">Séries</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="./index.php?page=catalogue.php">Tous</a></li>
                    </ul>
                </li>
            </ul>
            <a class="nav-link active text-light" aria-current="page" href="./index.php?page=disconnect.php">Deconnexion</a>
        </div>
</nav>