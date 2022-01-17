<?php
include "conecta.php";
if (isset($_GET["txtnome"])) {
    $nome = $_GET["txtnome"];
    $pai = $_GET["txtnomepai"];
    $mae = $_GET["txtnomemae"];
    $telefone = $_GET["txttelefone"];
    $endereco = $_GET["txtendereco"];
    $numero = $_GET["txtnumero"];
    $cidade = $_GET["txtcidade"];
    $estado = $_GET["txtestado"];
    $sangue = $_GET["txtsangue"];
    $cpf = $_GET["txtcpf"];
    $email = $_GET["txtemail"];
    $sexo = $_GET["txtsexo"];
    $peso = $_GET["txtpeso"];
    $altura = $_GET["txtaltura"];
    $nascimento = $_GET["txtnascimento"];

    $comando = "INSERT INTO `tblpacientes` (`procodigo`, `nome`, `pai`,`mae`, `telefone`,`endereco`, `numero`,`cidade`, `estado`, `sangue`, `cpf`, `email`, `sexo`, `peso`, `altura`, `nascimento`)
         VALUES (NULL, '$nome', '$pai','$mae', '$telefone','$endereco', '$numero','$cidade', '$estado', '$sangue', '$cpf', '$email', '$sexo', '$peso', '$altura', '$nascimento')";

    if (!$conexao->query($comando)) {
        echo '
             <div class="alert alert-danger alert-dismissible fade show" id="msgerro" role="alert">
                 Não foi possível cadastrar o paciente!  Verifique os dados e tente novamente!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
             ';
    } else {
        // se conseguiu cadastrar

        echo '
            <div class="alert alert-success alert-dismissible fade show" id="msgsucesso" role="alert">
            Paciente cadastrado com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <title>CADASTRO</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../CSS/inserir.css" rel="stylesheet">

</head>

<body>

    <div id="parallelogram"></div>

    <section>

        <form action="">
            <h1>FICHA CADASTRAL</h1>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtnome" id="txtnome" maxlength="200" required />
                    <label>Nome Completo</label>
                </div>
            </fieldset>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtnomepai" id="txtnomepai" maxlength="200" required>
                    <label>Nome Pai</label>
                </div>


                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtnomemae" id="txtnomemae" maxlength="200" required>
                    <label>Nome Mãe</label>
                </div>
            </fieldset>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" name="txtemail" id="txtemail" maxlength="200" required>
                    <label>E-mail</label>
                </div>
            </fieldset>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="number" name="txttelefone" id="txttelefone" maxlength="9" required>
                    <label>Telefone Principal</label>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="number" name="txtcpf" id="txtcpf" maxlength="30" required>
                    <label>CPF</label>
                </div>
            </fieldset>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="number" name="txtpeso" id="txtpeso" maxlength="3" required>
                    <label>Peso ( KG )</label>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="number" name="txtaltura" id="txtaltura" maxlength="3" required>
                    <label>Altura ( CM )</label>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    
                    <select name="txtsexo" id="txtsexo">
                        <option value="Sexo"> Sexo </option>
                        <option value="Masculino"> Masculino </option>
                        <option value="Feminino"> Feminino </option>
                        <option value="Outro"> Outro </option>
                    </select>
                </div>
            </fieldset>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtendereco" id="txtendereco" maxlength="500" required>
                    <label>Endereço</label>
                </div>
            </fieldset>

            <fieldset>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="number" name="txtnumero" id="txtnumero" maxlength="5" required>
                    <label>Número</label>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtcidade" id="txtcidade" maxlength="200" required>
                    <label>Cidade</label>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtestado" id="txtestado" maxlength="200" required>
                    <label>Estado</label>
                </div>

            </fieldset>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtsangue" id="txtsangue" maxlength="5" required>
                    <label>Tipo Sanguíneo</label>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="date" name="txtnascimento" id="txtnascimento" maxlength="200" required>
                    <label></label>
                </div>
            </fieldset>


            <button type="submit" name="submit" id="submit">SALVAR</button>
            <a href="../pacientes.php" id="voltar" class="btn">Voltar</a>

        </form>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>