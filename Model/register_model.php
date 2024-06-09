<?php
//Alex Vazquez Carrion
try {
    $username = filtrado($_POST["username"]);
    $password = filtrado($_POST["password"]);
    $name = "pt03_alex_vazquez";
    $dbuser = "root";
    //Faig la conexio a la base de dades
    $connexio = new PDO("mysql:host=localhost;dbname=$name", $dbuser,'');
    //Comprovo si el username esta repetit
    $consulta = $connexio->prepare('SELECT * FROM usuaris WHERE username = ?');
    $consulta->bindParam(1, $username);
    $consulta->execute();
    $resultado = $consulta->fetch();
    $encr_pass = password_hash($password,PASSWORD_DEFAULT);//Encripto la contrasenya

    //comorovo si el username esta repetit, si no esta ho insereix a la base de dades
    if ($resultado) {
        $errors = "Este username ya esta inserit";
        include "../Vista/register_vista.php";
    } else {
        $stmt = $connexio->prepare('INSERT INTO usuaris (username, password) VALUES (?,?)');
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $encr_pass);
        if ($stmt->execute()) {
            session_start();
            $_SESSION['username'] = $username;
            //El que fem es entrar al controlador dels usuaris i li enviem per la url amb quin username ha entrat
            header("Location: ../Controlador/usuari_controlador.php?username=$username");
        } else {
            $errors = "Error al inserir el usuario";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$connexio = null;
?>