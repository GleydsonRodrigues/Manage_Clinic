<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="CSS/login.css" />
    <title>TESTE TCC</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

                <form method="POST" class="sign-in-form">

                    <h2 class="login">LOGIN</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>

                        <input type="email" name="email" placeholder="Usuário" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>

                        <input type="password" name="senha" placeholder="Senha" />
                    </div>

                    <input type="submit" value="ACESSAR" class="btn solid" name="LOGIN" />
                </form>

                <?php
                if (isset($_POST['LOGIN'])) {
                    include_once "BOTÕES/BTNlogin.php";
                }
                ?>




                <form method="POST" class="sign-up-form">
                    <h2 class="cadastro">CADASTRO</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nome" placeholder="Nome Completo" maxlength="30" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-address-card"></i>
                        <input type="number" name="rg" placeholder="CPF" maxlength="30" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="emailCAD" placeholder="E-mail" maxlength="40" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="senhaCAD" placeholder="Senha" maxlength="15" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-check-double"></i>
                        <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15" />
                    </div>


                    <script type="text/javascript">
                        function ShowHideDiv() {
                            var medico = document.getElementById("medico");
                            var crm = document.getElementById("crm");
                            crm.style.display = medico.checked ? "block" : "none";
                        }
                    </script>

                    <div class="funcionario">
                        <label for="Funcionario">
                            <input type="radio" id="funcionario" name="check" onclick="ShowHideDiv()" VALUE="funcionario" />
                            FUNCIONÁRIO
                        </label>
                    </div>

                    <div class="medico">
                        <label for="Médico">
                            <input type="radio" id="medico" name="check" onclick="ShowHideDiv()" VALUE="medico" />
                            MÉDICO
                        </label>
                    </div>
                    <hr />

                    <div class="crm-field" id="crm">
                        DIGITE O CRM:
                        <input type="number" name="crm" id="crm" style="width: 280px;" />
                    </div>

                    <input type="submit" value="CADASTRAR" class="btn solid" name="CADASTRAR">
                </form>

                <?php
                if (isset($_POST['CADASTRAR'])) {
                    include_once "BOTÕES/BTNcadastro.php";
                }
                ?>



            </div>
        </div>


        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>É novo por aqui ?</h3>
                    <p>
                        Clique no botão abaixo e faça seu cadastro de funcionário da UPA.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        CADASTRAR
                    </button>
                </div>
                <img src="IMAGENS/login.svg" class="image" alt="" />
            </div>


            <div class="panel right-panel">
                <div class="content">
                    <h3>Já fez seu cadastro ?</h3>
                    <p>
                        Volte à tela de LOGIN e acesse o sistema.
                        <BR>
                        Bom Trabalho!
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        LOGIN
                    </button>
                </div>
                <img src="IMAGENS/cadastro.svg" class="image" alt="" />
            </div>
        </div>

    </div>


    <script src="JAVA/login.js"></script>
</body>

</html>