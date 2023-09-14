const monto = document.querySelector('#monto');

monto.addEventListener('keydown', (event) => {
    if (event.key === 'Tab') {
        $.ajax({
            type: "POST", //  tipo de request
            url: "/sistema-cheque/numeroHaciaLetras.php", // direccion que captara el request
            data: $("form").serialize(), // datos que contendra el request
            success: function(response){
                document.querySelector('#monto-letra').value = response;
            }
        });
    }
})