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
    $id = $_GET['id'];
    $article = find_article($id);
    ?>
    <div>
        <h2> <?= $article->title_article ?></h2>
        <img src="assets/img/<?= $article->img_article ?>" alt="">
        <p><?= $article->content_article ?></p>
        <p><?= $article->auteur_article ?></p>
    </div>
    
   <!--  /*
   if($_SESSION['user']){
        ?>
        <form action="" method="POST" id="bloc">
            <p>votre commentaire ici</p>
            <textarea name="comm" id="comm"></textarea>
        </form>
       
    }
    $comm = 
    foreach($comm as $value){

    }
    */
 -->
</body>

</html>