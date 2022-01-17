<?php

include_once('conecta.php');


if(isset($_POST['update'])){

    $codigo = $_GET["id"];

    $nomeNovo = $_POST["txtnome"];
    $paiNovo = $_POST["txtnomepai"];
    $maeNovo = $_POST["txtnomemae"];
    $telefoneNovo = $_POST["txttelefone"];
    $enderecoNovo = $_POST["txtendereco"];
    $numeroNovo = $_POST["txtnumero"];
    $cidadeNovo = $_POST["txtcidade"];
    $estadoNovo = $_POST["txtestado"];
    $sangueNovo = $_POST["txtsangue"];
    $cpfNovo = $_POST["txtcpf"];
    $emailNovo = $_POST["txtemail"];
    $sexoNovo = $_POST["txtsexo"];
    $pesoNovo = $_POST["txtpeso"];
    $alturaNovo = $_POST["txtaltura"];
    $nascimentoNovo = $_POST["txtnascimento"];


$sql = "Update tblpacientes 
            set nome = '$nomeNovo',
            pai = '$paiNovo',
            mae = '$maeNovo',
            telefone = '$telefoneNovo',
            endereco = '$enderecoNovo',
            numero = '$numeroNovo',
            cidade = '$cidadeNovo',
            estado = '$estadoNovo',
            sangue = '$sangueNovo',
            cpf = '$cpfNovo',
            email = '$emailNovo',
            sexo = '$sexoNovo',
            peso = '$pesoNovo',
            altura = '$alturaNovo',
            nascimento  = '$nascimentoNovo'

            WHERE procodigo = $codigo;";
// Executa a string no banco
if($conexao->query($sql)){


    echo "terminado";
}else{
    echo "não feito";
}


}

if (isset($_GET["id"])) 
{




    
    $codigo = $_GET["id"];

    $sqlSelect = "SELECT * FROM tblpacientes WHERE procodigo=$codigo";
    // Executa a string no banco
    $query = $conexao->query($sqlSelect);
    // Laço que tras as informações
    while ($linha = $query->fetch_array()) {
            $nome = $linha["nome"];
            $pai = $linha["pai"];
            $mae = $linha["mae"];
            $telefone = $linha["telefone"];
            $endereco = $linha["endereco"];
            $numero = $linha["numero"];
            $cidade = $linha["cidade"];
            $estado = $linha["estado"];
            $sangue = $linha["sangue"];
            $cpf = $linha["cpf"];
            $email = $linha["email"];
            $sexo = $linha["sexo"];
            $peso = $linha["peso"];
            $altura = $linha["altura"];
            $nascimento = $linha["nascimento"];
        }

    } else {

        echo '
             <div class="alert alert-danger alert-dismissible fade show" id="msgerro" role="alert">
                 Não foi possível cadastrar o paciente!  Verifique os dados e tente novamente!
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
             ';
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

        <form method="POST">
            <h1>FICHA CADASTRAL</h1>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtnome" id="txtnome" maxlength="200" value="<?php echo $nome ?>" required />
                    <label>Nome Completo</label>
                </div>
            </fieldset>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtnomepai" id="txtnomepai" maxlength="200" value="<?php echo $pai ?>" required>
                    <label>Nome Pai</label>
                </div>


                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtnomemae" id="txtnomemae" maxlength="200" value="<?php echo $mae ?>" required>
                    <label>Nome Mãe</label>
                </div>
            </fieldset>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" name="txtemail" id="txtemail" maxlength="200" value="<?php echo $email ?>" required>
                    <label>E-mail</label>
                </div>
            </fieldset>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="number" name="txttelefone" id="txttelefone" maxlength="9" value="<?php echo $telefone ?>" required>
                    <label>Telefone Principal</label>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="number" name="txtcpf" id="txtcpf" maxlength="30" value="<?php echo $cpf ?>" required>
                    <label>CPF</label>
                </div>
            </fieldset>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="number" name="txtpeso" id="txtpeso" maxlength="3" value="<?php echo $peso ?>" required>
                    <label>Peso ( KG )</label>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="number" name="txtaltura" id="txtaltura" maxlength="3" value="<?php echo $altura ?>" required>
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
                    <input type="text" name="txtendereco" id="txtendereco" maxlength="500" value="<?php echo $endereco ?>" required>
                    <label>Endereço</label>
                </div>
            </fieldset>

            <fieldset>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="number" name="txtnumero" id="txtnumero" maxlength="5" value="<?php echo $numero ?>" required>
                    <label>Número</label>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtcidade" id="txtcidade" maxlength="200" value="<?php echo $cidade ?>" required>
                    <label>Cidade</label>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtestado" id="txtestado" maxlength="200" value="<?php echo $estado ?>" required>
                    <label>Estado</label>
                </div>

            </fieldset>

            <fieldset>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="txtsangue" id="txtsangue" maxlength="5" value="<?php echo $sangue ?>" required>
                    <label>Tipo Sanguíneo</label>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="date" name="txtnascimento" id="txtnascimento" maxlength="200" value="<?php echo $nascimento ?>" required>
                    <label></label>
                </div>
            </fieldset>

            <input type="hidden" name="procodigo" value="<?php echo $codigo?>">
            <button type="submit" name="update" id="update">SALVAR</button>
            <a href="../pacientes.php" id="voltar" class="btn">Voltar</a>

        </form>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>