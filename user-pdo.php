<?php

class Userpdo 
{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    public $connexion;
 
    
    public function __construct()
    {
        try
        {
            $pdo = new PDO('mysql:host=localhost; dbname=classes', 'root', '');
            $this->connexion = $pdo;
        }
        catch(PDOException $error)
        {
            echo "Erreur: ". $error->getMessage();
            die();
        }
    }

    public function register($login, $password, $email, $firstname, $lastname)
    {
        $regi = $this->connexion->prepare("INSERT INTO `utilisateurs`(`login`, `password`, `email`, `firstname`, `lastname`) VALUES ('$login','$password','$email','$firstname','$lastname')");
        $regi->setFetchMode(PDO::FETCH_ASSOC);
        $regi->execute();
        $newUser = $regi->fetchall();

        $rec = $this->connexion->prepare("SELECT * FROM `utilisateurs` Where login = '$login'");
        $rec->setFetchMode(PDO::FETCH_ASSOC);
        $rec->execute();
        $newUserRec = $regi->fetchall();

        return($newUserRec);
    }

    public function connect($login, $password)
    {
	    $req = $this->connexion->prepare("SELECT * FROM `utilisateurs` WHERE login ='$login' and password ='$password'");
	    $req->setFetchMode(PDO::FETCH_ASSOC);
	    $req->execute();
        $result = $req->fetchall();

	    if ($password == $result[0]['password'] && $login == $result[0]['login'])
        {
            session_start();
            $_SESSION['login'] = $result[0]['login'];
            $this->password = $result[0]['password'];
			$_SESSION['id'] = $result[0]['id'];

            echo "Connecté";

			header("Location: index.php");
			exit;
        }
    }

    public function disconnect()
    {
        session_destroy();
        header('Location: connexion.php');
    }

    public function delete($login)
    {
        $req = $this->connexion->prepare("DELETE FROM `utilisateurs` WHERE login ='$login'");
	    $req->execute();
        session_destroy();
        header('Location: connexion.php');
    }

    public function update($login, $password, $email, $firstname, $lastname)
    {
        $this->login = $_SESSION['login'];
        $req = $this->connexion->prepare("SELECT * FROM `utilisateurs` WHERE login ='$this->login'");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        $result = $req->fetchall();
        $this->id = $result[0]['id'];

        $req = $this->connexion->prepare("UPDATE utilisateurs SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE id = $this->id");
        $req->execute();
    }

    public function isConnected()
    {
        if (isset($_SESSION['login']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getAllInfos()
    {
        $this->login = $_SESSION['login'];
        $req = $this->connexion->prepare("SELECT * FROM `utilisateurs` WHERE login ='$this->login'");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        $result = $req->fetchall();
        return $result;
    }

    public function getLogin()
    {
        $req = $this->connexion->prepare("SELECT login FROM utilisateurs where login = '$this->login'");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        $result= $req->fetchall();
        return $result;
    }

    public function getEmail()
    {
        $req = $this->connexion->prepare("SELECT email FROM utilisateurs where login = '$this->login'");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        $result= $req->fetchall();
        return $result;
    }

    public function getFirstname()
    {
        $req = $this->connexion->prepare("SELECT firstname FROM utilisateurs where login = '$this->login'");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        $result= $req->fetchall();
        return $result;
    }

    public function getLastname()
    {
        $req = $this->connexion->prepare("SELECT lastname FROM utilisateurs where login = '$this->login'");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        $result= $req->fetchall();
        return $result;
    }
}

?>