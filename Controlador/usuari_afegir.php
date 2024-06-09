<?php
//Alex Vazquez"
require_once "../Model/model.php";
require_once "../Model/article_model.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Aqui estic fent la comprovacio de si l'usuari ha enviat el formulari
    $username = $_SESSION['username'];

if(isset($_POST['Enviar'])){
    $titol = $_POST['titol'];
    $contingut = $_POST['contingut'];
    $usuari_id = idUser($username);
    afegirArticle($titol, $contingut, $usuari_id);
    header ("Location: ../Controlador/usuari_controlador.php");
}else{
    include_once "../Vista/afegir.php";
}
?>