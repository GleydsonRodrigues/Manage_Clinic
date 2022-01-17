<?php
//verificar se clicou no botao

if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $rg = addslashes($_POST['rg']);
    $email = addslashes($_POST['emailCAD']);
    $senha = addslashes($_POST['senhaCAD']);
    $confirmarSenha = addslashes($_POST['confSenha']);
    $tipo = addslashes($_POST['check']);


    //verificar se esta preenchido
    if(!empty($nome) && !empty($rg) && !empty($email) && !empty($senha) && !empty($confirmarSenha) && !empty($tipo))
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