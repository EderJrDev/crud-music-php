<?php 
include 'conexao.php';

    $acao = $_POST["acao"]; 

    switch ($acao) {
        case "create":
            store($_POST);
            break;
        case "create_music":
            echo music($_POST);
            break;
        case "index":
            echo json_encode(artistas()); // transformando em json json = string
            break;
        default:
            # code...
            break;
    }
    function store($req){
        // return "{$req['nome']}";
        global $db;
        // $nome_artista = $_POST['nome_artista'];

    $query =  "INSERT INTO artistas(nome_artista) VALUES ('{$req['nome']}')";
    $exec_query = mysqli_query($db, $query);
    
    return($exec_query);

     // $result = mysqli_query($db, "INSERT INTO artistas(nome_artista) VALUES ('$nome_artista')") or die(mysqli_error($db));
    }
    function music($req){
        global $db;

        $query = "INSERT INTO musicas(nome_musica, id_artista) VALUES ('{$req['nome']}','{$req['artista']}')";
        $exec_query = mysqli_query($db, $query);

        return($exec_query);

    }
    function artistas(){
        global $db;

        $query = "SELECT * FROM artistas "; // monta a carry que busca os artistas
        $exec_query = mysqli_query($db, $query);

        $artista = $exec_query->fetch_all(MYSQLI_ASSOC);

        return($artista);
    }
?>