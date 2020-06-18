<?php
session_start();
    require('vendor/autoload.php');
    require_once('classes/conexao.php');
    use Cliente\clientes;
    $cli = new clientes;

    if(isset($_GET['nome'])){
        $nome = addslashes($_GET['nome']);
        $email = addslashes($_GET['email']);
        $senha = addslashes($_GET['id']);
        $senha = "id_google".$senha;
        $query = "SELECT * FROM usuario WHERE email = '{$email}' && senha = '{$senha}'";
        $result = mysqli_query($link, $query);
        $con = mysqli_affected_rows($link);
        //echo $con;
        if ($con == 0){
            $queri = "INSERT INTO usuario (nome, email, senha) VALUES ('{$nome}', '{$email}', '{$senha}')";
            mysqli_query($link, $queri);
            $con2 = mysqli_affected_rows($link);
            if($con2 == 1){
            $quer = "SELECT * FROM usuario WHERE email = '{$email}' && senha = '{$senha}'";
            $dados = mysqli_query($link, $quer);
            $dado = mysqli_fetch_array($dados);
            $_SESSION['id'] = $dado['id'];
            $_SESSION['nome'] = $dado['nome'];
            $_SESSION['email'] = $dado['email'];
            header("Location: index.php");}
        }elseif($con == 1){
            $quer = "SELECT * FROM usuario WHERE email = '{$email}' && senha = '{$senha}'";
            $dados = mysqli_query($link, $quer);
            $dado = mysqli_fetch_array($dados);
            $_SESSION['id'] = $dado['id'];
            $_SESSION['nome'] = $dado['nome'];
            $_SESSION['email'] = $dado['email'];
            header("Location: index.php");
        }

                        
    }
           
?>
