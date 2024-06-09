<?php
require_once "../Model/model.php";
require_once "../Model/article_model.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!(isset($_SESSION['article_id']))){
    $_SESSION['article_id'] = $_POST['article_id']; 
}
function titol(){
    $article_id = $_POST['article_id'];
    $article = getArticleById($article_id);
    return $article['Titol'];
}
function contingut(){
    $article_id = $_POST['article_id'];
    $article = getArticleById($article_id); 
    return $article['text_adreca'];
}
if(isset($_POST['Enviar'])){
    $titol = htmlspecialchars($_POST['titol']);
    $contingut = htmlspecialchars($_POST['contingut']);
    $article_id = htmlspecialchars($_SESSION['article_id']);
    $username = htmlspecialchars($_SESSION['username']);
    $usuari_id = idUser($username);
    modificarArticle($titol, $contingut, $usuari_id, $article_id);
    if (isset($_SESSION['article_id'])) {
        unset($_SESSION['article_id']);
    }
    header("Location: usuari_controlador.php");
}
else{
    include_once "../Vista/modificar_vista.php";
}
?>