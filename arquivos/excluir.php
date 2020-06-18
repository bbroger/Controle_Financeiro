<?php 
if(!isset($_SESSION['id'])){
    header("Location: sai.php");
}         
if(isset($_GET['id_excluir'])){ 
    $id_excluir = addslashes($_GET['id_excluir']); 
    
    $ok = $cli->excluir_transacao($link, $id_excluir);
    if($ok == true){
        header("location: index.php");
    }else{
        header("location: index.php?aviso=Ops! Houve algum problema com nosso sistema");
    }

}else{
    
}