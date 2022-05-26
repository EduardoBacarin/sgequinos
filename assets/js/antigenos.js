var base_url = $("#base_url").val();
var avisos = 'Obrigatório. ';

$('#navmain-cadastros').addClass('menu-open');

$(document).ready(function () {
  $("#tabela-antigenos").DataTable({
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
    "ajax": base_url + "antigeno/lista_antigenos",
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
        "name": "Fabricante",
      },
      {
        "width": "10%",
        "name": "Lote"
      },
      {
        "width": "10%",
        "name": "Tipo"
      },
      {
        "width": "10%",
        "name": "Vencimento"
      },
      {
        "width": "10%",
        "name": "Ações"
      }
    ],
    "columnDefs": [{
      "targets": [0, 1, 2, 3, 4],
      "className": 'dt-body-nowrap'
    }],
  });

  $('#adicionar-antigeno').on('click', function () {
    $('#modal-cadastra-antigeno').modal('show');
  })

  $('#formModalCadastrarAntigeno').formValidation({
      framework: 'bootstrap',
      excluded: [':disabled', ':hidden', ':not(:visible)'],
      icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        nome_ant: {
          validators: {
            notEmpty: {
              message: avisos
            }
          }
        },
        fabricante_ant: {
          validators: {
            notEmpty: {
              message: avisos
            }
          }
        },
        lote_ant: {
          validators: {
            notEmpty: {
              message: avisos
            }
          }
        },
        validade_ant: {
          validators: {
            notEmpty: {
              message: avisos
            }
          }
        },
      }
    })
    .on('success.form.fv', function (e) {
      e.preventDefault();

      var $form = $(e.target),
        params = $form.serializeArray(),
        formData = new FormData();

      // $form.find('[type="submit"]').attr('disabled', true);

      $.each(params, function (i, val) {
        formData.append(val.name, val.value);
      });

      $.ajax({
        url: base_url + 'antigeno/salvar_antigeno',
        type: 'POST',
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
          if (data.retorno) {
            $("#tabela-antigenos").DataTable().draw();
            $('#modal-cadastra-antigeno').modal('hide');
            sucesso(data.msg)
          } else {
            erro('Falha ao cadastrar o antígeno, verifique os campos');
          }
        }
      });
    });
});

$(document).on('click', '.item-excluir', function () {
  var codigo_ant = $(this).data('codigo');
  console.log(codigo_ant);
  Swal.fire({
    title: 'Deseja realmente excluir este antígeno?',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Sim',
    confirmButtonColor: 'green',
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: base_url + 'antigeno/inativa_antigeno',
        type: 'POST',
        data: {
          codigo_ant: codigo_ant
        },
        dataType: 'json',
        success: function (data) {
          if (data.retorno) {
            sucesso(data.msg);
            $("#tabela-antigenos").DataTable().draw();
          } else {
            erro(data.msg);
          }
        },
        error: function () {
          erro('Não foi possível excluir o antígeno, tente novamente.');
        }
      });
    }
  })
});