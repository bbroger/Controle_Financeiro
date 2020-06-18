
<script>
    function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "block")
            document.getElementById(el).style.display = 'none';
        else
            document.getElementById(el).style.display = 'block';
    }
</script>
    <?php 
        if(isset($_POST['nome1'])){
            $nome1 = addslashes($_POST['nome1']);
            $email1 = addslashes($_POST['email1']);
            $senha1 = addslashes($_POST['senha1']);
            $resu = $cli->cadastraUsuario($link, $nome1, $email1, $senha1);
            //var_dump($resu);

            if($resu == 1){
                $res = $cli->consultarUsr($link, $email1, $senha1);
                $_SESSION['email'] = $res['email'];
                $_SESSION['nome'] = $res['nome'];
                $_SESSION['id'] = $res['id'];
                if(isset($res['id'])){
                    header('location:index.php');
                }
            }else{
                header('location:login.php?aviso=Este email já está cadastrado!');
            }
        }    
    ?>

