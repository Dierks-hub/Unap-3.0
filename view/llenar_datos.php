<?php
header('Content-Type: application/json');

if (isset($_POST['var1'])) {
    $datos = [
        'run' => $_POST['var1'],
        'nombre' => "Fredo Godofredo",
        "email" => "fredogodofredo@email.com",
        'celular' => "+56912341234",
        'telefono' => "+5629123818"
    ];
    $response = [
        'datos' => $datos
    ];
} else {
    $response = array('error' => 'No se recibio');
}

echo json_encode($response);
