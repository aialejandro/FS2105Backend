<?php
    include_once 'apivisitantes.php';

    $api = new ApiVisitantes();

    $email = '';
    $asunto = '';
    $mensaje = '';
    $telefono = '';
    $error = '';

    if(isset($_POST['email']) && isset($_POST['asunto']) && isset($_POST['mensaje'])){

        $item = array(
            'email' => $_POST['email'],
            'asunto' => $_POST['asunto'],
            'telefono' => $_POST['telefono'],
            'mensaje' => $_POST['mensaje']
        );
        
        $api->add($item);

        //enviar formulario
        $email = $_POST['email'];
        $asunto = $_POST['asunto'];
        $telefono = $_POST['telefono'];
        $mensaje = $_POST['mensaje'];

        $header = 'From: ' . $email . " \r\n";
        $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
        $header .= "Mime-Version: 1.0 \r\n";
        $header .= "Content-Type: text/plain";

        $cuerpomsj = "Asunto de la consulta " . $asunto . ",\r\n";
        $cuerpomsj .= "Su email es: " . $email . " \r\n";
        $cuerpomsj .= "Su teléfono es: " . $telefono . " \r\n";
        $cuerpomsj .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
        $cuerpomsj .= "Enviado el " . date('d/m/Y', time());

        $paracorreo = 'gouldyasociados@gmail.com';
        $asuntocorreo = $asunto;

        mail($paracorreo, $asuntocorreo, utf8_decode($cuerpomsj), $header);

        //header("Location:index.html");


    }else{
        $api->printJSON_err('Falta el email o el asunto o el mensaje');
        $api->getAll();    
    }

    
?>