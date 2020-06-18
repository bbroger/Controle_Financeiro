<?php 
session_start();
$_SESSION['ide'] = 0;

$require = true;
if (isset($_SESSION['email']) && isset($_SESSION['id'])){
    header('location:index.php');
}
    require('vendor/autoload.php');
    require_once('classes/conexao.php');
    use Cliente\clientes;
    $cli = new clientes;

?>
<!DOCTYPE = html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Controle Financeiro/login</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" media="screen and (max-width: 600px)" href="css/login600.css">
    </head>
    <body>
        <header id="cabecalho">
            <h1><a href="login.php" id="login">Sistema de Controle Financeiro</a></h1>
            <h3>Com este sistema sera bem mais facil saber pra onde seu dinheiro vai!</h3>
        </header>
        <div id="formlogin">
            <?php
                require_once("forms/form2_consultar_login.php");
            ?>
            <form action="login.php" method="post">
                <label for="email">E-Mail</label><br>
                <input type="email" name="email" id="email"><br><br>
                <label for="senha">Senha</label><br>
                <input type="password" name="senha" id="senha"><br><br>
                <input onmau type="submit" value="Entrar" id="submit">
            </form><br><br>

            <?php  ?>
<!-------------------------------Login google--------------------------------------->
            <?php if(!isset($_POST['ativar_google'])){ ?>
            
            <form action="login.php" method="post">
                <input type="hidden" name="ativar_google" value="ativo">
                <input type="image" style="width: 250px;" src="img/btngoogle.png" id="img" title="Logar" alt="Submit Form" />
            </form>
            <?php } 
            if(isset($_POST['ativar_google']) && $_POST['ativar_google'] == "ativo"){
                ?>
            
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            <meta name = "google-signin-client_id" content = "36062110666-7v8k8rh5pn3t1cramr7cdqun01h119vl.apps.googleusercontent.com">
            <div class="g-signin2"   data-onsuccess="onSignIn"   data-width="300px" data-height="100px"></div><br>
            <script>
            
 
            var email;
            function onSignIn(googleUser) {
                var profile = googleUser.getBasicProfile();
                console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                console.log('Name: ' + profile.getName());
                console.log('Image URL: ' + profile.getImageUrl());
                console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  
                email = profile.getEmail();
                nome = profile.getName();
                id = profile.getId();
                window.location.href = "teste.php?email="+email+"&nome="+nome+"&id="+id;
  }
</script>
<?php
}
            ?>
            
            <input onclick="Mudarestado('minhaDiv')" type="submit" value="Criar um Cadastro" id="cadastrar">
            
        </div>

        <div id="minhaDiv" display="none">
            <?php
                require_once('forms/form3_cadastrar_usr.php');    
                echo $email;
            ?>
            <form action="login.php" method="post">
                <label for="nome1">Nome</label><br>
                <input type="text" name="nome1" id="nome1"><br>
                <label for="email1">E-Mail</label><br>
                <input type="email" name="email1" id="email1"><br>
                <label for="senha1">Senha</label><br>
                <input type="password" name="senha1" id="senha1"><br><br>
                <input type="submit" id="submit" value="Cadastrar">
            </form>
        </div> 
        <?php if(isset($_GET['aviso'])){ ?>
            <script>
                Mudarestado('minhaDiv');</script>
           <?php } ?>
    </body>
</html>








<!--
chave
AIzaSyAXsgLFZ4Yeig1iUF2sK8VlAz7MzNmZInE

id cliente
36062110666-7v8k8rh5pn3t1cramr7cdqun01h119vl.apps.googleusercontent.com

chave secreta 
TVxeK1QjHKEkxXsNk6KgVSCU
-->