<?php
function idUser($username){
    $connexio = conexio();
    $stmt = $connexio->prepare("SELECT usuari_id FROM usuaris WHERE username = ?");
    $stmt->execute([$username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $result['usuari_id'];
    return $id;
}

function conexio(){
    $name = "pt03_alex_vazquez";
    $dbuser =   "root";
    $connexio = new PDO("mysql:host=localhost;dbname=$name", $dbuser,'');
    return $connexio;
}
?>