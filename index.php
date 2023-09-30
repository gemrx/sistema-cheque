<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <script src=assets/js/code.jquery.com_jquery-3.7.1.min.js></script>
    <script src="assets/js/script.js" defer></script>
    <title>Sistema Cheque</title>
</head>
<body>
    <main>
        <form  action="">
            <div class="contenido">
                <div class="fila uno">
                    <div class="columna uno">
                        <label for="input-cheque">Número de cheque</label>
                        <input type="number" id="input-cheque" name="numero-cheque"/>
                    </div>
                    <div class="columna dos">
                        <label for="input-fecha">Fecha</label>
                        <input type="date" id="input-fecha" name="input-fecha">
                    </div>
                </div>
                <div class="fila dos">
                    <label for="input-beneficiario">Paguese a la orden de</label>
                    <input type="text" id="input-beneficiario" name="input-beneficiario"/>
                </div>  
                <div class="fila tres">
                    <div class="columna uno">
                        <label for="input-monto">La suma de</label>
                        <input type="text" id="input-monto" name="input-monto" min="0">
                    </div>
                    <div class="columna dos">
                        <input type="text" id="input-monto-letra" name="input-monto-letra" disabled>
                    </div>
                </div>
                <div class="fila cuatro">
                    <label for="descripcion">Descripcion de gasto</label>
                    <input type="text" id="descripcion" name="descripcion">
                </div>
            </div>
        </form>
    </main>
</body>
</html>