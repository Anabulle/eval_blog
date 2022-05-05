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
    <h2>nouvel article</h2>
    <div id="container">
        <form id="bloc" action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="title_article">titre</label>
                <input type="text" size="30" id="title_article" name="title_article">
            </div>
            <div>
                <label for="auteur_article">auteur</label>
                <input type="text" size="30" id="auteur_article" name="auteur_article">
            </div>
            <input type="file" name="img" id="img">
            <textarea name="content_article" id="content_article" cols="30" rows="10"></textarea>
            <input type="submit" value="envoyez" name="valider" id="submit">
        </form>
    </div>

    <a href="index.php">retour</a>
    <?php
    if (!isset($_SESSION['role'])) {
        header('Location: index.php');
    } else if ($_SESSION['role'] == 2) {
        header('Location: index.php');
    } else {
        if (isset($_POST['valider'])) {
            if (!empty($_POST['title_article'] and $_POST['auteur_article'] and $_POST['content_article'])) {
                if ($_FILES['img']['size'] > 0) {
                    $tmpName = $_FILES['img']['tmp_name'];
                    $name_img = $_FILES['img']['name'];
                    $size = $_FILES['img']['size'];
                    $type = $_FILES['img']['type'];
                    $title = $_POST['title_article'];
                    $auteur = $_POST['auteur_article'];
                    $content = $_POST['content_article'];
                    $error = null;
                    $random = rand(0, 999999);
                    $extension = ['jpg', 'jpeg', 'png'];
                    $ext = explode('/', $type);
                    $url = $auteur . $random . '.' . $ext[1];
                    if ($size >= 1000000) {
                        $error = "taille d image ";
                    }
                    if ($ext[1] !== 'jpeg' and $ext[1] !== 'png' and $ext[1] !== 'jpg') {
                        $error .= "extension ";
                    }
                    if ($error != null) {
                        echo "les erreurs suivantes ont été détéctés : $error";
                    } else {
                        move_uploaded_file($tmpName, 'assets/img/' . $auteur . $random . '.' . $ext[1]);
                        create_article($url, $title, $auteur, $content);
                    }
                }
            } else {
                echo "<p>veuillez saisir les informations</p>";
            }
        }
    }
    ?>
</body>

</html>