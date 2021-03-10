<?php
    $target_dir = "uploads/";
    $target_file = $target_dir. basename($_FILES["fileToUpload"]["name"]);
    
    $uploadOk = 1;
    $tipoDeArchivo = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //Revisar si la imagen es real o falsa
    if(isset($_POST["subir"])){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        
        if($check !== false){
            echo "El archivo es una imagen - ". $check["mime"]. ".<br/>";
            $uploadOk = 1;
        }

        else {
            echo "El archivo no es una imagen<br/>";
            $uploadOk = 0;
        }
    }

    //Revisa que el archivo exista
    if(file_exists($target_file)){
        echo "Lo sentimos el archivo ya existe<br/>";
        $uploadOk = 0;
    }

    //Revisa si el tamaño es el indicado
    if($_FILES["fileToUpload"]["size"]>250000){
        echo "Lo sentimos, el arcdhivo es muy grande<br/>";
        $uploadOk = 0;
    }

    //Permitir ciertos formatos
    if($tipoDeArchivo!="png" && $tipoDeArchivo != "gif" && $tipoDeArchivo != "jpg" && $tipoDeArchivo != "jpeg"){
        echo "Lo sentimos tipo de archivo no permitido<br/>";
        $uploadOk = 0;
    }

    //Revisa si el Upload es 1 y permite subir el archivo
    if($uploadOk == 0){
        echo "El archivo no puede ser subido, formato o tamaño incorrecto<br/>";
    }else{
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
            echo "El archivo ". htmlspecialchars( basename($_FILES["fileToUpload"]["name"])) . " ha sido subido<br/>";
        }
        else{
            echo "Lo sentimos, hubo un error en el archivo<br/>";
        }
    }
?>