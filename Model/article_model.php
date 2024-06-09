<?php
require_once 'Model.php';
function eliminarArticle($id){
    $connexio = conexio();
    $stmt = $connexio->prepare("DELETE FROM articles WHERE article_id = ?");
    $stmt->execute([$id]);
}

function afegirArticle($titol, $contingut, $usuari_id){
    $connexio = conexio();
    $stmt = $connexio->prepare("INSERT INTO articles (Titol, text_adreca, usuari_id) VALUES (?, ?, ?)");
    $stmt->execute([$titol, $contingut, $usuari_id]);
}

function modificarArticle($titol, $contingut, $usuari_id, $article_id){
    $connexio = conexio();
    $stmt = $connexio->prepare("UPDATE articles SET Titol = ?, text_adreca = ? WHERE usuari_id = ? AND article_id = ?");
    $stmt->execute([$titol, $contingut, $usuari_id, $article_id]);
}

function getArticleById($id){
    $connexio = conexio();
    $stmt = $connexio->prepare("SELECT * FROM articles WHERE article_id = ?");
    $stmt->execute([$id]);
    $articles = $stmt->fetch();
    return $articles;
}
?>