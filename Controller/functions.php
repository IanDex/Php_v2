<?php
// Abriendo el archivo el cual contiene el valor del dolar en cop
$archivo = fopen("https://dolar.wilkinsonpc.com.co/widgets/gratis/dolar-cop-usd-1.html", "r");
$cont = 0;
// Recorremos todas las lineas del archivo
while(!feof($archivo)){
    $cont++;
    // Leyendo una linea
    $traer = fgets($archivo);
    // En la linea 16 esta el valor que nos intereza
    if ($cont==16) {
      // Lo formateamoms de tal forma que sea util para la operacion 2958.45 25/08/18
        $var = $traer;
        $var1 = explode(",",$var);
        $var2 = explode("$",$var1[0].$var1[1]);
        $var3 = $var2[1];
        $var4 = explode("</div>",$var3);
        global $usd;
        $usd = $var4[0];
       // echo $var4[0];

    }
}
// Cerrando el archivo
fclose($archivo);

