<?php require_once("arquivos/sessao.php"); ?>
<DOCTYPE html>
    <html>
        <head>
            <?php
                require("vendor/autoload.php");
                require_once("classes/conexao.php");
                $form1 = false; $form2 = false; $form3 = false; $form4 = false;
                use Cliente\clientes;
                $cli = new clientes();
                $cli2 = new clientes();
            ?>
            <link rel="stylesheet" href="css/index.css">
            <link rel="stylesheet" href="css/comercio.css">
            <title >Controle Financeiro</title>
            <link rel="sortcut icon" href="img/icone.png" type="image/x-icon" />
        </head>
        <body>
            <header id="cabecalho">
                <?php 
                require_once('arquivos/cabecalho.php');
                ?>    
            </header>
            <div id="corpo">
                <div id="lateral">
                    <?php 
                        echo "----------------------------------------------------<br>";
                        require_once("forms/form4_buscar_mensal.php");
                        echo "----------------------------------------------------<br>"; 
                        require_once("forms/form1_agendar_transacao.php");
                    ?> 
                </div> 
                
                
                
                
                
                
                
                
                
                <!--<>>>>>>>>>>>>>>>>>>>>>>>>>>CENTRAL>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
                <div id="central">
                <?php 
                require_once("arquivos/excluir_comercio.php");

                require_once('arquivos/tabela_comercios.php'); 

                

                ?>

                </div>                  <!--Fim div central-->
            <footer id="rodape">
            <?php require_once('arquivos/rodape.php'); ?>
            
            </footer>
            
        </body>
    </html>
