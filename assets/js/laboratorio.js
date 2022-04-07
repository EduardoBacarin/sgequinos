var base_url = $("#base_url").val();

$(document).ready(function () {
  $('#tabela-laboratorios').DataTable({
    "ordering": true,
    "filter": true,
    "lengthMenu": [25],
    "responsive": true,
    "columns": [
      { "width": "5%",  "name": "Posição"},
      { "width": "20%", "name": "Nome"},
      { "width": "10%", "name": "E-Mail"},
      { "width": "5%",  "name": "Telefone"},
      { "width": "20%", "name": "Portaria"},
      { "width": "15%", "name": "Endereço"},
      { "width": "10%", "name": "Cidade/Estado"}
    ],
  });
});