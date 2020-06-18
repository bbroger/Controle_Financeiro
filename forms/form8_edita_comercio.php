<?php
    
    if(isset($_GET['id_transacao'])){
        $id = addslashes($_GET['id_transacao']);  
        $retorno = $cli->retorna__comercio($link, $id);
        $dadoss = $retorno[0];
        $tes = $retorno[1];
        ?>
        <h3>Novo Comércio</h3>
        <form id="ncomercio" action="edita_comercio.php" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <label for="nome">Nome Do Comércio</label><br>
            <input type="text" value="<?=$dadoss['comercio']?>" name="nome" id="nome"><br><br>
            <label for="classe">Classe do Comércio</label><br>
            <input type="text" name="classe" value="<?=$dadoss['classe']?>" id="classe"><br><br><br><br>
            <input id="sub" type="submit" value="Atualizar">
        </form> <?php
    }else if(isset($_POST['nome']) && isset($_POST['classe'])){
        $nome = addslashes($_POST['nome']);
        $classe = addslashes($_POST['classe']);
        $id = addslashes($_POST['id']);
        $edita = $cli->edita_comercio($link, $id, $nome, $classe);
        if($edita == 1){
            echo "<script language='javaScript'>window.location.href='comercio.php'</script>";
        
        }

    }else{ 
        header("Location: comercio.php");            
    } ?>