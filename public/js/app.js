function ConfirmDelete() {
    var x = confirm("está seguro de quere eliminar el registro?");
    if (x)
    return true;
    else
    return false;
}

function limpiar_campos_ajax(id_formulario) {
    var formulario = $('#'+id_formulario);
    var campos = formulario.find('.campo-ajax');

    $.each(campos, function(clave_campo,  campo){

        var tipo_elemento =  campo.nodeName;

        switch(tipo_elemento) {
            case 'SELECT':
                var opciones = $( campo).children();

                $.each(opciones, function(clave_opcion,  opcion){
                    var  valor_campo = $( opcion).val();

                    if( valor_campo !== '') {
                         $(opcion).remove();
                    }
                });
                break;

            default:
                $( campo).val('');
        }
    });
}

$('.campo_numerico').keydown(function(e){
    // Permite: backspace, delete, tab, escape, enter y .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
         // Permite: Ctrl+A, Command+A
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
         // Permite: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
             // Deja que pase, no hace nada.
             return;
    }
    // Se asegura de que la tecla presionada sea un numero. En caso contrario, detiene la ejecución del keydown.
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});
