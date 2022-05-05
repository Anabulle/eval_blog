<?php
session_start();
include 'pdo.php';
include 'requete.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <form action="" method="post">
        <div>
        <label for="pseudo_user">votre pseudo</label>
        <input type="text" id="pseudo_user" name="pseudo_user">
        </div>
        <div>
            <label for="mdp_users">votre mdp</label>
            <input type="text" id="mdp_user" name="mdp_user">
        </div>


        <input type="submit" value="envoyez" name="valider" id="submit">
        </br>
    </form>
    <a href="connexion.php"> connectez vous ici!</a>
    <?php
    if (isset($_POST['valider'])) {
        if (isset($_POST['pseudo_user'], $_POST['mdp_user'])) {
            $pseudo = $_POST['pseudo_user'];
            $user = requete_findUser($pseudo);
            $mdp = password_hash($_POST['mdp_user'], PASSWORD_DEFAULT);
            if ($user) {
                echo "erreur rentrez un autre pseudo";
            } else if ($_POST['pseudo_user'] === "") {
                echo "entrez les informations";
            } else {
                if ($_POST['pseudo_user'] === "admin") {
                    $role = 1;
                    create_user($pseudo, $mdp, $role);
                    header('Location: index.php');
                    $_SESSION['role'] = $role;
                    $_SESSION['user'] = $pseudo;
                } else {
                    $role = 2;
                    create_user($pseudo, $mdp, $role);
                    header('Location: index.php');
                    $_SESSION['role'] = $role;
                    $_SESSION['user'] = $pseudo;
                }
            }
        } else {

            echo "remplissez les champs d'informations";
        }
    }
    ?>
</body>

</html>