<?php
include_once ("controllerCaminhao.php");
include_once ("controllerCarro.php");
include_once ("controllerOnibus.php");

class controllerVeiculos{


    public static function index() {
        echo "<script>window.location='Views/viewVeiculos.php'</script>";
    }
}
?>