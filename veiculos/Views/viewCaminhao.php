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
            </div>
        </div>
    </nav>
    <br>
    <br>
    <div class="container theme-showcase" role="main">
        <div class="page-header">
            <h2 class="form-signin-heading">
                <div id="m_texto"> Detalhes - Caminhão </div>
            </h2>
        </div>          

      <table class="table table-striped">
        <thead>
          <!-- <tr>
            <th>#</th>
            <th>First Name</th>
          </tr> -->
        </thead>
        <tbody>
            <?php 
                $tabelaCabecalho = array("ID VEICULO", "PLACA", "CHASSI", "COR", "ANO", "MARCA", "MODELO", "PESO MÁXIMO","PREÇO","ID CAMINHÃO","PESO MÁXIMO (Kg)", "NUMERO DE EIXOS");
                $indice=0;
                include_once ("../Controllers/controllerCaminhao.php");
                $carro = controllerCaminhao::carregarVeiculo($_GET["id"]);
                foreach ($carro as $campo => $valor) {
                    echo "<tr style='width: 50px;'>";
                    echo "<th scope='row' style='width: 500px;'>".$tabelaCabecalho[$indice]."</th>";
                    echo "<td>".$valor."</td>";
                    echo"</tr>";
                    $indice++;                    
                }               
            ?>
        </tbody>
      </table>
             
        <div class="page-header">
    		<b>&copy;2019&nbsp;&nbsp;&raquo;&nbsp;&nbsp; Augusto Fernandes Oliveira &nbsp;&nbsp;&raquo;&nbsp;&nbsp; RA: 18549135 </b>
    	</div>      
    </div>     
</body>
</html>