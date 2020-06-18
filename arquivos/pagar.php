<?php
if(!isset($_SESSION['id'])){
  header("Location: sai.php");
}
if(isset($_GET['id_pagar'])){
    $pag = $_GET['pag'];
    $pago = addslashes($_GET['id_pagar']);
    $query = "UPDATE cadastrados SET pago = 1 WHERE cadastrados.id = '{$pago}'";
    mysqli_query($link, $query);
    if(mysqli_affected_rows($link) > 0){
        header("Location: $pag?aviso=Pagamento feito com sucesso!");
      }else{
        echo "Aviso: Não foi atualizado!";
    }
}
?>