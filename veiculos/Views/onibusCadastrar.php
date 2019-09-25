<?php
    class OnibusCadastro {

        public function mostrar() {
            echo "
                <div class='col-sm-3'>
                    <label>Capacidade de Passageiros: </label>
                    <input class='form-control' name='qtdPassageiro' type='number' value='4' id='example-number-input'>
                </div>
                <div class='col-sm-3'>
                    <label>Número de Eixos: </label>
                    <input class='form-control' name='quantidadeEixo' type='number' value='4' id='example-number-input'>
                </div>";
        }
    }
?>