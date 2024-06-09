<?php
if(isset($_POST['Eliminar'])){
    require_once "../Model/model.php";
    require_once "../Model/article_model.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $username = $_SESSION['username'];
    $usuari_id = idUser($username);
    $article_id = $_POST['article_id'];
    eliminarArticle($article_id, $usuari_id);
    header ("Location: ../Controlador/usuari_controlador.php");
}
?>