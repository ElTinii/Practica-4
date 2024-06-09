<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar-se</title>
    <link rel="stylesheet" href="../estils_sessio.css">
    <!-Alex Vazquez Carrion->
</head>
<body>
<form action="../Controlador/register_controlador.php" id="principal" method="POST">
        <label for="username">Username</label>
        <input type="text" value="username" name="username" placeholder="Escriu aqui el teu nom"><br>
        <label for="">Correu electronic</label>
        <input type="text" name="email" id="" placeholder="Escriu aqui el teu correu electronic">
        <label for="password">Contraenya</label>
        <input type="password" name="password" value="password" id=""><br>
        <label for="">Repeteix la Contrasenya</label>
        <input type="password" name="password2" vaule="password" id="" placeholder="Escriu aqui la teva contrasenya">
        <input type="submit" value="Enviar" name="env_register" placeholder="Repeteix la teva contrasenya"><br>
    </form>
    <form action="../index.php" method="POST">
    <button action="">Tornar</button>
    </form>
</body>
</html>