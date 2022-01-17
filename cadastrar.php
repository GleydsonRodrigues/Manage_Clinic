<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Cadastro</title>
    <Link rel="stylesheet" href="CSS/index.css">
</head>
<body>
<div id="corpo-form-cad">
    <h1>Cadastre-se</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
        <input type="number" name="rg" placeholder="CPF" maxlength="30">
        <input type="email" name="email" placeholder="Email" maxlength="40">
        <input type="password" name="senha" placeholder="Senha" maxlength="15">
        <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
        <input type="submit" value="CADASTRAR"> 
        <input type="button" value="VOLTAR" onClick="history.go(-1)"> 
    </form> 
</div>
<?php
//verificar se clicou no botao
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $rg = addslashes($_POST['rg']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);
    $tipo =addslashes($_POST['check']);
    //verificar se esta preenchido
    if(!empty($nome) && !empty($rg) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
    {
        $u->conectar("login_tcc","localhost","root","");
        if($u->msgErro == "")//se esta tudo ok
        {
            if($senha == $confirmarSenha)
            {
                if($u->cadastrar($nome,$rg,$email,$senha,$tipo))
                {
                    ?>
                    <div id="msg-sucesso">
                    Cadastrado com sucesso! Acesse para entrar!
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                    Email já cadastrado!
                    </div>
                    <?php
                }
            }
            else
            {
                    ?>
                    <div class="msg-erro">
                    Senha e confirmar senha não correspondem!
                    </div>
                    <?php
            }
        }
        else
        {
                    ?>
                    <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro;?>
                    </div>
                    <?php
        }
    }else
    {
                    ?>
                    <div class="msg-erro">
                    Preencha todos os campos!
                    </div>
                    <?php
    }
}


?>
</body>
</html>