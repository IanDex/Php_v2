$(document).ready(function() {
  jQuery(function() {
   jQuery( "#login" ).validate({
     rules: {
             user: {
                     required: true,
                     minlength: 4,
                     maxlength: 20
             },
             pass: {
                     required: true,
                     minlength: 8
             }
     },
     messages: {
             user: {
                     required: "Usuario obligatorio",
                     minlength:"Usuario demaciado corto",
                     maxlength:"Usuario demaciado largo"
             },
             pass: {
                     required: "Password obligatorio",
                     minlength:"Password demaciado corto"
             }
     }
   });

});
});
