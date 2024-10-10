$(document).ready(function () {

    //botão excluir evento da div modal
    $("#dataUrlDestroy").on("submit", function (event) {
        event.preventDefault();
        if (confirm($("#dataUrlDestroy > input[name=confirmGeneric]").val())) {
            event.currentTarget.submit();
        }
    });
    
    //botão excluir evento da lista
    $(".del").on("submit", function (event) {
        event.preventDefault();
        if (confirm($(".del > input[name=confirm]").val())) {
            event.currentTarget.submit();
        }
    });

    //altera o icone do evento 
    $('#fotoEvento').change(function (event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $(".img-evento").fadeIn("fast").attr('src', tmppath);
    });
});