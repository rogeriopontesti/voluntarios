async function getDadosProprietario(entity) {

    $("#modalLabel").html($(entity).attr("data-name"));
    $("#saveChange").addClass("d-none"); 
    $("#dataUrlEdit").addClass("d-none");
    $("#dataUrlEdit").attr("href", "");
    $("#dataUrlDestroy").addClass("d-none");
    $("#dataUrlDestroy").attr("action", "");
    
    let response = await fetch($(entity).attr("data-url"));
    let userData = await response.json();
    var html = `<div class="m-3"><img src="${userData.foto}" class="img-fluid img-thumbnail"/></div>` +
            `<div class="m-3"><strong>Nome social: </strong><br/>${userData.nome_social}</div>` +
            `<div class="m-3"><strong>Email: </strong><br/>${userData.email}</div>` +
            `<div class="m-3"><strong>Telefone: </strong><br/>${userData.telefone}</div>` +
            `<div class="m-3"><strong>Perfil: </strong><br/>${userData.perfil_value}</div>` +
            `<div class="m-3"><strong>Tipo de usuário: </strong><br/>${userData.tipo_de_usuario_value}</div>` +
            `<div class="m-3"><strong>Status: </strong><br/>${userData.status}</div>` +
            `<div class="m-3"><strong>Área de atuação: </strong><br/>${userData.area_de_atuacao}`;
    $("#modalBody").html(html);
}

async function getDadosEvento(entity) {

    $("#modalLabel").html($(entity).attr("data-name"));
    $("#saveChange").addClass("d-none");
    
    let response = await fetch($(entity).attr("data-url-show"));
    let eventData = await response.json();

    var dataUrlEdit = $(entity).attr("data-url-edit");
    var dataUrlDestroy = $(entity).attr("data-url-destroy");
    
    $("#dataUrlEdit").attr("href", dataUrlEdit);
    $("#dataUrlEdit").removeClass("d-none");
            
    $("#dataUrlDestroy").attr("action", dataUrlDestroy);
    $("#dataUrlDestroy").removeClass("d-none");
    
    var html = `<div class="mb-3"><strong>Titulo</strong><br/>${eventData.titulo}</div>` +
            `<div class="mb-3"><strong>Descrição do Evento</strong><br/>${eventData.evento}</div>` +
            `<div class="mb-3"><strong>Data</strong><br/>${eventData.data}</div>` +
            `<div class="mb-3"><strong>Hora</strong><br/>${eventData.hora}</div>` +
            `<div class="mb-3"><strong>Local</strong><br/>${eventData.local}</div>`;

    $("#modalBody").html(html);
}
