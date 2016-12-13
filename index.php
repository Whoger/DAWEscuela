<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta de alumno</title>
    </head>
    <body>
        <?php
        require_once 'bbdd.php';
        
        //Si ya he llenado el formulario y se ha pulsado al boton de enviar
        if (isset($_POST["enviar"])) {
            
            //Recibimos los datos del POST
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];
            $ciudad = $_POST["ciudad"];
            $telefono = $_POST["telefono"];
            $sexo = $_POST["sexo"];
            
            //Insertamos alumno en la BBDD
            insertarAlumno($nombre, $edad, $ciudad, $telefono, $sexo);
            } else {

            echo '
            <form action="" method="POST">
                Nombre: <input type="text" name="nombre"><br>
                Edad: <input type="number" name="edad"><br>
                Ciudad <input type="text" name="ciudad"><br>
                Telefono <input type="text" name="telefono"><br>
                Sexo: <input type="text" name="sexo"><br>
                <input type="submit" name="enviar" value="Alta">
            </form>';
        }
        ?>
    </body>
</html>
