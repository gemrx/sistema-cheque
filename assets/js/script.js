const monto = document.querySelector('#monto');
const montoLetras = document.querySelector('#monto-letra');
const inputFecha =  document.querySelector('#fecha');

// Establecer la fecha actual como valor por defecto
let fechaActual = new Date();
let actualyear = fechaActual.getFullYear();
let mesActual = String(fechaActual.getMonth() + 1).padStart(2, '0');
let diaActual = String(fechaActual.getDate()).padStart(2, '0');
inputFecha.value = `${actualyear}-${mesActual}-${diaActual}`;``

// HTTP Request  
monto.addEventListener('keydown', (event) => {
    if (event.key === 'Tab') {
        if (monto.value === '') {
            montoLetras.value = '';
        } else {
            $.ajax({
                type: "POST", //  tipo de request
                url: "/sistema-cheque/numeroHaciaLetras.php", // direccion a donde se enviara el request
                data: $("form").serialize(), // datos que contendra el request
                success: function(response){
                    montoLetras.value = response;
                }
            });
        }
    }
})

// prevenir ingresar mas de dos decimales
monto.addEventListener('keydown', (event) => {
    if (monto.value.includes('.')) {
        partesDelMonto = monto.value.split('.');
        
        // si ya hay dos numeros decimales, prevenir ingresar otro numero decimal
        if (partesDelMonto[1].length === 2 && !isNaN(parseFloat(event.key))) {
            event.preventDefault();s
        }
    }
})

document.addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {
        // partesDeFecha = inputFecha.value.split('-');
        // year = partesDeFecha[0];
        // mes = partesDeFecha[1];
        // dia = partesDeFecha[2];
        
        if (inputFecha.value === '') {
            window.alert('Por favor, ingresa una fecha válida');
        } 
    }
})








