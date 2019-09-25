<?php
    include_once ("Veiculo.php");

    class Carro extends Veiculo{
        public static $tabela = "Carro";
        private $qtdPassageiros;   
        private $numPortas; 

        public function __construct($placa, $numChassi, $cor, $ano, $marca, $modelo, $pesoMaximo, $preco, $numRodas, $qtdPassageiros, $numPortas) {
            parent::__construct($placa, $numChassi, $cor, $ano, $marca, $modelo, $pesoMaximo, $preco, $numRodas);
            $this->qtdPassageiros= $qtdPassageiros;
            $this->$numPortas = $numPortas;
        }        
        
        public function getIdCarro() {
            return $this->idCarro;
        }    
        
        public function getQtdPassageiros() {
            return $this->qtdPassageiros;
        }    

        public function getNumPortas() {
            return $this->numPortas;
        }

        public function setIdCarro($idCarro) {
            $this->idCarro = $idCarro;
        }    
        
        public function setQtdPassageiros($qtdPassageiros) {
            $this->qtdPassageiros = $qtdPassageiros;
        }    

        public function setNumPortas($numPortas) {
            $this->numPortas = $numPortas;
        }

        public function inserir($dados){
           $idResult = parent::inserir($dados);
           $campos = "idVeiculo, qtdPassageiros, numPortas";
           if ($idResult != -1) {
                $array["idVeiculo"] = $idResult;
                $array["qtdPassageiros"] = $dados["qtdPassageiros"];
                $array["numPortas"] = $dados["numPortas"];

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