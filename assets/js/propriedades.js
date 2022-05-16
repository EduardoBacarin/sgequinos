var base_url = $("#base_url").val();
$('#navmain-cadastros').addClass('menu-open');

$(document).ready(function () {
    $('#tabela-propriedades').DataTable({
        "ordering": true,
        "filter": true,
        "lengthMenu": [25],
        "responsive": true,
        "columns": [
          { "width": "3%",  "name": "Posição"},
          { "width": "20%",  "name": "Nome"},
          { "width": "15%",  "name": "E-Mail"},
          { "width": "15%",  "name": "Documento"},
          { "width": "15%",  "name": "Telefone"},
          { "width": "15%",  "name": "Endereço"},
          { "width": "15%",  "name": "Cidade/Estado"},
          { "width": "5%",  "name": "Ação"}
        ],
    });
});