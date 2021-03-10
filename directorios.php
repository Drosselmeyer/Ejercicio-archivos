<?php
    //Definir la ruta del directorio
    $ruta = "D:\Documentos\UDB\DSS404\Semana 7";

    $directorio = opendir($ruta);

    while(($archivos = readdir($directorio))!== FALSE){
        echo $archivos."<br/>";
    }

?>