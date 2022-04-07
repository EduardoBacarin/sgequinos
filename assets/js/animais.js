var base_url = $("#base_url").val();
var avisos = 'Obrigatório. ';

$(document).ready(function () {
    $('#tabela-animais').DataTable({
        "ordering": true,
        "filter": true,
        "lengthMenu": [25],
        "responsive": true,
        "columns": [
          { "width": "5%",  "name": "Posição"},
          { "width": "20%", "name": "Nome"},
          { "width": "10%", "name": "Registro"},
          { "width": "5%",  "name": "Espécie"},
          { "width": "20%", "name": "Raça"},
          { "width": "15%", "name": "Sexo"},
          { "width": "10%", "name": "Resenha"}
        ],
      });
});