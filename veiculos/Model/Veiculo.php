<?php
    include_once ("ConexaoBD.php");
   
    abstract class Veiculo {
        public static $tabela = 'Veiculo';
        private $idVeiculo;
        private $placa;
        private $numChassi;
        private $cor;
        private $ano;
        private $marca;
        private $modelo;
        private $pesoMaximo;
        private $preco;
        private $numRodas;

        public function __construct($placa, $numChassi, $cor, $ano, $marca, $modelo, $pesoMaximo, $preco, $numRodas) {
            $this->placa= $placa;
            $this->numChassi= $numChassi;
            $this->cor= $cor;
            $this->ano= $ano;
            $this->marca= $marca;
            $this->modelo= $modelo;
            $this->preco= $preco;
            $this->numRodas= $numRodas;
            $this->pesoMaximo= $pesoMaximo;
        }
        protected function inserir($dados){     
            $cont = 0;
            $veiculo;
            foreach ($dados as $campo => $valor) {
                if ($cont<9) {
                    $veiculo[$campo] = $valor;
                }
                $cont++;
            }
            $campos = "placa, numChassi, cor, ano, marca, modelo, pesoMaximo, preco, numRodas";
            return ConexaoBD::insere(self::$tabela,$campos, $veiculo);            
        }

        protected function listarTodos(){
            return ConexaoBD::listarTodos("Veiculo");  
        }

        public function getIdVeiculo() {
            return $this->idVeiculo;
        }
        public function setIdVeiculo($idVeiculo) {
            $this->idVeiculo= $idVeiculo;
        }

        public function getPlaca() {
            return $this->placa;
        }
        public function setPlaca($placa) {
            $this->placa= $placa;
        }

        public function getNumChassi() {
            return $this->numChassi;
        }
        public function setNumChassi($numChassi) {
            $this->numChassi= $numChassi;
        }

        public function getCor() {
            return $this->cor;
        }
        public function setCor($cor) {
            $this->cor= $cor;
        }

        public function getAno() {
            return $this->ano;
        }
        public function setAno($ano) {
            $this->ano= $ano;
        }    

        public function getMarca() {
            return $this->marca;
        }
        public function setMarca($marca) {
            $this->marca= $marca;
        }

        public function getModelo() {
            return $this->modelo;
        }
        public function setModelo($modelo) {
            $this->modelo= $modelo;
        }

        public function getPesoMaximo() {
            return $this->pesoMaximo;
        }
        public function setPesoMaximo($pesoMaximo) {
            $this->pesoMaximo= $pesoMaximo;
        }        

        public function getPreco() {
            return $this->preco;
        }
        public function setPreco($preco) {
            $this->preco= $preco;
        }

        public function getNumRodas() {
            return $this->numRodas;
        }     
        public function setNumRodas($numRodas) {
            $this->numRodas= $numRodas;
        }           
    }    

?>