<?php

include_once 'db.php';

class Visitante extends DB{
    
    function obtenerVisitantes(){
        $query = $this->connect()->query('SELECT * FROM consultas_visitantes');
        return $query;
    }

    function agregarConsulta($consulta){
        $query = $this->connect()->prepare('INSERT INTO consultas_visitantes (email, asunto, telefono, mensaje) VALUES (:email, :asunto, :telefono, :mensaje)');
        $query->execute(['email' => $consulta['email'],  'asunto' => $consulta['asunto'], 'telefono' => $consulta['telefono'],  'mensaje' => $consulta['mensaje'],]);
        return $query;
    }


}

?>