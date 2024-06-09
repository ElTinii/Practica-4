<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estils_usuari.css">
    <!--Alex Vazquez Carrion-->
</head>
<body>
    <form action="../Controlador/usuari_afegir.php" method="POST">
        <label for="">Escriu el titol del article</label><br>
        <input type="text" name="titol" id="titol"><br>
        <label for="">Escriu el cos del article</label>
        <textarea name="contingut" id="" cols="30" rows="10"></textarea> <br>
        <input type="submit" value="Enviar" name="Enviar">
    </form>
</body>
</html>