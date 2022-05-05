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

</body>

</html>

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

</form>
<a href="inscription.php"> incrivez vous ici!</a>
<?php
if (isset($_POST['valider'])) {
    if (isset($_SESSION['role'])) {
        header('Location: index.php');
    } else {
        if (!empty($_POST['pseudo_user'])) {
            $pseudo = $_POST['pseudo_user'];
            $asso_pseudo =  requete_findUser($pseudo);
            $role = $asso_pseudo->role_user;
            $hash = $asso_pseudo->mdp_user;
            $mdp = $_POST['mdp_user'];
            if ($asso_pseudo == null) {
                echo "les informations sont érronées";
            } else if ($asso_pseudo->pseudo_user === $_POST['pseudo_user'] and password_verify($mdp, $hash)) {
                $_SESSION['role'] = $role;
                $_SESSION['user'] = $asso_pseudo->pseudo_user;
                header('Location: index.php');
            }
        } else {
            echo "<p>entrez une donnée</p>";
        }
    }
}
?>