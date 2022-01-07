<?php

session_start();

require('user.php');
require('user-pdo.php');

$Vuser = new User();
$Vuser = new Userpdo();

if (isset($_POST['disconnect']))
{
    $Vuser ->disconnect();
}

if (isset($_POST['delete']))
{
    $Vuser ->delete($_SESSION['login']);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="index.css" rel="stylesheet" type="text/css"/>
    <title>Classes - Page d'accueil</title>
</head>

<body>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">

<body>

<?php echo '<h3>Bienvenue  '.$_SESSION['login'].'</h3>'; ?>

<div class="bool">
    <?php var_dump($Vuser->isConnected()); ?>
</div>

<form class="box" action="" method="POST">
    <div class="mod">
        <div class="sub"><input type="submit" value="Déconnexion " name="disconnect" class="box-button"></div>
        <div class="sub1"><input type="submit" value="SUPPRIMER MON COMPTE " name="delete" class="box-button"></div>
    </div>
</form>

<nav>
    <p><a aria-current='page' href='profil.php'>⎖ Informations / Modifier son profil</a></br></br></p>
</nav>

<footer>

<div id="link">© 2022 Copyright:
    <a href="https://github.com/anna-hayoun/livre-or">⎖ github.com/anna-hayoun</a>
</div>

</footer>

</body>
</html>