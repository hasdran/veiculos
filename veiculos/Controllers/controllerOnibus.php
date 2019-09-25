<?php
    include_once ("../Model/Onibus.php");
    // include_once ("../Model/ConexaoBD.php");

    controllerOnibus::rota();
    
    class controllerOnibus{

        public static function rota() {
            
            if( !empty($_POST['form_submit']) ) {
       
                $dados = explode("/", $_POST['acao']);

                if(strcmp($dados[0], "cadastrar") == 0) {
                    self::cadastrar();
                }
                if(strcmp($dados[0], "confirmar") == 0) {
                    self::salvar();
                }
            }
        }
        public static function cadastrar() {
            echo "<script>window.location='../Views/viewVeiculoCadastrar.php?v=onibus'</script>";
        }
        public static function salvar() {
            $request = $_REQUEST;
            $array["placa"]=$request["placa"];
            $array["numChassi"]=$request["numChassi"];
            $array["cor"]=$request["cor"];
            $array["ano"]=$request["ano"];
            $array["marca"]=$request["marca"];
            $array["modelo"]=$request["modelo"];
            $array["pesoMaximo"]=$request["pesoMaximo"];
            $array["preco"]=$request["preco"];
            $array["numRodas"]=$request["numRodas"];
            $array["qtdPassageiro"]=$request["qtdPassageiro"];
            $array["quantidadeEixo"]=$request["quantidadeEixo"];
            
            if(Onibus::inserir($array)){
                echo "<script>window.location='../Views/viewVeiculos.php?msg=sucesso'</script>";
            }else{
                echo "<script>window.location='../Views/viewVeiculos.php?msg=erro'</script>";
            }   
        }
        public static function carregarTabelaVeiculo() {
            $veiculos = Onibus::listarTodos();
    
            while($objVeiculo = $veiculos->fetchObject()){
                $idOnibus = $objVeiculo->idOnibus;
                echo "<tr class='table-row' data-href='../Views/viewOnibus.php?id=".$idOnibus."' style='cursor:pointer;'>";
                echo "<td>".$objVeiculo->idVeiculo."</td>"; 
                echo "<td>".$objVeiculo->placa."</td>";
                echo "<td>".$objVeiculo->numChassi."</td>";
                echo "<td>".$objVeiculo->cor."</td>";
                echo "<td>".$objVeiculo->ano."</td>";
                echo "<td>".$objVeiculo->marca."</td>";
                echo "<td>".$objVeiculo->modelo."</td>";
                echo "<td>".$objVeiculo->pesoMaximo."</td>";
                echo "<td>R$ ".$objVeiculo->preco."</td>";
                echo "<td>".$objVeiculo->numRodas."</td>"; 
                echo "</tr>";
            }
        }    
        
        public static function carregarVeiculo($id){
            return Onibus::listarUm($id);                        
        }
    }
?>