<?php

class Usuario
{
    private $pdo;
    public $msgErro = "";//tudo ok

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try
        {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e)  {
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $rg, $email, $senha, $tipo)
    {
        global $pdo;
        //verificar se já existe o email cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //já está cadastrado
        }
        else
        {
            //caso nao, Cadastrar 
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, rg, email, senha, tipo) VALUES (:n, :r, :e, :s, :t)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":r",$rg);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":t",$tipo);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;//tudo ok
        }
    }

    public function logar($email, $senha)
    {
        global $pdo;
        //verificar se o email e senha estao cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            //entrar no sistema (sessao)
            $dado = $sql->fetch();
            session_start();
            $_SESSION["id_usuario"] = $dado["id_usuario"];

            
            return true; //cadastrado com sucesso
        }
        else
        {
            return false; //nao foi possivel logar
        }
    }
    public function conferirUsuario($idUsu)
    {
        global $pdo;
        //verificar se o email e senha estao cadastrados, se sim
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = :e AND tipo = 'medico'");
        $sql->bindValue(":e",$idUsu);
        $sql->execute();
        if($sql->rowCount() > 0)
        {        
            return true; //cadastrado com sucesso
        }
        else
        {
            return false; //nao foi possivel logar
        }
    }
}




?>