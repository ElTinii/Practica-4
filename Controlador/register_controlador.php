<?php
    $comp = false;
        //Si li han donat al boto enviar entra
if (isset($_POST["env_register"])) {
        //Filtra les dades per que no tingui codi ni ninguna cosa extranya
    function filtrado($datos) {
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }
    //Agafem les variables que necessitem del que en ha passat l'usuari
    $username = filtrado($_POST["username"]);
    $password = filtrado($_POST["password"]);
    $password2 = filtrado($_POST["password2"]);
    $email = filtrado($_POST["email"]);
    $errors = "";

//Aqui fem les comprovacions de les dades , si no es fa ninguna entra al model de registrar-se, si en fa alguna torna a la vista
        if (strlen($username) > 25) {
            $comp = false;
            $errors= "El teu Username es massa gran ha de ser mes petit que 25";
        } else if (strlen($username) < 4) {
            $comp = false;
            $errors = "El teu Username es massa petit ha de ser mes gran que 4";
        }else if ($password =! $password2) {
            $comp = false;
            $errors = "La contraseña no coinciden";
        }else if (!(filter_var($email, FILTER_VALIDATE_EMAIL)) && !empty($email)){
            $comp = false;
            $errors = "El format del mail no es el correcte";
        }else {
            $comp = true;
        }
        if($comp){
            require_once "../Model/register_model.php";
        }
    }
    

if(!$comp){
    include_once "../Vista/register_vista.php";
}
?>