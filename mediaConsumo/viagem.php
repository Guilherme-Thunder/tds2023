<?php 
    include "viagem.class.php";

    $v = new Viagem();

    $marca = $_POST['marca'];
    $v->setMarca($marca);
    $modelo = $_POST['modelo'];
    $v->setModelo($modelo);
    $kmInicial = $_POST['kmInicial'];
    $v->setKmInicial($kmInicial);
    $kmFinal = $_POST['kmFinal'];
    $v->setKmFinal($kmFinal);
    $gasolinaTipo = $_POST['gasolinaTipo'];
    $v->setGasolinaTipo($gasolinaTipo);
    $gasolinaLitro = $_POST['gasolinaLitro'];
    $v->setGasolinaLitro($gasolinaLitro);

    $v->imprimir();

?>