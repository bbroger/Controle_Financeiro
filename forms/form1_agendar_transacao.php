<?php //trocar o 1 pelo id do usuario

$comercio = $cli->retorna_comercio($link, $_id_usuario); ?>
<h2 id="titulo">Nova Transação</h2>
<form action="index.php" id="novocadastro" method="post"> 
    <label for="data"><p>Data Da primeira parcela: </p></label>
    <input type="date" required="required" name="data1" id="data"><br><br>
    <label for="comercio"><p>Nome do Comércio</p></label>
    
    <a href="novo_comercio.php" title="Cadastrar novo comércio" style="color: white; background-color:turquoise;">Novo Comércio</a>
    <select name="comercio1" id="comercio">
        <?php   //iniciando o loop dos comercios
        while ($comercios = mysqli_fetch_assoc($comercio)) {
        $com = $comercios['comercio']; 
        echo "<option value='$com'>$com</option>";   } ?>
    </select>
    <label for="descricao1"> <p>Descrição</p> </label>
    <input type="text" name="descricao1" id="descricao"><br><br>
    <label for="qparcelas"><p>Quantidade de Parcelas: </p></label>
    <input type="number" value="1" name="nparcelas1" min="1" placeholder="No máximo 12 parcelas" required="required" max="12" id="qparcelas"><br><br>
    <label for="valor" id="f4"><p>Valor da Parcela:</p> </label>
    <input required="required" name="valor1" id="valor" min="1" placeholder="00.00 apenas numero e ." type="text" pattern="[0-9]{1,}\.{0,}[0-9]{0,2}"><br><br>
    <label for="entrada"><p title="Você vai pagar ou receber?" >Cadastrar Renda ou Despesa</p></label>
    <select name="entrada1" title="Você vai pagar ou receber?" id="entrada">
        <option value="Saida">Pagar</option>
        <option value="Entrada">Receber</option>
    </select><br><br>
    <input type="submit" id="btnf1" value="Cadastrar">
</form>
<?php
if(isset ($_POST["data1"])){
    $data1 = addslashes($_POST["data1"]);
    $comercio1 = addslashes($_POST["comercio1"]);
    $nParcelas1 = addslashes($_POST["nparcelas1"]);
    if(isset ($_POST["descricao1"])){
        $descricao1 = addslashes($_POST["descricao1"]);
        if($descricao1 == ""){
            $descricao1 = "Sem descricao";
        }
    }else{
        $descricao1 = "Sem descricao";
    }
    $valor1 = addslashes($_POST["valor1"]);
    $entrada1 = addslashes($_POST["entrada1"]);
    $form1 = true;                      
}
if(isset($form1) && $form1 == true){
    $re = $cli->agendarEntradaSaida($link, $_id_usuario, $data1, $descricao1, $valor1, $entrada1, $nParcelas1, $comercio1);
        if($re > $nParcelas1){
            header("Location: index.php");
        }    
    }
    ?>