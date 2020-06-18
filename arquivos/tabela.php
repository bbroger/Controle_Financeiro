<?php
if(!isset($_SESSION['id'])){
    header("Location: sai.php");
}  ?>
<div id="tabela"  style="overflow: auto; max-height: 310px" >
                    <?php
                    //CASO O FORM4 FOI ATIVADO PEGAR OS DADOS PRA USAR NA TABELA
                        if ($form4 == true){
                            //$mesAtual = addslashes($_POST['mes4']);
                            $_mes_atual= addslashes($_POST['mes4']);
                            //$entrada_saida = addslashes($_POST['entrada_saida4']);
                            $_despesa_renda = addslashes($_POST['entrada_saida4']);
                            //$anoAtual = addslashes($_POST['ano4']);
                            $_ano_atual = addslashes($_POST['ano4']);
                            /*if($entrada_saida == "Entrada"){
                                $titulo = $entrada_saida." no mês ".$mesAtual."/".$anoAtual;
                            }else{
                                $titulo = $entrada_saida." no mês ".$mesAtual."/".$anoAtual;
                            }
                        }else{ // CASO NAO ATIVADO USAR OS DADOS ABAIXO
                            $mesAtual = $_mes_atual;
                            $anoAtual = $_ano_atual;
                            $entrada_saida = $_despesa_renda;*/
                            
                        } //-----------------------------------------------
                        $titulo = $_despesa_renda." no mês ".$_mes_atual." / ".$_ano_atual;
                        //------------ESCREVANDO O TITULO DA TABELA----------------------
                        echo '<h2 style="text-align: center; text-shadow: 1px 1px 1px black;">'.$titulo.'</h2>';
                        //-------------------------------------------------
                        
                        //--------VAR Q VAI RECEBER RECEBIMENTO OU VENCIMENTO
                        if($_despesa_renda == "Entrada"){        //titulo para a coluna vencimento
                            $vencimento_recebimento = "Recebimento";
                        }else{
                            $vencimento_recebimento = "Venimento";
                        }//---------------------------------------------
                        
                         //PEGANDO O ID DO USUARIO

                        //-------------------CHAMANDO O METODO PARA BUSCAR OS DADOS DA TABELA
                        $table = $cli->porData($link, $_mes_atual, $_ano_atual, $_despesa_renda, $_id_usuario);
                    //-----------------------------------------------------------------------
                    
                    ?>
                    <!--CRIANDO A CABEÇA DA TABELA-->
                        <table>
                            <tr class="cabeca">
                                <td class="nome" width="150px">Nome</td>
                                <td class="descricao" width="300px">Descrição</td> 
                                <td class="valor" width="120px">Valor</td> 
                                <td class="vencimento" width="120px"><?=$vencimento_recebimento?></td>   
                                <td class="valor" width="100px">Opções</td>
                            </tr>
                        </table>
                    <!---------------------------------------------------->

                    <?php
                        $branco = true; // VAR QUE VAI DEFINIR A COR DA LINHA DA TABELA

                        //TRABALHANDO OS DADOS RECEBIDOS DO BANCO DE DADOS PRA TABELA
                        $total = 0;
                        while($dadosTabela = mysqli_fetch_assoc($table)){ 
                            $valor = number_format($dadosTabela['valor'], '2', '.', '');
                            $valor = "R$ ".$valor;
                            $datas = $dadosTabela['data'];
                            $entrada_saida = $dadosTabela['entrada_saida'];
                            if($entrada_saida == "Entrada"){ $titIcone = "Receber Pabamento";} else {$titIcone = "Pagar";}
                            $id_transacao = $dadosTabela['id'];
                            $data = date("d/m/Y", strtotime($datas));
                            $total+=$dadosTabela['valor'];
                            if($dadosTabela['pago'] == true){ //caso seja uma linha ja quitada
                                $situacao = "<img title='Ok' src='img/icon/oq.png'/> 
                                <a href='arquivos/confirma_exclusao.php?id_excluir=".$id_transacao."'><img title='Excluir' src='img/icon/excluirrr.png'/> </a> 
                                 <a href='edita.php?id_transacao=".$id_transacao."'><img title='Editar dados' src='img/icon/editar.png'/> </a>";
                            }else{                        //caso ainda esteja em aberto
                                $situacao = "<a title='pagar' id='face' href='index.php?id_pagar=".$id_transacao."&pag=index.php'><img title='$titIcone' src='img/icon/paga.png'/></a> 
                                <a href='arquivos/confirma_exclusao.php?id_excluir=".$id_transacao."'><img title='Excluir parcela' src='img/icon/excluirrr.png'/> </a> 
                                <a href='edita.php?id_transacao=".$id_transacao."'><img title='Editar dados' src='img/icon/editar.png'/> </a>";
                            
                                //$situacao = "Em Aberto";
                            } //---------------------------------------------
                            
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

                            //------------------------------------------
                        }    $total = number_format($total, "2", ".", " "); 
                        
                        ?>  <!--Fim Php-->
                    </div>
                    <table>
                        <tr class="cabeca" >
                            <td class="nome" style="background:black;" width="580px">Total</td>
                            <td class="descricao" style="background:black;" width="225px">R$ <?=$total?></td> 
                        </tr>
                    </table> 