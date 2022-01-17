<?php

include_once('conecta.php');

if (isset($_POST['update'])) 
{
    $nome = $_POST["nome"];
    $pai = $_POST["pai"];
    $mae = $_POST["mae"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numero"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $sangue = $_POST["sangue"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $sexo = $_POST["sexo"];
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];
    $nascimento = $_POST["nascimento"];

    $sqlUpdate = "UPDATE tblpacientes SET nome='$nome', pai='$pai', mae='$mae', telefone='$telefone', endereco='$endereco', numero='$numero', cidade='$cidade', 
    estado='$estado', sangue='$sangue', cpf='$cpf', email='$email', sexo='$sexo', peso='$peso', altura='$altura', nascimento='$nascimento'
    WHERE procodigo='$codigo'";

    $result = $conexao->query($sqlUpdate);
}
else
    {
        echo "deu ruim";
    }

?>