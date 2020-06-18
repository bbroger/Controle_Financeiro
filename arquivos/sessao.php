<?php
session_start();
$require = true; 
if (isset($_SESSION['email']) && isset($_SESSION['id'])){
    $_id_usuario = $_SESSION['id'];
    if(isset ($_POST["data1"]) && isset ($_POST["entrada1"])){
        $mess = addslashes($_POST["data1"]);
        $mes = explode("-", $mess);
        $_SESSION['mtabela'] = $mes[1];
        $_SESSION['atabela'] = $mes[0];
        $_SESSION['despesa_renda'] = $_POST["entrada1"];
    }
    
    if(isset($_SESSION['mtabela']) ){
        $_mes_atual = $_SESSION['mtabela'];
        $_despesa_renda = $_SESSION['despesa_renda'];
        if(isset($_SESSION['atabela'])){
            $_ano_atual = $_SESSION['atabela'];
        }
    }else{
    $_mes_atual = date("m");
    $_despesa_renda= 'Saida';
    $_ano_atual = date("Y");
    }
    if(isset($_GET['inicia_calendario'])){
        $_mes_atual = date("m");
        $_SESSION['mtabela'] = $_mes_atual;
        $_despesa_renda= 'Saida';
        $_SESSION['despesa_renda'] = $_despesa_renda;
        $_ano_atual = date("Y");
        $_SESSION['atabela'] = $_ano_atual;
    }
    $_ano = date("Y");
     
    
    

    /*echo "<br>".$_SESSION['nome'];
    echo "<br>".$_SESSION['id']; */
}else{
    header('location:sai.php');
}


?>
