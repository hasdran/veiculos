<?php
    class CaminhaoCadastro {

        public function mostrar() {
            echo "
                <div class='col-sm-2'>
                    <label>Número de Eixos: </label>                    
                    <input class='form-control' name='quantidadeEixo' type='number' value='4' min='1' max='20' id='example-number-input'>                                            
                </div>";
        }
    }
?>