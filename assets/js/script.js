
const monto = document.querySelector('#monto');

monto.addEventListener('keydown', (event) => {
    // HTTP Request
    if (event.key === 'Tab') {
        $.ajax({
            type: "POST", //  tipo de request
            url: "/sistema-cheque/numeroHaciaLetras.php", // direccion a donde se enviara el request
            data: $("form").serialize(), // datos que contendra el request
            success: function(response){
                document.querySelector('#monto-letra').value = response;
            }
        });
    }
})

monto.addEventListener('keydown', (event) => {
    // prevenir ingresar mas de dos decimales
    if (monto.value.includes('.')) {
        partesDelMonto = monto.value.split('.');
        if (partesDelMonto[1].length === 2 && !isNaN(parseFloat(event.key))) {
            event.preventDefault();
        }
    }
})


