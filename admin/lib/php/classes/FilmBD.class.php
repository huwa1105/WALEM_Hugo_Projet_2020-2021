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

}