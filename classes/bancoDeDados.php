<?php
    namespace Bdados;
    if(!isset($_SESSION['id'])){
        header("Location: sai.php");
    }
   //require ("vendor/autoload.php");
    class bancoDeDados{
        public function __construct(){
            
        }
        //01
        public function insereCadastro($link, $id_usuario, $parcelaAtual, $descricao, $valor, $tp, $entrada, $pago, $comercio){
            $query = "INSERT INTO cadastrados (id_usuario, data, descricao, valor, p_atual, entrada_saida, pago, comercio) VALUES('{$id_usuario}', '{$parcelaAtual}', '{$descricao}', '{$valor}', '{$tp}', '{$entrada}', '{$pago}', '{$comercio}')";
            $inserir = mysqli_query($link, $query);
            $ok = mysqli_affected_rows($link);
            if($ok == 1){
                
            }else{
                echo "<script> alert('Ops teve algum problema')</script>";
                header("index.php");
            }
        }
        //02
        public function mostrarTransacoes($link, $id_usuario, $entrada_saida, $pago){
            $queri = "SELECT * FROM cadastrados WHERE id_usuario = '{$id_usuario}' && pago = '{$pago}' && entrada_saida = '{$entrada_saida}'";
            $resultado = mysqli_query($link, $queri); 
			return $resultado;
        }
        //03
        public function mostrarUmaTransacao($link, $id){
            $query = "SELECT * FROM cadastrados WHERE id = '{$id}'";
            $result = mysqli_query($link, $query);
            return $result;
        }
        //04
        public function porData($link, $mes, $ano, $entrada_saida, $id_usuario){
            $ano_a = "&& year(data) = '{$ano}'";
            $mes_a = "month(data) ='{$mes}'";
            $entrada_said = "&& entrada_saida = '{$entrada_saida}'";
            $id_usuario = "&& id_usuario = '{$id_usuario}'";
            $query = "SELECT * FROM cadastrados WHERE $mes_a $ano_a $entrada_said $id_usuario";
            $result = mysqli_query($link, $query);
            return $result;
        }
        //05
        public function consultarUsr($link, $email, $senha){
            $query = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'";
            $result = mysqli_query($link, $query);
            $usr = mysqli_fetch_array($result);
            $res = mysqli_affected_rows($link);
            if($res != 1){
                $res = 0;
            }
            return $usr;
        }
        //06
        public function cadastraUsuario($link, $nome, $email, $senha){
            $query = "SELECT * FROM usuario WHERE email = '{$email}'";
            $result = mysqli_query($link, $query);
            $resu = mysqli_affected_rows($link);
            if($resu != 1){
                $query = "INSERT INTO usuario (nome, email, senha) VALUES ('{$nome}', '{$email}', '{$senha}')";
                $res06 = mysqli_query($link, $query);
                $res = mysqli_affected_rows($link);
                
            }else{
                $res = 0;
            }
            return $res;
        }
        //07
        public function renda_despesa($link, $mes, $ano, $entrada_saida, $id_usuario){
            $ano_a = "&& year(data) = '{$ano}'";
            $mes_a = "month(data) ='{$mes}'";
            $entrada_said = "&& entrada_saida = '{$entrada_saida}'";
            $id_usuario = "&& id_usuario = '{$id_usuario}'";
            $query = "SELECT * FROM cadastrados WHERE $mes_a $ano_a $entrada_said $id_usuario";
            $result = mysqli_query($link, $query);
            $total = 0;
            while($soma = mysqli_fetch_assoc($result)){
                $total+=$soma['valor'];
            }
            return $total;
        }
        //08
        public function saldo($link, $id_usuario){
            $entrada= "Entrada"; 
            $saida = "Saida";
            $id_usuario = "&& id_usuario = '{$id_usuario}'";
            $pago = true;
        $query = "SELECT * FROM cadastrados WHERE entrada_saida = '{$saida}' $id_usuario && pago = '{$pago}'";
            $resulta = mysqli_query($link, $query);
            $total_despesa = 0;
            while($soma = mysqli_fetch_assoc($resulta)){
                $total_despesa+=$soma['valor'];
            }
            $query = "SELECT * FROM cadastrados WHERE entrada_saida = '{$entrada}' $id_usuario && pago = '{$pago}'";
            $resulta = mysqli_query($link, $query);
            $total_renda = 0;
            while($soma1 = mysqli_fetch_assoc($resulta)){
                $total_renda+=$soma1['valor'];
            }
            $total = $total_renda - $total_despesa;
            $retorna = array("total"=>$total, "renda"=>$total_renda, "despesa"=>$total_despesa);
            return $retorna; 
                //retornando o TOTAL  / RENDA GERAL  /  DISPESA GERAL

        }
        //09
        public function retorna_comerciobd($link, $id_usuario){
            $classe = "global";
            $query = "SELECT * FROM comercio WHERE id_usuario = '{$id_usuario}' or classe = '{$classe}'";
            $retorno = mysqli_query($link, $query);
            return $retorno;
        }
        //10
        public function excluir_transacao($link, $id_transacao){
            $query = "DELETE FROM cadastrados WHERE id = '{$id_transacao}'";
            $teste = mysqli_query($link, $query)or die('não foi possivel acessar Banco de Dados');
            return $teste;
        }
        //11 paga conta selecionada pelo id_cadastrado
        public function pagar_conta($link, $id_cadastro){
            $query = "UPDATE cadastrados SET pago = 1 WHERE cadastrados.id = '{$pago}'";
            mysqli_query($link, $query);
            $res11 = mysqli_affected_rows($link);
            return $res;
        }
       //12 Retorna todos os comercio do usuario
       public function lista_de_comercios($link, $id_usuario){
            $query = "SELECT * FROM comercio WHERE id_usuario = '{$id_usuario}'";
            $comercio = mysqli_query($link, $query);
            return $comercio;
        }
        //13 excluir comercio 
        public function excluir_comercio($link, $id_comercio){
            $query = "DELETE FROM comercio WHERE comercio.id = '{$id_comercio}'";
            mysqli_query($link, $query);
            $res = mysqli_affected_rows($link);
            return $res;
        }
        //14 adiciona comercio
        public function cadastra_comercio($nome, $classe, $link, $id){
            $query = "INSERT INTO comercio (id_usuario, comercio, classe) VALUES ('{$id}', '{$nome}', '{$classe}')";
            mysqli_query($link,$query); 
            $res = mysqli_affected_rows($link);
            return $res;
        }
        //15 RETORNA CONTAS ATRASADAS
            public function atrasados($link, $id, $entrada_saida){
                $data = date("Y-m-d");
                $pago = false;
                
                $retorno = array();
                $query = "SELECT * FROM cadastrados WHERE data < '{$data}' && pago = '{$pago}' && id_usuario = '{$id}' && entrada_saida = '{$entrada_saida}' ";
                $resu = mysqli_query($link, $query);
                $consulta = mysqli_affected_rows($link);
                $retorno = array($resu, $consulta);
                return $retorno;
            }
        //16 RETORNA UM COMERCIO SELECIONADO PELO ID
        public function retorna_comercio($link, $id){
        $retorno = array();
        $query = "SELECT * FROM comercio WHERE id = '{$id}'"; 
        $dados = mysqli_query($link, $query);
        $dadoss=mysqli_fetch_array($dados);
        $tes = mysqli_affected_rows($link);
        $retorno = array($dadoss, $tes);    
        return $retorno;
        }
        //17 deitar comércio
        public function edita_comercio($link, $id, $nome, $classe){
            $query = "UPDATE comercio SET comercio = '{$nome}', classe = '{$classe}' WHERE id = '{$id}'";
            mysqli_query($link, $query);
            $confere = mysqli_affected_rows($link);
            return $confere;
        }
    }    
?>
