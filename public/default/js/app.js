$(document).ready(function () {

    $("#dataUrlDestroy").on("submit", function (event) {
        event.preventDefault();
        if (confirm("* Você está prestes a excluir este registro e não poderá recuperá-lo, deseja continuar?")) {
            event.currentTarget.submit();
        }
    });
    
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