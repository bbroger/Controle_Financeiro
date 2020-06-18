                
<?php 
    $comercio = $cli->retorna_comercio($link, 41);
    if(isset($_GET['id_transacao'])){
        $id = addslashes($_GET['id_transacao']);
    }
    if(isset ($_POST["data6"])){
        $id= addslashes($_POST['id']);
        $data1 = addslashes($_POST["data6"]);
        $comercio1 = addslashes($_POST["comercio6"]);
        $descricao1 = addslashes($_POST["descricao6"]);
        $valor1 = addslashes($_POST["valor6"]);
        $query = "UPDATE cadastrados SET data = '{$data1}', descricao = '{$descricao1}', valor = '{$valor1}',comercio = '{$comercio1}' WHERE cadastrados.id = '{$id}'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        echo "<script language='javaScript'>window.location.href='index.php'</script>";
    
    }else{ 
        $tran = $cli->mostrarUmaTransacao($link, $id);
        $tra = mysqli_fetch_array($tran); 
        $valor6 = number_format($tra['valor'], "2", ".", "")
        ?>
        <form action="edita.php" id="editacadastro" method="post"> 
            <label for="data"><p>Data: </p></label>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="date" required="required" name="data6" value="<?=$tra['data']?>" id="data"><br><br>
            <label for="comercio"><p>Comercio Envolvido</p></label>
            <select name="comercio6" id="comercio" value="<?=$tra['comercio']?>">        <?php   //iniciando o loop dos comercios
            while ($comercios = mysqli_fetch_assoc($comercio)) {
                $com = $comercios['comercio']; ?>
                <option value="<?=$com?>"><?=$com?></option>  <?php } ?>
            </select>
            <!--<input type="text" required="required" name="comercio1" id="comercio" type="text"/><br><br>-->     <label for="descricao"><p>Descrição:</p> </label>
            <input type="text" name="descricao6" id="descricao" value="<?=$tra['descricao']?>" ><br><br>
            <label for="valor" id="f4"><p>Valor:</p> </label>
            <input required="required" name="valor6" id="valor" value="<?=$valor6?>" placeholder="00.00 apenas numero e ." type="text" pattern="[0-9]{1,}\.{0,}[0-9]{0,2}"><br><br>
            <input type="submit" id="btnf6" value="Confirmar">
        </form>     
        <?php
    }  
        ?>