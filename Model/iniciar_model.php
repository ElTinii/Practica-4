<?php
require_once "model.php";
//Alex Vazquez
function password(){
    $username = filtrado($_POST["username"]);
    $password = filtrado($_POST["password"]);
    $connexio = conexio();

    //Mirem si l'usuari esta a la base de dades si no ho esta mes abaix a la comprovacio surt un error
    $consulta = $connexio->prepare('SELECT password FROM usuaris WHERE username = ?');
    $consulta->bindParam(1, $username);
    $consulta->execute();
    $resultado = $consulta->fetch();
    $pass = $resultado["password"];
    
    //Aqui comprovem si l'usuari existeix si ho fa entrem a l'apartat d'usuari amb la seva sessio
    if ($resultado) {
        //Aqui mierm si els 2 passwords son iguals, si ho son entra a la part de l'usuari
        if(password_verify($password,$pass)){
            session_start();
            $_SESSION['username'] = $username;
            //El que fem es entrar al controlador dels usuaris i li enviem per la url amb quin username ha entrat
           header("Location: ../Controlador/usuari_controlador.php?username=$username");
        }else{
            $errors = "La contrasenya no es correcta";
            include_once "../Vista/iniciar_vista.php";
        }
        
    } else {
        $errors = "No hemos encontrado el usuario";
    }

}
//Aqui busquem si esta a la base de dades l'usuari que ens pasen
function compUsuari($username){
    $connexio = conexio();
    $consulta = $connexio->prepare('SELECT * FROM usuaris WHERE username = ?');
    $consulta->bindParam(1, $username);
    $consulta->execute();
    $resultado = $consulta->fetch();
    if($resultado){
        return false;
    }else{
        return true;
    }
}
?>