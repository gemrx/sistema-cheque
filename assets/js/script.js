// DECLARACIONES INICIALES
//
const inputCheque = document.querySelector('#input-cheque');
const inputBeneficiario = document.querySelector('#input-beneficiario');
const inputMonto = document.querySelector('#input-monto');
const inputMontoLetras = document.querySelector('#input-monto-letra');
const inputFecha =  document.querySelector('#input-fecha');

let fechaActual = new Date();
let actualyear = fechaActual.getFullYear();
let mesActual = String(fechaActual.getMonth() + 1).padStart(2, '0');
let diaActual = String(fechaActual.getDate()).padStart(2, '0');
inputFecha.value = `${actualyear}-${mesActual}-${diaActual}`;``


// FUNCIONES
//
function convertirMontoHaciaLetras() {
    // HTTP Request
    $.ajax({
        type: "POST", //  tipo de request
        url: "/sistema-cheque/numeroHaciaLetras.php", // direccion a donde se enviara el request
        data: $("form").serialize(), // datos que contendra el request
        success: function(response){
            inputMontoLetras.value = response;
        }
    });
}


// EVENTOS
//
inputCheque.addEventListener('keydown', (event) => {
    if (event.key === 'e' || event.key === '-') {
        event.preventDefault();
    }
})

inputBeneficiario.addEventListener('keydown', (event) => {
    console.log(event)
    if (!isNaN(parseFloat(event.key))) {
        event.preventDefault();
    }
})

inputMonto.addEventListener('keydown', (event) => {
    if (!isNaN(parseFloat(event.key)) || event.key === '.' || event.key === 'Backspace' || event.key === 'Tab' || event.key === 'Enter' || event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
        // evitra mas de un zero a la izquierda
        if (inputMonto.value === '0' && !isNaN(parseFloat(event.key))) {
            event.preventDefault();
        }
        
        // evitar mas de dos decimales
        if (inputMonto.value.includes('.')) {
            partesDelMonto = inputMonto.value.split('.');
            parteDecimal = partesDelMonto[1];
            if (parteDecimal.length === 2 && !isNaN(parseFloat(event.key))) {
                event.preventDefault();
            }
        }

        // hacer la conversion numero al presiona TAB
        if (event.key === 'Tab') {
            if (inputMonto.value === '') {
                inputMontoLetras.value = '';
            } else {
                convertirMontoHaciaLetras();
            }
        }
    } else {
        event.preventDefault();
    }    
})

document.addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {
        // prevenir ingresar una fecha incorrecta   
        if (inputFecha.value === '') {
            window.alert('Por favor, ingresa una fecha válida');
        } 
    }
})








