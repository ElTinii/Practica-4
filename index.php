    <?php
    //Alex Vazquez Carrion 
    session_start();
    // Ens connectem a la base de dades	amb un try catch per evitar que el codi ens peti
    function conectarDB(){
    $dadesConnexio = 'mysql:host=localhost;dbname=pt03_alex_vazquez';
    $dbuser = 'root';
    try {
        $connexio = new PDO($dadesConnexio, $dbuser,'');
        $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexio;
    } catch (\Throwable $th) {
        $errors[] = "Error al conectar-se a la base de dades";
    }finally{
        $connexio = null;
    }
    }
    $conteo;
    $connexio = conectarDB();   
    $pagina = 1;

    //Aqui el que estic fent es agafar a una variable i posar-li les opcions que selecciona l'usuari
    function opcions(){
        if (isset($_GET['opcions'])){
            $_SESSION['fi'] = $_GET['opcions'];
        }
        if(!isset($_SESSION['fi'])){
            $_SESSION['fi'] = 5;
        }
        return $_SESSION['fi'];
    }

    //Aqui estic fet la sentencia sql i l'enviament de les dades al body per mostrar-les
    function articles(){
        global $fi;
        global $pagina;
        global $paginas;
        global $connexio;
        $resultat = "";
        //Aqui estic agafant a la pagina en la que es troba l'usuari
        if (isset($_GET["pagina"])) {
            $pagina = intval($_GET["pagina"]);
        }

        $fi = opcions();
        $inici = ($pagina - 1) * $fi;

        $sentencia = $connexio->query("SELECT count(*) AS conteo FROM articles");
        $conteo = $sentencia->fetchObject()->conteo;
        $paginas = ceil($conteo / $fi);


        $stmt = $connexio->prepare("SELECT * FROM articles LIMIT $inici, $fi");
        $stmt->execute();

    if(($stmt->execute())){
        while ($dades = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $resultat .= '<li>' . $dades['article_id']. '. ' . $dades['Titol'] . '</li>';
        }
        return $resultat;
    }
    }

    include_once 'Vista/index_vista.php'
    ?>