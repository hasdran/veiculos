<?php
class ConexaoBD {

    public static function connection() {

    // FUNCAO PARA CONEXAO COM O BANCO DE DADOS
    // INSERIR O NOME DO BANCO, USUARIO E SENHA
        return new PDO("mysql:host=localhost;dbname=veiculosbd", "root", "");
    }

    public static function listarTodos($tabela) {
        $sql;
        if ($tabela == "Carro") {
            $sql = "SELECT * FROM Veiculo JOIN Carro ON Veiculo.idVeiculo = Carro.idVeiculo";
        }else if($tabela == "Caminhao"){
            $sql = "SELECT * FROM Veiculo JOIN Caminhao ON Veiculo.idVeiculo = Caminhao.idVeiculo";
        }else if ($tabela == "Onibus") {
            $sql = "SELECT * FROM Veiculo JOIN Onibus ON Veiculo.idVeiculo = Onibus.idVeiculo";
        }else{
            $sql = "SELECT * FROM Veiculo";
        }
        $conn = self::connection();
        $stmt = $conn->prepare("$sql");
        $stmt->execute();

        return $stmt;
    }

    public static function listarUm($tabela, $id) {

        $sql = "SELECT * FROM Veiculo JOIN $tabela ON $tabela.idVeiculo = Veiculo.idVeiculo AND $tabela.id$tabela = $id";

        $conn = self::connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchObject();
    }

    public static function insere($tabela, $campos, $dados) {
        
        $sql = "INSERT INTO $tabela($campos) VALUES(";

        $flag = 0;
        $array = (array) $dados;
        if ($tabela == "Veiculo") {
            $cont=0;
            foreach($dados as $campo => $valor) {
                if($flag == 0) {     
                    $sql .= "'$valor'";                         
                    $flag = 1;
                    $cont++;
                }
                else { 
                    if ($cont<6) {
                        $sql .= ",'$valor'";
                    }else{
                        $sql .= ", $valor";
                    }
                    $cont++;
                }
            }
        }else {
            foreach($dados as $campo => $valor) {
                if($flag == 0) {     
                    $sql .= "$valor";                         
                    $flag = 1;
                }
                else { 
                    $sql .= ", $valor";
                }
            }
        }

        $sql .= ")";

        $conn = self::connection();
        $stmt = $conn->prepare($sql);
        
        if ($stmt->execute()) {
            return $conn->lastInsertId();             
        }else{
            return -1;
        }
    }       
}
?>