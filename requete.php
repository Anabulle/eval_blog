<?php

function create_user($pseudo,$mdp,$role){
    $db = connexion_BD();
    $sql = "INSERT INTO users(pseudo_user,mdp_user,role_user) VALUES (:pseudo_user,:mdp_user,:role_user)";
    $req = $db->prepare($sql);
    $req->execute([":pseudo_user"=>$pseudo,":mdp_user"=>$mdp,":role_user"=>$role]);
}
function requete_findUser($pseudo) {
    $db = connexion_BD();
    $sql = "SELECT * FROM users WHERE pseudo_user = :pseudo";
    $req = $db->prepare($sql);
    $result = $req->execute([
        "pseudo"=>$pseudo
    ]);
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
}
function affiche_article() {
    $db = connexion_BD();
    $sql = "SELECT * FROM article";
    $req = $db->query($sql);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}
function find_article($id) {
    $db = connexion_BD();
    $sql = "SELECT * FROM article WHERE id_article = :id_article";
    $req = $db->prepare($sql);
    $result = $req->execute([
        "id_article"=>$id
    ]);
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
}
function requete_pseudo() {
    $db = connexion_BD();
    $sql = "SELECT * FROM users";
    $req = $db->query($sql);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}
function create_article($img,$title,$auteur,$content){
    $db = connexion_BD();
    $sql = "INSERT INTO article(img_article,title_article,auteur_article,content_article) VALUES (:img_article,:title_article,:auteur_article,:content_article)";
    $req = $db->prepare($sql);
    $req->execute([":img_article"=>$img,":title_article"=>$title,":auteur_article"=>$auteur,":content_article"=>$content ]);
}
