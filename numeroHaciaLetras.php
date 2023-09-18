<?php
    function unidadHaciaLetras($numero) {
        $unidades = ["cero", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve"];
        return $unidades[$numero];
    }
    
    function decenasHaciaLetras($numero) {
        $especiales = ["diez", "once", "doce", "trece", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve", "veinte", "veintiuno", "veintidos", "veintitres", "veinticuatro", "veinticinco", "veintiseis", "veintisiete", "veintiocho", "veintinueve"];
        $decenas = ["", "", "", "treinta", "cuarenta", "cincuenta", "sesenta", "setenta", "ochenta", "noventa"];
        if ($numero >= 10 && $numero <= 29) {
            return $especiales[$numero - 10];
        }
        $indiceDecena = floor($numero / 10);
        $unidad = $numero % 10;
        if ($unidad == 0) {
            return "{$decenas[$indiceDecena]}";
        }
        return "{$decenas[$indiceDecena]} y " . unidadHaciaLetras($unidad);
    }
    
    function centenasHaciaLetras($numero) {
        $centenas = ["", "ciento", "doscientos", "trescientos", "cuatrocientos", "quinientos", "seiscientos", "setecientos", "ochocientos", "novecientos"];
        if ($numero == 100) {
            return "cien";
        }
        $indiceCentena = floor($numero / 100);
        $resto = $numero % 100;
        if ($resto == 0) {
            return $centenas[$indiceCentena];
        }
        if ($resto >= 1 && $resto <= 9) {
            return "{$centenas[$indiceCentena]} " . unidadHaciaLetras($resto);
        }
        return "{$centenas[$indiceCentena]} " . decenasHaciaLetras($resto);
    }
    
    function numeroHaciaLetras($numero) {
        if ($numero >= 0 && $numero <= 9) {
            return unidadHaciaLetras($numero);
        } else if ($numero >= 10 && $numero <= 99) {
            return decenasHaciaLetras($numero);
        } else if ($numero >= 100 && $numero <= 999) {
            return centenasHaciaLetras($numero);
        } else if ($numero >= 1000 && $numero <= 999999) {
            if ($numero == 1000) {
                return "mil";
            }
            $miles = floor($numero / 1000);
            $resto = $numero % 1000;
            if ($resto == 0) {
                return numeroHaciaLetras($miles) . " mil";
            }
            if ($numero >= 1000 && $numero <= 1999) {
                return "mil " . numeroHaciaLetras($resto);
            }
            return numeroHaciaLetras($miles) . " mil " . numeroHaciaLetras($resto);
        } else if ($numero >= 1000000 && $numero <= 999999999999) {
            if ($numero == 1000000) {
                return '1 millón';
            }
            $millones = floor($numero / 1000000);
            $resto = $numero % 1000000;
            if ($resto == 0) {
                return numeroHaciaLetras($millones) . " millones";
            }
            if ($numero >= 1000000 && $numero <= 1999999) {
                return "un millón " . numeroHaciaLetras($resto);
            }
            return numeroHaciaLetras($millones) . " millones " . numeroHaciaLetras($resto);
        } else {
            return 'Número fuera de rango';
        }
    }
    
    $numeroString = $_POST['monto']; // obtener el dato del post request
    $resultado;

    if (strpos($numeroString, '.') !== false) {
        // si el numero contiene decimales, separar el numero en dos partes
        $numeroPartes = explode('.', $numeroString);
        $entero = $numeroPartes[0];
        $decimal = $numeroPartes[1];
        $enteroLetras = numeroHaciaLetras($entero); // convertir la perte entera a letras
        $decimalLetras = numeroHaciaLetras($decimal); // convertir la parte decimal a letras
        $resultado = "$enteroLetras balboas con $decimalLetras centavos";
    } else {
        $numero = (int)$numeroString;
        $numeroLetras = numeroHaciaLetras($numero);
        $resultado = $numeroLetras . ' balboas';
    }
    echo $resultado; // enviar el resultado de la conversion como response
?>
