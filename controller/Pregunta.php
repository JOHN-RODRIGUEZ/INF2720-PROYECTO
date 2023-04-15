<?php

class Pregunta{
    static public function guardarPregunta(){
        //var_dump($_POST);
       // var_dump($_POST($_FILES));
       if(isset($_POST['titulo']) && isset($_POST['descripcion'])){
           if(preg_match('/^[a-zA-Z0-9!?,. ]+$/',$_POST['titulo'])&&
           preg_match('/^[a-zA-Z0-9!?,. ]+$/',$_POST['descripcion']))
           {
            
            $directorio ="view/uploads/pregunta/";
            $archivo = $directorio. time().".".pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
           // $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            //var_dump($extension);
            //   var_dump($_FILES['foto']['type']=='imagen/png'||$_FILES['foto']['type']=='imagen/jpg');
            //$tipoArchivo = pathinfo($archivo);
            //var_dump($archivo);
                if(move_uploaded_file($_FILES['foto']['tmp_name'],$archivo)){
                    
                    $dato = [
                        'titulo'=> trim($_POST['titulo']),
                        'descripcion'=>trim($_POST['descripcion']),
                        'foto'=>$archivo,
                        'id_usuario'=> 1
                    ];

                    $respuesta = PreguntaModel::mdlGuardarPregunta("pregunta",$dato);
                    if($respuesta){
                        echo"<script>
                        let text = ' agregado correctamente';
                        if(confirm(text)==true){
                            window.location.href= 'preguntas';
                        }
                        </script>";

                    }else{
                    echo "<script>
                    alert('error al guardar');
                     </script>";
                    }
                }

            
           }else{
            echo "<script>
                    alert('El titulo y descripcion no puede registrar caracteres espedifios')
            </script>";
           }
       }
    }
}