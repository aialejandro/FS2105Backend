<?php

include_once 'db.php';

class Visitante extends DB{
    
    function obtenerVisitantes(){
        $query = $this->connect()->query('SELECT * FROM consultas_visitantes');
        return $query;
    }

    function agregarConsulta($consulta){
        $query = $this->connect()->prepare('INSERT INTO consultas_visitantes (email, asunto, mensaje) VALUES (:email, :asunto, :mensaje)');
        $query->execute(['email' => $consulta['email'],  'asunto' => $consulta['asunto'],  'mensaje' => $consulta['mensaje'],]);
        return $query;
    }


}

?>