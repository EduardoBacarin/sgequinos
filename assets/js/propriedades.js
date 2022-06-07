var base_url = $("#base_url").val();
$('#navmain-cadastros').addClass('menu-open');

$(document).ready(function () {
    $("#tabela-propriedades").DataTable({
      "ordering": false,
      "serverSide": true,
      "aaSorting": [],
      "order": [],
      "filter": false,
      "lengthMenu": [
        [10, 50, 75, 100],
        ['10', '50', '75', '100']
      ],
      "processing": true,
      "ajax": base_url + "propriedade/lista_propriedades",
      "columns": [{
          "width": "5%",
          "name": "Posição"
        },
        {
          "width": "25%",
          "name": "Nome"
        },
        {
          "width": "25%",
          "name": "Proprietario",
        },
        {
          "width": "10%",
          "name": "Equinos na Propriedade"
        },
        {
          "width": "10%",
          "name": "Endereço"
        },
        {
          "width": "10%",
          "name": "Vencimento"
        },
        {
          "width": "10%",
          "name": "Cidade/Estado"
        }
      ],
      "columnDefs": [{
        "targets": [0, 1, 2, 3, 4],
        "className": 'dt-body-nowrap'
      }],
    });
});