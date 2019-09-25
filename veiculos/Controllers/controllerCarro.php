<?php
    include_once ("../Model/Carro.php");
    include_once ("../Model/ConexaoBD.php");

    controllerCarro::rota();
        
    class controllerCarro{

        public  function rota() {
            
            // Formulário submetido
            if( !empty($_POST['form_submit'])) {
       
                $dados = explode("/", $_POST['acao']);

                if(strcmp($dados[0], "cadastrar") == 0) {
                    self::cadastrar();
                }else if(strcmp($dados[0], "confirmar") == 0) {
                    self::salvar();
                }
            }
        }

        public static function cadastrar(){            
            echo "<script>window.location='../Views/viewVeiculoCadastrar.php?v=carro'</script>";
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
            $array["qtdPassageiros"]=$request["qtdPassageiros"];
            $array["numPortas"]=$request["numPortas"];
            
            if(Carro::inserir($array)){
                echo "<script>window.location='../Views/viewVeiculos.php?msg=sucesso'</script>";
            }else{
                echo "<script>window.location='../Views/viewVeiculos.php?msg=erro'</script>";
            }           
        }    

        public static function carregarTabelaVeiculo() {
            $veiculos = Carro::listarTodos();
    
            while($objVeiculo = $veiculos->fetchObject()){
                $idCarro = $objVeiculo->idCarro;
                echo "<tr class='table-row' data-href='../Views/viewCarro.php?id=".$idCarro."' style='cursor:pointer;'>";                   
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
            return Carro::listarUm($id);                        
        }
    }
?>