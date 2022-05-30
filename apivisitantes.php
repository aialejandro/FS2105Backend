<?php

include_once 'visitante.php';

class ApiVisitantes{

    private $error;

    //devuelve todos los mensajes
    function getAll(){
        $visitante = new Visitante();
        $visitantes = array();
        $visitantes["items"] = array();

        $res = $visitante->obtenerVisitantes();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['id'],
                    "email" => $row['email'],
                    "asunto" => $row['asunto'],
                    "telefono" => $row['telefono'],
                    "mensaje" => $row['mensaje'],
                );
                array_push($visitantes["items"], $item);
            }

            $this->printJSON($visitantes);
        
        }else{
            $this->printJSON_err(array('mensaje' => 'No hay elementos'));
        }
    }

    //agrega consulta de visitante
    function add($item){
        $consulta = new Visitante();
        $res = $consulta->agregarConsulta($item);
        $this->printJSON_msj(array('mensaje' => 'consulta agregada'));
    }

    function printJSON($arrayVisitantes){
        echo '<code>' . json_encode($arrayVisitantes) . '</code>';
    }

    function printJSON_msj($mensaje){
        echo '<code>' . json_encode($mensaje) . '</code>';
    }

    function printJSON_err($error){
        echo '<code>' . json_encode($error) . '</code>';
    }

    function getError(){
        return $this->error;
    }
}

?>