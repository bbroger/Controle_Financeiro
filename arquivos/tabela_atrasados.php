<?php

$retorno = $cli->atrasados($link, $_id_usuario, "Saida");
$retorno2 = $cli->atrasados($link, $_id_usuario, "Entrada");

?>
<h3>Lista de Parcelas Atrasadas</h3>
<table>
    <tr class="cabeca">
        <td class="nome" width="150px">Nome</td>
        <td class="descricao" width="300px">Descrição</td> 
        <td class="valor" width="120px">Valor</td> 
        <td class="vencimento" width="120px">Vencimento</td>   
        <td class="valor" width="100px">Opções</td>
     </tr>
</table>
<?php
 $branco = true; // VAR QUE VAI DEFINIR A COR DA LINHA DA TABELA

 //TRABALHANDO OS DADOS RECEBIDOS DO BANCO DE DADOS PRA TABELA
 $total = 0;
if($retorno[1] > 0){
    foreach($retorno['0'] as $n => $dadosTabela):
        $valor = number_format($dadosTabela['valor'], '2', '.', '');
                            $valor = "R$ ".$valor;
                            $datas = $dadosTabela['data'];
                            $entrada_saida = $dadosTabela['entrada_saida'];
                            if($entrada_saida == "Entrada"){ $titIcone = "Receber Pabamento";} else {$titIcone = "Pagar";}
                            $id_transacao = $dadosTabela['id'];
                            $data = date("d/m/Y", strtotime($datas));
                            $total+=$dadosTabela['valor'];
                                                   //caso ainda esteja em aberto
                                $situacao = "<a title='pagar' id='face' href='index.php?id_pagar=".$id_transacao."&pag=atrasados.php'><img title='$titIcone' src='img/icon/paga.png'/></a> 
                                <a href='arquivos/confirma_exclusao.php?id_excluir=".$id_transacao."'><img title='Excluir parcela' src='img/icon/excluirrr.png'/> </a> 
                                <a href='edita.php?id_transacao=".$id_transacao."'><img title='Editar dados' src='img/icon/editar.png'/> </a>";
                            
                                //$situacao = "Em Aberto";
                             //---------------------------------------------
                            
                            //----TABBELA COM A LINHA BRANCA-->
                            if($branco == true){  //fim php ?>  
                               <table>
                                    <tr class="cabeca" id="branco">
                                        <td class="nome" width="150px"><?=$dadosTabela['comercio']?></td>
                                        <td max-lenght="20" class="descricao" width="300px"><?=$dadosTabela['descricao']?></td> 
                                        <td class="valor" width="120px"><?=$valor?></td> 
                                        <td class="vencimento" width="120px"><?=$data?></td>
                                        <td class="valor" width="100px"><?=$situacao?></td>   
                                    </tr>
                                </table> <?php //Inicio php 
                                $branco = false; //MUDANDO A COR  DA LINHA DA TABELA PARA PRETA
                            //------------------------------------------
                            //----TABBELA COM A LINHA PRETA-->
                            }else{          ?><!--Fim Php-->
                                <table>
                                    <tr class="cabeca" >
                                        <td class="nome" width="150px"><?=$dadosTabela['comercio']?></td>
                                        <td class="descricao" width="300px"><?=$dadosTabela['descricao']?></td> 
                                        <td class="valor" width="120px"><?=$valor?></td> 
                                        <td class="vencimento" width="120px"><?=$data?></td>
                                        <td class="valor" width="100px"><?=$situacao?></td>   
                                    </tr>
                                </table>  <?php //Inicio php
                                $branco = true;
                            }
                        
    endforeach;
}else{
    echo"<p>Nenhuma conta atrasada</p>";
}
?>

<br><br>

<h3>Lista de Recebimentos Atrasadas</h3>
<table>
    <tr class="cabeca">
        <td class="nome" width="150px">Nome</td>
        <td class="descricao" width="300px">Descrição</td> 
        <td class="valor" width="120px">Valor</td> 
        <td class="vencimento" width="120px">Vencimento</td>   
        <td class="valor" width="100px">Opções</td>
     </tr>
</table>
<?php
 $branco = true; // VAR QUE VAI DEFINIR A COR DA LINHA DA TABELA

 //TRABALHANDO OS DADOS RECEBIDOS DO BANCO DE DADOS PRA TABELA
 $total = 0;
if($retorno2[1] > 0){
    foreach($retorno2['0'] as $n => $dadosTabela):
        $valor = number_format($dadosTabela['valor'], '2', '.', '');
                            $valor = "R$ ".$valor;
                            $datas = $dadosTabela['data'];
                            $entrada_saida = $dadosTabela['entrada_saida'];
                            if($entrada_saida == "Entrada"){ $titIcone = "Receber Pabamento";} else {$titIcone = "Pagar";}
                            $id_transacao = $dadosTabela['id'];
                            $data = date("d/m/Y", strtotime($datas));
                            $total+=$dadosTabela['valor'];
                                                   //caso ainda esteja em aberto
                                $situacao = "<a title='pagar' id='face' href='index.php?id_pagar=".$id_transacao."&pag=atrasados.php'><img title='$titIcone' src='img/icon/paga.png'/></a> 
                                <a href='arquivos/confirma_exclusao.php?id_excluir=".$id_transacao."'><img title='Excluir parcela' src='img/icon/excluirrr.png'/> </a> 
                                <a href='edita.php?id_transacao=".$id_transacao."'><img title='Editar dados' src='img/icon/editar.png'/> </a>";
                            
                                //$situacao = "Em Aberto";
                             //---------------------------------------------
                            
                            //----TABBELA COM A LINHA BRANCA-->
                            if($branco == true){  //fim php ?>  
                               <table>
                                    <tr class="cabeca" id="branco">
                                        <td class="nome" width="150px"><?=$dadosTabela['comercio']?></td>
                                        <td max-lenght="20" class="descricao" width="300px"><?=$dadosTabela['descricao']?></td> 
                                        <td class="valor" width="120px"><?=$valor?></td> 
                                        <td class="vencimento" width="120px"><?=$data?></td>
                                        <td class="valor" width="100px"><?=$situacao?></td>   
                                    </tr>
                                </table> <?php //Inicio php 
                                $branco = false; //MUDANDO A COR  DA LINHA DA TABELA PARA PRETA
                            //------------------------------------------
                            //----TABBELA COM A LINHA PRETA-->
                            }else{          ?><!--Fim Php-->
                                <table>
                                    <tr class="cabeca" >
                                        <td class="nome" width="150px"><?=$dadosTabela['comercio']?></td>
                                        <td class="descricao" width="300px"><?=$dadosTabela['descricao']?></td> 
                                        <td class="valor" width="120px"><?=$valor?></td> 
                                        <td class="vencimento" width="120px"><?=$data?></td>
                                        <td class="valor" width="100px"><?=$situacao?></td>   
                                    </tr>
                                </table>  <?php //Inicio php
                                $branco = true;
                            }
                        
    endforeach;
}else{
    echo"<p>Nenhuma conta atrasada</p>";
}

?>