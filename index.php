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
    <?php
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 1) {

    ?>
            <a href="creation.php">ajoutez un article</a>
        <?php
        }
        ?>
        <a href="logout.php">déconnectez-vous</a>
    <?php
    } else {
    ?>
        <a href="connexion.php">connectez-vous</a>
    <?php
    }
    ?>
    <h1>Tout sur la mythologie grecque</h1>
    <?php
    $article = affiche_article();
    foreach ($article as $value) {
        $id = $value->id_article;
    ?>
        <article>
            <figure>
                <a href="article.php?id=<?= $id ?>"><img src="assets/img/<?= $value->img_article ?>" alt="" class="image"></a>
            </figure>
            <aside>
                <a href="article.php?id=<?= $id ?>"><?= $value->title_article ?></a>
                <p>
                    <?= substr($value->content_article, 1, 300)." ..." ?>
                </p>
            </aside>
        </article>
    <?php
    }
    ?>
</body>

</html>