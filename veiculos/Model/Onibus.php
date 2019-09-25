<?php
    include_once ("Veiculo.php");

    class Onibus extends Veiculo {
        public static $tabela = "Onibus";  
        private $qtdPassageiro;
        private $quantidadeEixo;


        public function __construct($placa, $numChassi, $cor, $ano, $marca, $modelo, $pesoMaximo, $preco, $numRodas, $qtdPassageiro, $quantidadeEixo) {
            parent::__construct($placa, $numChassi, $cor, $ano, $marca, $modelo, $pesoMaximo, $preco, $numRodas);
            $this->qtdPassageiro = $qtdPassageiro;
            $this->$quantidadeEixo = $quantidadeEixo;
        }  

        public function getQtdPassageiros() {
            return $this->qtdPassageiros;
        }    
        
        public function setQtdPassageiros($qtdPassageiros) {
            $this->qtdPassageiros = $qtdPassageiros;
        }

        public function getQuantidadeEixo() {
            return $this->numPortas;
        }

        public function setQuantidadeEixo($quantidadeEixo) {
            $this->$quantidadeEixo = $quantidadeEixo;   
        }        

        public function inserir($dados){
            $idResult = parent::inserir($dados);
            $campos = "idVeiculo, qtdPassageiro, quantidadeEixo";
            if ($idResult != -1) {
                 $array["idVeiculo"] = $idResult;
                 $array["qtdPassageiro"] = $dados["qtdPassageiro"];
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