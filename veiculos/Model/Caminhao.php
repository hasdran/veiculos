<?php
    include_once ("Veiculo.php");

    class Caminhao extends Veiculo{
        public static $tabela = "Caminhao"; 
        private $quantidadeEixo; 

        public function __construct($placa, $numChassi, $cor, $ano, $marca, $modelo, $pesoMaximo, $preco, $numRodas, $quantidadeEixo) {
            parent::__construct($placa, $numChassi, $cor, $ano, $marca, $modelo, $pesoMaximo, $preco, $numRodas);
            $this->$quantidadeEixo = $quantidadeEixo;
        }        
        
        public function getQuantidadeEixo() {
            return $this->numPortas;
        }

        public function setQuantidadeEixo($quantidadeEixo) {
            $this->$quantidadeEixo = $quantidadeEixo;   
        }

        public function inserir($dados){
           $idResult = parent::inserir($dados);
           $campos = "idVeiculo, pesoMaximo, quantidadeEixo";
           if ($idResult != -1) {
                $array["idVeiculo"] = $idResult;
                $array["pesoMaximo"] = $dados["pesoMaximo"];
                $array["quantidadeEixo"] = $dados["quantidadeEixo"];

                $idResult = ConexaoBD::insere(self::$tabela,$campos, $array); 
                if($idResult != -1) {
                    return true;
                }else{
                    return false;
                }              
           }else{
            return false;
           }
        }

        public function listarTodos() {
            return ConexaoBD::listarTodos(self::$tabela); 
        }

        public function listarUm($id) {
            return ConexaoBD::listarUm(self::$tabela, $id);
        }           
    }    
?>