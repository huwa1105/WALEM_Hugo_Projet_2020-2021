<?php

class Connexion {

    private static $_instance = null;

    public static function getInstance($dsn, $user, $password){

        // :: ==> maniere d'atteindre une variable statique
        if(!self::$_instance){ // si l'instance de cnx n'existe pas encore

            try{

                self::$_instance = new PDO($dsn, $user, $password); // on essaie d'instancier un objet PDO
                //print "Connecté";

            } catch(PDOException $e){

                print "Echec: ".$e->getMessage();

            }

        }

        return self::$_instance;

    }

}