<?php
    if(!isset($_SESSION['id'])){
        header("Location: sai.php");
    } 
    if(isset($_GET['id_excluir'])){
        $id_excluir = addslashes($_GET['id_excluir']);
        $res = $cli->excluir_comercio($link, $id_excluir);
        if($res == 1){
            echo "<script language='javaScript'>window.location.href='comercio.php'</script>";
        }else{
            echo "<p id='erro'>ERRO!</p>";
        }
    }
?>