<?php

class AdminBD extends Admin
{

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans l'index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    { //$cnx envoyé depuis la page qui instancie

        $this->_db = $cnx;

    }

    public function updateAdmin($champ,$id,$valeur){
        try{
            //appeler une procédure embarquée
            $query = "update utilisateur set ".$champ."='".$valeur."' where id_user='".$id."'";
            $resultset = $this->_db->prepare($query); //TODO transformer la requête!
            $resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function UpdateAdmin2($id_user, $nom, $prenom, $login, $password, $droit_admin)
    {
        try {

            $this->_db->beginTransaction();
            $query = "update utilisateur set nom=:nom,prenom=:prenom,login=:login,password=:password,droit_admin=:droit_admin where id_user=:id_user";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindvalue(':id_user', $id_user);
            $_resultset->bindvalue(':nom', $nom);
            $_resultset->bindvalue(':prenom', $prenom);
            $_resultset->bindvalue(':login', $login);
            $_resultset->bindvalue(':password', md5($password));
            $_resultset->bindvalue(':droit_admin', $droit_admin);
            $_resultset->execute();
            $this->_db->commit();
            return 1;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function getAdmin($login, $password)
    {
        try {

            $query = "select is_admin(:login,:password) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':login', $login);
            $_resultset->bindValue(':password', md5($password));//car password crypté en md5
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            return $retour;
        }catch(PDOException $e){
            print "Echec ".$e->getMessage();
        }

    }

    public function getAllAdmin()
    {

        $query = "select * from utilisateur order by id_user";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {

            $_data[] = new Admin($d);

        }

        //var_dump($_data);
        return $_data;
    }

    public function getAdminById($id_user)
    {
        try {
            $query = "select * from utilisateur where id_user = :id_user";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_user', $id_user);
            $_resultset->execute();
            while ($d = $_resultset->fetch()) {
                $_data[] = new Admin($d);
            }
        } catch (PDOException $e) {
            print "Echec de la requête" . $e->getMessage();
        }
        return $_data;
    }

    public function ajoutAdmin($nom, $prenom, $login, $password, $droit_admin)
    {
        try {
            $this->_db->beginTransaction();
            $query = "insert into utilisateur (id_user, nom, prenom, login, password, droit_admin) values (NEXTVAL('user_id_seq'), :nom, :prenom, :login, :password, :droit_admin)";
            var_dump($query);
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindvalue(':nom', $nom);
            $_resultset->bindvalue(':prenom', $prenom);
            $_resultset->bindvalue(':login', $login);
            $_resultset->bindValue(':password', md5($password));
            $_resultset->bindvalue(':droit_admin', $droit_admin);
            $_resultset->execute();
            $this->_db->commit();

        }catch (PDOException $e){
            print $e->getMessage();
        }

    }

    public function DeteteAdmin($id_user){
        try{

            $this->_db->beginTransaction();
            $query="delete from utilisateur where id_user = :id_user";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindvalue(':id_user', $id_user);
            $_resultset->execute();
            $this->_db->commit();

        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

}