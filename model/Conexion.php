<?php
class Conexion{
    static public function conectar(){

        $link = new PDO("mysql:host=localhost;dbname=proyecto","root","");
        $link->exec("set  name utf-8");
        return $link;
    }
}