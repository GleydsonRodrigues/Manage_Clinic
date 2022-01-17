<?php
if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    
    if(!empty($email) && !empty($senha))
    {
        $u->conectar("login_tcc","localhost","root","");
        if($u->msgErro == "")
        {
            if($u->logar($email,$senha))
            {
                
                header("location: dashboard.html");
            }
            else
            {
                ?>
                <div class="msg-erro">
                    Email e/ou senha estão incorretos!
                </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class="msg-erro">
                <?php echo "Erro: ".$u->msgErro; ?>
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