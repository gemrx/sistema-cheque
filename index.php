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
                        <label for="numero-cheque">Número de cheque</label>
                        <input type="number" id="numero-cheque" name="numero-cheque" min="0">
                    </div>
                    <div class="columna dos">
                        <label for="fecha">Fecha</label>
                        <input type="date" id="fecha" name="fecha">
                    </div>
                </div>
                <div class="fila dos">
                    <label for="destinatario">Paguese a la orden de</label>
                    <input type="text" id="destinatario" name="destinatario">
                </div>  
                <div class="fila tres">
                    <div class="columna uno">
                        <label for="monto">La suma de</label>
                        <input type="number" id="monto" name="monto" min="0">
                    </div>
                    <div class="columna dos">
                        <input type="text" id="monto-letra" name="monto-letra" disabled>
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