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
                            <a href="#"> Home </a>
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
                <div id="m_texto"> Veículos Cadastrados </div>
            </h2>
        </div>
        <?php 
            if (!empty($_GET['msg'])) {
                if ($_GET['msg'] == "sucesso") {
        ?>                   
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Veiculo cadastrado com sucesso!
            </div>
        <?php
                }else{
        ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Erro ao cadastrar o veiculo!
            </div>
        <?php
                }
            }        
        ?>        

        <div class="row">
            <div class="col-md-4">
                <form method="post" action="../Controllers/controllerCarro.php"> 
                    <input TYPE="hidden" NAME="form_submit" VALUE="OK">
                    <button type="submit" name="acao" value="cadastrar/0" class="btn btn-primary btn-block">
                        Cadastrar Carro
                    </button>
                </form>    
            </div> 

            <div class="col-md-4">
                <form method="post" action="../Controllers/controllerCaminhao.php">
                    <input TYPE="hidden" NAME="form_submit" VALUE="OK">
                    <button type="submit" name="acao" value="cadastrar/0" class="btn btn-success btn-block">
                        Cadastrar Caminhão
                    </button>
                </form>             
            </div>
            <div class="col-md-4">
                <form method="post" action="../Controllers/controllerOnibus.php"> 
                <input TYPE="hidden" NAME="form_submit" VALUE="OK">
                    <button type="submit" name="acao" value="cadastrar/0" class="btn btn-warning btn-block">
                        Cadastrar Ônibus
                    </button>
                </form>   
            </div>                             
        </div>              
        <div class="page-header">
            <h2 class="form-signin-heading">
                <div id="m_texto" style="color: blue;"> Carros </div>
            </h2>
        </div>
        <table class='table table-hover'>
            <thead>
                <tr style="color: blue;">
                    <th>ID</th>
                    <th>PLACA</th>
                    <th>CHASSI</th>
                    <th>COR</th>
                    <th>ANO</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>PESO MÁXIMO</th> 
                    <th>PREÇO</th>
                    <th>NÚMERO DE RODAS</th>                        
                </tr>
            </thead>
            <tbody>
                <?php 
                    include_once ("../Controllers/controllerCarro.php");
                    controllerCarro::carregarTabelaVeiculo();  
                ?>
            </tbody>
        </table>
        <div class="page-header">
            <h2 class="form-signin-heading">
                <div id="m_texto" style="color: green;"> Caminhões </div>
            </h2>
        </div>
        <table class='table table-hover'">
            <thead>
                <tr style="color: green;">
                    <th>ID</th>
                    <th>PLACA</th>
                    <th>CHASSI</th>
                    <th>COR</th>
                    <th>ANO</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>PESO MÁXIMO</th> 
                    <th>PREÇO</th>
                    <th>NÚMERO DE RODAS</th>                     
                </tr>
            </thead>
            <tbody>
                <?php 
                    include_once ("../Controllers/controllerCaminhao.php");
                    controllerCaminhao::carregarTabelaVeiculo();  
                ?>
            </tbody>
        </table>      

        <div class="page-header">
            <h2 class="form-signin-heading">
                <div id="m_texto" style="color: orange;"> Ônibus </div>
            </h2>
        </div>        

        <table class='table table-hover'>
            <thead>
                <tr style="color: orange;">
                    <th>ID</th>
                    <th>PLACA</th>
                    <th>CHASSI</th>
                    <th>COR</th>
                    <th>ANO</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>PESO MÁXIMO</th> 
                    <th>PREÇO</th>
                    <th>NÚMERO DE RODAS</th>                     
                </tr>
            </thead>
            <tbody>
                <?php 
                    include_once ("../Controllers/controllerOnibus.php");
                    controllerOnibus::carregarTabelaVeiculo();  
                ?>
            </tbody>
        </table>        
        <div class="page-header">
    		<b>&copy;2019&nbsp;&nbsp;&raquo;&nbsp;&nbsp; Augusto Fernandes Oliveira &nbsp;&nbsp;&raquo;&nbsp;&nbsp; RA: 18549135 </b>
    	</div>      
        <script>
            $(document).ready(function($) {
                $(".table-row").click(function() {
                    window.document.location = $(this).data("href");
                });
            });        
        </script>
    </div>     
</body>
</html>