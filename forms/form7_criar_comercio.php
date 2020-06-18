<?php
                if(isset($_POST['nome']) && isset($_POST['classe'])){
                    $nome = addslashes($_POST['nome']);
                    $classe = addslashes($_POST['classe']);
                    $res = $cli->cadastra_comercio($nome, $classe, $link, $_id_usuario);
                    if($res == 1){
                        echo "<script language='javaScript'>window.location.href='novo_comercio.php'</script>";
                    }
                }else{    
                ?> <br><br>
                <h3>Novo Comércio</h3>
                    <form id="ncomercio" action="novo_comercio.php" method="post">
                        <label for="nome">Nome Do Comércio</label><br>
                        <input type="text" name="nome" id="nome"><br><br>
                        <label for="classe">Classe do Comércio</label><br>
                        <input type="text" name="classe" id="classe"><br><br><br><br>
                        <input id="sub" type="submit" value="Cadastrar">
                    </form>
                <?php } ?>