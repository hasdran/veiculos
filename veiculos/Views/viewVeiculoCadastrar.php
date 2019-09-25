<?php
    include_once ("./carroCadastrar.php");
    include_once ("./onibusCadastrar.php");
    include_once ("./caminhaoCadastrar.php");

    if (!empty($_GET['v'])) {
        if ($_GET['v'] == "carro") {
            $controllerView = "controllerCarro";       
        }if($_GET['v'] == "caminhao"){
            $controllerView = "controllerCaminhao";   
        }else if($_GET['v'] == "onibus"){
            $controllerView = "controllerOnibus";   
        } 
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sistema de Cadastro de Veículos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Ajax Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand">[ AG CARS ] Sistema de Cadastro de Veículos</a>
        </div>
	<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="active">
                      <a href=".."> Home </a>
              </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br>
    <br>
    <div class="container theme-showcase" role="main">

    <div class="page-header">
        <h2 class="form-signin-heading">
            <div id="m_texto"> Cadastrar Veículo </div>
        </h2>
    </div>

        <form class="form" method="post" action="../Controllers/<?=$controllerView?>.php">
            
            <input TYPE="hidden" NAME="form_submit" VALUE="OK">

            <div class='row'>
                <div class="col-sm-3">
                    <label>Placa: </label>
                    <input type="text" name="placa" class="form-control">
                </div>
                <div class="col-sm-3">
                    <label>Número do Chassi: </label>
                    <input type="text" name="numChassi" class="form-control">
                </div>
                <div class="col-sm-3">
                    <label>Cor: </label>
                    <input type="text" name="cor" class="form-control">
                </div>
                <div class="col-sm-2">
                    <label>Ano: </label>
                    <select class="form-control" name="ano" data-size="10" id="inlineFormCustomSelect">
                        <option selected><?=date("Y")?></option>
                        <?php
                            for ($i=1900; $i <= date("Y"); $i++) { 
                                echo "<option value='ano'>$i</option>";                       
                            }
                        ?>
                    </select>
                </div>                
            </div>

            <div class='row'>
                <div class="col-sm-3">
                    <label>Marca: </label>
                    <input type="text" name="marca" class="form-control">
                </div>
                <div class="col-sm-3">
                    <label>Modelo: </label>
                    <input type="text" name="modelo" class="form-control">
                </div>
                <div class="col-sm-2">
                    <label>Peso Máximo: </label>
                    <input type="number" name="pesoMaximo" min="1" class="form-control">
                </div>     
                <div class="col-sm-3">
                    <label>Preço: </label>
                    <input type="number" name="preco" min="1" class="form-control">
                </div>                           
            </div>    

            <div class='row'>
                <div class="col-sm-3">
                    <label>Número de Rodas: </label>
                    <input class="form-control" name="numRodas" type='number' value='4' min='4' id="example-number-input">
                </div>
                <?php                 
                if ($_GET['v'] == "carro") {
                    echo CarroCadastro::mostrar();       
                }if($_GET['v'] == "caminhao"){
                    echo CaminhaoCadastro::mostrar();
                }else if($_GET['v'] == "onibus"){
                    echo OnibusCadastro::mostrar();
                }                            
            ?>                
            </div>    

            <br>

            <button type="submit" name="acao" value="confirmar/0" class="btn btn-success btn-block">
                <b>Confirmar</b>
            </button>
        </form>

        <div class="page-header">
    		<b>&copy;2019&nbsp;&nbsp;&raquo;&nbsp;&nbsp; Augusto Fernandes Oliveira &nbsp;&nbsp;&raquo;&nbsp;&nbsp; RA: 18549135 </b>
    	</div>    
    </div>     
</body>
</html>