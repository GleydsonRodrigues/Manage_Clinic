<?php

if (isset($_GET["id"])) 
{
    include_once('conecta.php');
    
    $id = $_GET["id"];

    $sqlSelect = "DELETE FROM tblpacientes WHERE procodigo=$id";

    if ($conexao->query($sqlSelect)) {
       header('location: ../pacientes.php');
    }else{
        echo "problema ao excluir o cadastro do paciente";
    }
    

}
      

?>