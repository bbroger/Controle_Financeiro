<form id="form4" action="index.php" method="post">
    <label id="form4"  for="form4">Consulta por Mes / Ano: </label><br><br>
    <input type="number" name="ano4" id="form4" value="2020" placeholder="<?=$_ano_atual?>">
    <select id="form4"  name="mes4">
        <option value="01">Janeiro</option>
        <option value="02">Fevereiro</option>
        <option value="03">Março</option>
        <option value="04">Abril</option>
        <option value="05">Maio</option>
        <option value="06">Junho</option>
        <option value="07">Julho</option>
        <option value="08">Agosto</option>
        <option value="09">Setembro</option>
        <option value="10">Outubro</option>
        <option value="11">Novembro</option>
        <option value="12">Dezembro</option>
    </select>
    <select id="form4"  name="entrada_saida4">
        <option value="Saida">Despesa</option>
        <option value="Entrada">Renda</option>
    </select>
    <input type="image" src="img/icon/pesquisa.png" id="img" title="Buscar" alt="Submit Form" />
</form>
<?php
    if(isset($_POST['mes4'])){
        $mes4 = addslashes($_POST['mes4']);
        $ano4 = addslashes($_POST['ano4']);
        $entrada_saida4 = addslashes($_POST['entrada_saida4']);
        $_SESSION['mtabela'] = $mes4;
        $_SESSION['atabela'] = $ano4;
        $_SESSION['despesa_renda'] = $entrada_saida4;
        $form4 = true; 
    }else{
        $form4 = false;
    } 
?>    