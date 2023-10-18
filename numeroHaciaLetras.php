<?php
    function unidadHaciaLetras($numero) {
        $unidades = ["cero", "un", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve"];
        return $unidades[$numero];
    }
    
    function decenasHaciaLetras($numero) {
        $especiales = ["diez", "once", "doce", "trece", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve", "veinte", "veintiun", "veintidos", "veintitres", "veinticuatro", "veinticinco", "veintiseis", "veintisiete", "veintiocho", "veintinueve"];
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
                return 'un millón de';
            }
            $millones = floor($numero / 1000000);
            $resto = $numero % 1000000;
            if ($resto == 0) {
                return numeroHaciaLetras($millones) . " millones de";
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

    // si el numero contiene decimales
    if (strpos($numeroString, '.') !== false) {

        // separar el numero en dos partes
        $numeroPartes = explode('.', $numeroString);
        $entero = $numeroPartes[0];
        $decimal = $numeroPartes[1];

        if ($decimal == '00') {
            $numeroLetras = numeroHaciaLetras($entero);
            if ($numeroLetras === "un") {
                $resultado = $numeroLetras . ' balboa';
            } else {
                $resultado = $numeroLetras . ' balboas';
            }
        } else if (strlen($decimal) == 1) {
            $decimal = $decimal . '0';
            $enteroLetras = numeroHaciaLetras($entero); 
            $decimalLetras = numeroHaciaLetras($decimal); 
            if ($enteroLetras == 'un') {
                $resultado = "un balboa con $decimalLetras centavos";
            } else {
                $resultado = "$enteroLetras balboas con $decimalLetras centavos";
            }
        } else if ($decimal[0] == '0' and $decimal[1] != '0') {
            $enteroLetras = numeroHaciaLetras($entero);
            $decimalLetras = numeroHaciaLetras($decimal[1]); 
            if ($enteroLetras == 'un') {
                $resultado = ($decimalLetras == 'un') ? "un balboa con un centavo" : "un balboa con $decimalLetras centavos";
            } else {
                $resultado = ($decimalLetras == 'un') ? "$enteroLetras balboas con un centavo" : "$enteroLetras balboa con $decimalLetras centavos";
            }
        } else {
            $enteroLetras = numeroHaciaLetras($entero); 
            $decimalLetras = numeroHaciaLetras($decimal); 
            if ($enteroLetras == 'un') {
                $resultado = "un balboa con $decimalLetras centavos";
            } else {
                $resultado = "$enteroLetras balboas con $decimalLetras centavos";
            }
        }
    } else {
        $numeroLetras = numeroHaciaLetras($numeroString);
        if ($numeroLetras === "un") {
            $resultado = $numeroLetras . ' balboa';
        } else {
            $resultado = $numeroLetras . ' balboas';
        }
    }

    echo $resultado; // enviar el resultado de la conversion como response
?>
