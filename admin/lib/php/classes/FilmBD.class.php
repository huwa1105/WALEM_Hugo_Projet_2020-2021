<?php

class FilmBD extends Film
{

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans l'index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    { //$cnx envoyé depuis la page qui instancie

        $this->_db = $cnx;

    }

    public function getAllFilm()
    {

        $query = "select * from vue_films_cat order by categorie";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {

            $_data[] = new Film($d);

        }

        return $_data;

    }

    public function getFilmByCat($id_cat)
    {
        try {
            $query = "select * from vue_films_cat where categorie = :id_cat";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_cat', $id_cat);
            $_resultset->execute();
            while ($d = $_resultset->fetch()) {
                $_data[] = new Film($d);
            }
        } catch (PDOException $e) {
            print "Echec de la requête" . $e->getMessage();
        }
        return $_data;
    }

    public function getFilmById($id_film)
    {
        try {
            $query = "select * from film where id_film = :id_film";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_film', $id_film);
            $_resultset->execute();
            while ($d = $_resultset->fetch()) {
                $_data[] = new Film($d);
            }
        } catch (PDOException $e) {
            print "Echec de la requête" . $e->getMessage();
        }
        return $_data;
    }

    public function NouvFilm($nom, $description, $realisateur, $date, $categorie, $image, $video)
    {
        try {
            $this->_db->beginTransaction();
            $query = "insert into film (id_film, nom, description, realisateur, date, categorie, image, video) values (NEXTVAL('film_id_seq'), :nom, :description, :realisateur, :date, :categorie, :image, :video)";
            var_dump($query);
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindvalue(':nom', $nom);
            $_resultset->bindvalue(':description', $description);
            $_resultset->bindvalue(':realisateur', $realisateur);
            $_resultset->bindvalue(':date', $date);
            $_resultset->bindvalue(':categorie', $categorie);
            $_resultset->bindvalue(':image', $image);
            $_resultset->bindvalue(':video', $video);
            $_resultset->execute();
            $this->_db->commit();

        }catch (PDOException $e){
            print $e->getMessage();
        }

    }

    public function UpdateFilm($id_film, $nom, $description, $realisateur, $date, $categorie, $image, $video)
    {
        try {

            $this->_db->beginTransaction();
            $query="update film set nom=:nom,description=:description,realisateur=:realisateur,date=:date,categorie=:categorie,image=:image,video=:video where id_film=:id_film";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindvalue(':id_film', $id_film);
            $_resultset->bindvalue(':nom', $nom);
            $_resultset->bindvalue(':description', $description);
            $_resultset->bindvalue(':realisateur', $realisateur);
            $_resultset->bindvalue(':date', $date);
            $_resultset->bindvalue(':categorie', $categorie);
            $_resultset->bindvalue(':image', $image);
            $_resultset->bindvalue(':video', $video);
            $_resultset->execute();
            $this->_db->commit();
            return 1;
        }catch (PDOException $e){
            print $e->getMessage();
        }

    }

    public function DeteteFilm($id_film){
        try{

            $this->_db->beginTransaction();
            $query="delete from film where id_film = :id_film";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindvalue(':id_film', $id_film);
            $_resultset->execute();
            $this->_db->commit();

        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

}