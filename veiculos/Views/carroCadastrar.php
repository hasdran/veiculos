<?php
    class CarroCadastro {

        public function mostrar() {
            echo "
                <div class='col-sm-3'>
                    <label>Número de Passageiros: </label>
                    <input name='qtdPassageiros' class='form-control' type='number' value='4' min='1' id='example-number-input'>
                </div>
                <div class='col-sm-3'>
                    <label>Número de Portas: </label>
                    <input name='numPortas' class='form-control' type='number' value='4' min='2' id='example-number-input'>
                </div>";
        }
    }
?>