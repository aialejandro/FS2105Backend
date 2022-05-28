<?php
    include_once 'apivisitantes.php';

    $api = new ApiVisitantes();

    $email = '';
    $asunto = '';
    $mensaje = '';
    $error = '';

    if(isset($_POST['email']) && isset($_POST['asunto']) && isset($_POST['mensaje'])){

        $item = array(
            'email' => $_POST['email'],
            'asunto' => $_POST['asunto'],
            'mensaje' => $_POST['mensaje']
        );
        
        $api->add($item);

    }else{
        $api->error('Falta el email o el asunto o el mensaje');
    }

    //$api->getAll();    
?>