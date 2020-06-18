<?php
if(!isset($_SESSION['id'])){
    header("Location: sai.php");
}  ?>
<div id="tabela">
<h3>Lista de Comércios cadastrados</h3>
                <table>
                    <tr>
                        <td id="nome">Nome do comercio</td>
                        <td id="class">Classe</td>
                        <td id="opcoes">Opções</td>
                    </tr>
                </table>

                <?php  
                $comercio = $cli->lista_de_comercios($link, $_id_usuario);
                $branco = true;
                while($resu = mysqli_fetch_assoc($comercio)){
                    $nome = $resu['comercio'];
                    $clas = $resu['classe']; 
                    $id_comercio = $resu['id'];
                    $situacao = "<a href='arquivos/confirma_exclusao_comercio.php?id_excluir=".$id_comercio."'><img title='Excluir Comércio' src='img/icon/excluirrr.png'/> </a> 
                            <a href='edita_comercio.php?id_transacao=".$id_comercio."'><img title='Editar dados' src='img/icon/editar.png'/> </a>";
                
                    if($branco == true){ 
                        $branco = false;   ?>
                        <table >
                            <tr id="branca">
                                <td id="nome"><?=$nome?></td>
                                <td id="class"><?=$clas?></td>
                                <td id="opcoes"><?=$situacao?></td>
                            </tr>
                        </table> <?php 
                    }else{
                        $branco = true;   ?>
                        <table >
                            <tr id="cinza">
                                <td id="nome"><?=$nome?></td>
                                <td id="class"><?=$clas?></td>
                                <td id="opcoes"><?=$situacao?></td>
                            </tr>
                        </table> <?php
                    }    
                }
                    
                
                
                ?>
                </div>