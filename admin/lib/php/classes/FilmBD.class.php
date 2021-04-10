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

    public function getFilm()
    {

        $query = "select * from film";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {

            $_data[] = new Film($d);

        }

        return $_data;

    }

}