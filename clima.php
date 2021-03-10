<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Bitter" />
    <link rel="stylesheet" href="css/fonts.css" />
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jqueryui.css" />
    <link rel="stylesheet" href="css/jquery.multiselect.css" />
    <link rel="stylesheet" href="css/fields.css" />
    <title>Clima</title>
</head>
<body>
    <h2>¿Como esta el clima?</h2>
    <?php
        //Si no hay nada que se envie en el POST que me muestre el formulario
        if(!isset($_POST['submit'])){

    ?>

    <form action="clima.php" method="post">
        <p>Ingresa tu información:</p>
        Ciudad: <input type="text" name="city" />
        Mes: <input type="text" name="month" />
        Año: <input type="text" name="year" />

        <p>Elige el tipo de clima que estas experimentando. 

            <br />Elije todos los que aplican. </p>
            <input type="checkbox" name="clima[]" value="soleado" />Soleado<br />
            <input type="checkbox" name="clima[]" value="nublado" />Nublado<br />
            <input type="checkbox" name="clima[]" value="lluvia" />Lluvia<br />
            <input type="checkbox" name="clima[]" value="granizo" />Granizo<br />
            <input type="checkbox" name="clima[]" value="nieve" />Nieve<br />
            <input type="checkbox" name="clima[]" value="viento" />Viento<br />
            <input type="checkbox" name="clima[]" value="frio" />Frio<br />
            <input type="checkbox" name="clima[]" value="calor" />Calor<br />
        </p> 

        <input type="submit" name="submit" value="Go" />
    </form>
    <?php
        }
        else{
            //Muestra los datos de ciudad, mes y año
            $input = array($_POST['city'],$_POST['month'],$_POST['year']);

            echo "En $input[0] en el mes de $input[1] y el año $input[2], observaste el siguiente clima: <br/>";
            echo "<ul>";
            //Obtener las opciones de clima
            $clima = $_POST['clima'];

            //Mostrar la información
            foreach($clima as $c){
                echo "<li>$c</li>";
            }
            echo "</ul>";

            crearArchivo($input,$clima);

            leerArchivo();
        }
    
        function crearArchivo($array1,$array2){

            $archivo = fopen('clima.txt','a+');

            foreach($array1 as $val){
                fwrite($archivo,$val."\n");
            }

            fwrite($archivo,"\nClima\n");

            foreach($array2 as $val){
                fwrite($archivo,$val."\n");
            }

            fwrite($archivo,"\n");

            fclose($archivo);

        }

        function leerArchivo(){
            $archivo = fopen('clima.txt','r');

            while(!feof($archivo)){
                echo fgets($archivo)."<br/>";
            }

            fclose($archivo);
        }

    ?>
</body>
</html>