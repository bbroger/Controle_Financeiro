<?php
require_once("sessao.php");
if(isset($_GET['id_excluir'])){ 
    $id= addslashes($_GET['id_excluir']); ?>
    <script>
        var retorno = confirm("Excluir este cadasto!");
        if (retorno == true){
            window.location.href = "../comercio.php?id_excluir=<?=$id?>";
        }else{
            window.location.href = "../comercio.php";
        }
    </script>
<?php
}else{
    header("Location: sai.php");
}