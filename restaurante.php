<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta de cocinero</title>
    </head>
    <body>
        <?php
        require_once 'bbdd.php';
        
        //Si ya he llenado el formulario y se ha pulsado al boton de enviar
        if (isset($_POST["enviar"])) {
            
            //Recibimos los datos del POST
            $nombre = $_POST["nombre"];
            $tel = $_POST["tel"];
            $sexo = $_POST["sexo"];
            $edad = $_POST["edad"];
            $exp = $_POST["exp"];
            $esp = $_POST["esp"];
            
            
            //Insertamos alumno en la BBDD
            insertarCocinero($nombre, $tel, $sexo, $edad, $exp, $esp);
             
            $nombre = mysqli_query(conectar("restaurant"), "select nombre from cocinero");
            foreach($nombre as $value => $val){ 
                foreach ($val as $key => $value) {
                    echo $value."<br>";
                }
            }
            echo "Cocineros con mas de 5 años de experiencia. <br>";
            
            $exp = mysqli_query(conectar("restaurant"), "select nombre from cocinero where experiencia >= 5");
            foreach($exp as $val){ 
                echo $val["nombre"];
//                foreach ($val as $key => $value) {
//                    echo $key." ".$value."<br>";
//                }
            }
            } else {

            echo '
            <form action="" method="POST">
                Nombre: <input type="text" name="nombre"><br>
                Telefono <input type="text" name="tel"><br>
                Sexo: <br>
                Hombre <input type="radio" name="sexo" value="hombre"><br>
                Mujer <input type="radio" name="sexo" value="mujer"><br>
                Edad: <input type="number" name="edad" min="18" max="65"><br>
                Años de experiencia <input type="number" name="exp" min="0" max="50"><br>
                Especialidad: <select name="esp" required/>
                                   <option value="Sopas">Sopas</option>
                                   <option value="Ensaladas">Ensaladas</option>
                                   <option value="Principales">Principales</option>
                                   <option value="Postres">Postres</option>
                              </select>
                <br>
                <input type="submit" name="enviar" value="Alta"><br>
            </form>';
        }
        ?>
    </body>
</html>