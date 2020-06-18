<?php
namespace Cliente;

use Bdados\bancoDeDados;
class clientes{
    private $nome;
    private $email;
    private $senha;
    private $ativo;
    //01
    public function __construct(){
       //echo "oi";//
    }
    //02
    public function pagarReceber(){
        //
    }
    //03
    public function mostrarUmaTransacao($link, $id){
        $bc = new bancoDeDados();
        $res = $bc->mostrarUmaTransacao($link, $id);
        return $res;
    }
    //04 
    public function consultarLogin($link, $email, $senha){
        $bc = new bancoDeDados();
        $resultado = $bc->consultarLogin($link, $email, $senha);
        return $resultado;
    }
    //05
    public function mostrarTransacoes($link, $id_usuario, $entrada_saida, $pago){
        $bd = new bancoDeDados();
        $resultado = $bd->mostrarTransacoes($link, $id_usuario, $entrada_saida, $pago);
        return $resultado;
    }
    //06
    public function porData($link, $mes, $ano, $entrada_saida, $id_usuario){
        $bd = new bancoDeDados();
        $resultado = $bd->porData($link, $mes, $ano, $entrada_saida, $id_usuario);
        return $resultado;
    }
    //07
    public function consultarUsr($link, $email, $senha){
        $banDad = new bancoDeDados;
        $res = $banDad->consultarUsr($link, $email, $senha);
        return $res;
    }    
    //08    
    public function mostrarSaldo(){
        //
    }
    //09
    public function gastosEntradaMensais(){
        //   
    }
    //10
    public function agendarEntradaSaida($link, $id_usuario, $data, $descricao, $valor, $entrada, $qParcelas, $comercio){
        $bdd = new bancoDeDados(); 
        $pago = false;
        $contador = 1;
        while($contador <= $qParcelas){
            $pAtual = $contador." / ".$qParcelas;
            $bdd->insereCadastro($link, $id_usuario, $data, $descricao, $valor, $pAtual, $entrada, $pago, $comercio);
            $data = date('Y-m-d', strtotime("+$contador months", strtotime("$data")));// aumentando a data + 1 Mes
            $contador++;
        }
        return $contador; 
    }
    //11
    public function cadastraUsuario($link, $nome, $email, $senha){
        $bd_11 = new bancoDeDados;
        $res = $bd_11->cadastraUsuario($link, $nome, $email, $senha);
        return $res;
    }
    //12
    public function renda_despesa($link, $mes, $ano, $entrada_saida, $id_usuario){
        $bd12 = new bancoDeDados(); 
        $resultado = $bd12->renda_despesa($link, $mes, $ano, $entrada_saida, $id_usuario);
        return $resultado;
    }
    //13retorna string com saldo total, renda total e despesa total
    public function saldo($link, $id_usuario){
        $bd13 = new bancoDeDados();
        $retorno = $bd13->saldo($link, $id_usuario);
        return $retorno;
    }
    //14 lista os comercios no select
    public function retorna_comercio($link, $id_usuario){
        $bd14 = new bancoDeDados();
        $retorna14 = $bd14->retorna_comerciobd($link, $id_usuario);
        return $retorna14;
    }
    //15
    public function pagar_conta($link, $id_cadastro){
        $bd15 = new bancoDeDados();
        $retorna15 = $bd15->pagar_conta($link, $id_cadastro);
        return $retorna15;
    }
    //16
    public function excluir_transacao($link, $id_transacao){
        $bd16 = new bancoDeDados();
        $retorna16 = $bd16->excluir_transacao($link, $id_transacao);
        return $retorna16;
    }
    //17 retorna lista de comercois do usuario
    public function lista_de_comercios($link, $id_usuario){
        $bd17 = new bancoDeDados();
        $comercio = $bd17->lista_de_comercios($link, $id_usuario);
        return $comercio;
    }
    //18 excluir comercio
    public function excluir_comercio($link, $id_comercio){
        $bd18 = new bancoDeDados();
        $res = $bd18->excluir_comercio($link, $id_comercio);
        return $res;
    }
    //19
    public function cadastra_comercio($nome, $classe, $link, $id){
        $bd19 = new bancoDeDados();
        $res = $bd19->cadastra_comercio($nome, $classe, $link, $id);
        return $res;
    }
    //20 RETORNA ARRAY COM CONTAS ATRASADASNA POSICAO[0] E TOTAL DE LINHAS AFETADAS NA POSICAO[1]
    public function atrasados($link, $id, $entrada_saida){
        $bd20 = new bancoDeDados();
        $retorno = $bd20->atrasados($link, $id, $entrada_saida);
        return $retorno;
    }
    //21 EDITA COMERCIO
    public function edita_comercio($link, $id, $nome, $classe){
        $bd21 = new bancoDeDados();
        $confere = $bd21->edita_comercio($link, $id, $nome, $classe);
        return $confere;
    }
    //22 RETORNA ARRAY COM DADOS DO CLIENTE NA POS [0] E QUANTIDADE DE LINHAS AFETADAS NA POS [1]
    public function retorna__comercio($link, $id){
        $bd22 = new bancoDeDados();
        $retorno = $bd22->retorna_comercio($link, $id);
        return $retorno;
    }
}


?>