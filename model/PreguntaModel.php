<?php
require_once 'Conexion.php';

class PreguntaModel{
    
   
    public static function mdlGuardarPregunta($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo,descripcion,foto,id_usuario) VALUES(:titulo, :descripcion, :foto, :id_usuario)");
        $stmt->bindParam(':titulo', $datos['titulo'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':foto', $datos['foto'], PDO::PARAM_STR);
        $stmt->bindParam(':id_usuario', $datos['id_usuario'], PDO::PARAM_INT);

        if($stmt->execute())
            return true;
        else
            return false;
    }

}
