<?php

//Fichero donde metemos las funciones que tengan relacion con la BBDD



//Funcion que conecta con una BBDD
//Devuelve la coneccion 
//Si hay error interrumpe y da mensaje de error

function conectar($database){
    $con = mysqli_connect("localhost","root","",$database)
        or die ("No se ha podido conectar con la BBDD.");
    return $con;
}

//Funcion que cierra la coneccion con la BBDD

function desconectar($conexion){
    mysqli_close($conexion);
}

//Funcion que inserta el alumno en la BBDD

function insertarCocinero($nombre, $tel, $sexo, $edad, $exp, $esp){
    //Conectamos con la BBDD
    $con = conectar("restaurant");
    //Preparamos la consulta $insert del alumno
    $insert = "insert into cocinero values ('$nombre',$tel,'$sexo',$edad, '$exp','$esp')";
    //Ejecutamos la consulta
    if(mysqli_query($con, $insert)){
    //Si ha ido bien
    echo "El Cocinero se ha dado de alta";
} else {
    //Sino mostramos error
    echo mysqli_error($con);
}
//Desconectamos con la BBDD
desconectar($con);
}
?>