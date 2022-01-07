<?php

class User 
{
    
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    public $connexion;
 
    public function __construct()
    {
        $conn = mysqli_connect("localhost", "root", "", "classes");
        $this->connexion = $conn;
    }

    public function register($login,$password,$email,$firstname,$lastname)
    {
        $res = mysqli_query($this->connexion, "INSERT INTO `utilisateurs`(`login`, `password`, `email`, `firstname`, `lastname`) VALUES ('$login','$password','$email','$firstname','$lastname')");

        $req = mysqli_query($this->connexion,"SELECT * FROM `utilisateurs` Where login = '$login'");
        $result = mysqli_fetch_all($req);

        return($result);
    }

    public function connect($login, $password)
    {
        $login = $_POST['login'];
	
        $password = $_POST['password'];
	
	    $query = "SELECT * FROM `utilisateurs` WHERE login ='$login' and password ='$password'";
	    $result = mysqli_query($this->connexion, $query) or die(mysqli_error());
	    $rows = mysqli_num_rows($result); 
		
        $user = mysqli_fetch_assoc($result);

	    if ($password == $user['password'] && $login == $user['login'])
        {
            session_start();
            $_SESSION['login'] = $user['login'];
			$_SESSION['id'] = $user['id'];
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
        $query = "DELETE FROM `utilisateurs` WHERE login ='$login'";
	    $result = mysqli_query($this->connexion, $query) or die(mysqli_error());
        session_destroy();
        header('Location: connexion.php');
    }

    public function update($login, $password, $email, $firstname, $lastname)
    {
        $this->login = $_SESSION['login'];
        $req = "SELECT * FROM `utilisateurs` WHERE login ='$this->login'";
        $quer = mysqli_query($this->connexion, $req);
        $fetc = mysqli_fetch_assoc($quer);
        $this->id = $fetc['id'];

        $update = "UPDATE utilisateurs SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE id = $this->id";
        $mod = mysqli_query($this->connexion, $update);

        if(isset($update))
        {
            echo "Infos modifiées.";
        }
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
        $reqy = "SELECT * FROM utilisateurs where login = '$this->login'";
        $qery = mysqli_query($this->connexion, $reqy);
        $fetch = mysqli_fetch_assoc($qery);
        return $fetch;
    }

    public function getLogin()
    {
        $reqy1 = "SELECT login FROM utilisateurs where login = '$this->login'";
        $qery1 = mysqli_query($this->connexion, $reqy1);
        $fetch1 = mysqli_fetch_assoc($qery1);
        return $fetch1;
    }

    public function getEmail()
    {
        $reqy2 = "SELECT email FROM utilisateurs where login = '$this->login'";
        $qery2 = mysqli_query($this->connexion, $reqy2);
        $fetch2 = mysqli_fetch_assoc($qery2);
        return $fetch2;
    }

    public function getFirstname()
    {
        $reqy3 = "SELECT firstname FROM utilisateurs where login = '$this->login'";
        $qery3 = mysqli_query($this->connexion, $reqy3);
        $fetch3 = mysqli_fetch_assoc($qery3);
        return $fetch3;
    }

    public function getLastname()
    {
        $reqy4 = "SELECT lastname FROM utilisateurs where login = '$this->login'";
        $qery4 = mysqli_query($this->connexion, $reqy4);
        $fetch4 = mysqli_fetch_assoc($qery4);
        return $fetch4;
    }

}

?>