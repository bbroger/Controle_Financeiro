<?php 
if(!isset($_SESSION['id'])){
    header("Location: sai.php");
} 
$atrasado = $cli->atrasados($link, $_id_usuario, "Saida");
if($atrasado[1] > 1){
    $atrasados = $atrasado[1];
    $aviso_atraso = $atrasados." contas atrasadas";
}elseif($atrasado[1] == 1){
    $atrasados = $atrasado[1];
    $aviso_atraso = $atrasados." conta atrasada";
}else{
    $aviso_atraso = "";
}
$receber_atrasado = $cli->atrasados($link, $_id_usuario, "Entrada");
if($receber_atrasado[1] > 0){
    $recebe_atrasados = $receber_atrasado[1];
    $aviso_recerber_atraso = " e ".$recebe_atrasados." para receber!";
}else{
    $aviso_recerber_atraso = "";
}
$total = $cli->saldo($link, $_id_usuario); //retorna array com tres valores: $total["total"] - $total["renda"] - $total["despesa"] 
$saldo = number_format($total['total'], 2, ".", " ");
?>

<div id="logo"></div>
<nav>
    <ul><li id="btn"><a href="arquivos/sair.php" class="a"><img title="SAIR" src="img/icon/sair.png" alt=""></a></li></ul>
    <ul><li><a href="index.php?inicia_calendario=1" title="Pagina inicial" class="">Inìcio /</a></li></ul>
    <ul><li><a href="comercio.php" title="Lista de comércios cadastrados" class="a">Comercios /</a></li></ul>
    <ul><li><a href="nova_transacao.php" title="Inserir nova conta" class="a">Nova Transação /</a></li></ul>
    <ul><li><a href="novo_comercio.php" title="Cadastrar novo comércio" class="a">Novo Comércio /</a></li></ul>
    <ul><li><a href="atrasados.php" title="Lista de contas atrasadas" class="a">Atrasados /</a></li></ul>
    

</nav>
<a href="index.php" style="text-decoration:none"> <h1>Controle Financeiro</h1></a>

<div class="comprimento">
    <?php
        echo "<br>Olá ".$_SESSION['nome']."!<br>Saldo: R$ ".$saldo."<br>Gerencie suas finanças com facilidade!<br><p id='atraso'><a href='atrasados.php' style='text-decoration: none; color: red;'>".$aviso_atraso." ".$aviso_recerber_atraso."</a></p>";
        
    ?>

</div>


    


