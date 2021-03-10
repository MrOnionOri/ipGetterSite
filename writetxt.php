<?php

/*if(isset($_POST['opt'])){
    echo "aqui";
}else{
    echo "no hay formulario";
}*/

if (isset($_POST['ip'])) {
    $ip = $_POST['ip'];
    $city = $_POST['city'];
    $code = $_POST['countryCode'];
    
    $archivoCompleto = "";


    $file = fopen("datos.txt", "r");

    while(!feof($file)){
        $content = fgets($file);
        echo "contenido: " . $content;
        $archivoCompleto = $archivoCompleto . $content;
    }

    fclose($file);

    $archivo = fopen("datos.txt","w+b");

    echo "dato: " . $archivoCompleto;

    $archivoCompleto = $archivoCompleto . "----------------------------------\n";
    
    $archivoCompleto = $archivoCompleto . "IP: " . $ip . "\n";

    $archivoCompleto = $archivoCompleto . "Ciudad: " . $city . "\n";
    $archivoCompleto = $archivoCompleto . "Pais: " . $code . "\n";

    if( $archivo == false ) {
      echo "Error al crear el archivo";
    }
    else
    {
        // Escribir en el archivo:
         fwrite($archivo, $archivoCompleto);
        // Fuerza a que se escriban los datos pendientes en el buffer:
         fflush($archivo);
    }
    // Cerrar el archivo:
    fclose($archivo);
}
else {
    echo 'No hay datos que guardar!';
}
?>