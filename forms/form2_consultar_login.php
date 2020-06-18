<?php 

if(isset($_GET['aviso'])){
    echo "<h4 id='aviso'>".$_GET['aviso']."</h4>"; 
} ?>

<?php  
    if(isset($_POST['email']) && isset($_POST['senha'])){
        $senha = addslashes($_POST["senha"]);
        $senha = preg_replace('/[^[:alnum:]_]/', '',$senha);
        $email = addslashes($_POST["email"]);
        $res = $cli->consultarUsr($link, $email, $senha);
        echo "<br>-----".$res['email'];
        $_SESSION['email'] = $res['email'];
        $_SESSION['nome'] = $res['nome'];
        $_SESSION['id'] = $res['id'];
        if(isset($res['id'])){
            header('location:index.php');
        }
    }
?>       
       