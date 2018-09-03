var dolar = 0;



var hoy = new Date();
var dd = hoy.getDate();
var mm = hoy.getMonth()+1;
var yyyy = hoy.getFullYear();
var fech = dd + '/' + mm+ '/' + yyyy;
var app = new Vue({
    el: '#vue',
    data: {
        fecha: dd+'/'+mm+'/'+yyyy,

    }
});

var pesos = ($("#dolar").val());

$.ajax({
    url: "../Controller/functions.php",
    success: function(data)
    {
        document.getElementById("pdola").value = data;
    }});

var vaar = new Vue({
    el: '#dolar',
    data: {

        ruta: "../Controller/LoginCtlr.php?action=CerrarSession",

    }
});


