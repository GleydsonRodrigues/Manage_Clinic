<?php

    // Declaração das variaveis para conexão
    $servidor = "localhost";
    $usuario  = "root";
    $senha    = "";
    $banco    = "pacientes";
    $porta    = "3306";

    // Conexão com o banco
    $conexao = new mysqli($servidor,$usuario,$senha,$banco,$porta);

    // Conectado ao banco? sim ou não
    if(mysqli_connect_errno())
    {
        echo "Falha ao conectar com o banco. ". mysqli_connect_error();
    }
    else
    {
        //echo "Conectado com sucesso!";
    }


?>