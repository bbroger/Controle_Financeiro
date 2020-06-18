<?php 

require_once("sessao.php");
if(isset($_GET['id_excluir'])){ 
    $id= addslashes($_GET['id_excluir']); ?>
    <script>
        var retorno = confirm("Excluir este cadasto!");
        if (retorno == true){
            window.location.href = "../index.php?id_excluir=<?=$id?>";
        }else{
            window.location.href = "../index.php";
        }
        document.write(mensagem);
    </script>
    <?php
}else {
    header("Location: sai.php");
}