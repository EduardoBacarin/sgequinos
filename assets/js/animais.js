var base_url = $("#base_url").val();
var avisos = 'Obrigatório. ';

$(document).ready(function () {
  $('#tabela-animais').DataTable({
    "ordering": true,
    "filter": true,
    "lengthMenu": [25],
    "responsive": true,
    "columns": [{
        "width": "5%",
        "name": "Posição"
      },
      {
        "width": "15%",
        "name": "Nome"
      },
      {
        "width": "10%",
        "name": "Registro"
      },
      {
        "width": "10%",
        "name": "Espécie"
      },
      {
        "width": "10%",
        "name": "Raça"
      },
      {
        "width": "5%",
        "name": "Sexo"
      },
      {
        "width": "10%",
        "name": "Resenha"
      },
      {
        "width": "10%",
        "name": "Ação"
      }
    ],
  });

  $('.item-excluir').on('click', function () {
    var codigo_ani = $(this).data('codigo');
    Swal.fire({
      title: 'Deseja realmente excluir este animal?',
      showCancelButton: true,
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Sim',
      confirmButtonColor: 'green',
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        $.ajax({
          url: base_url + 'animal/inativa_animal',
          type: 'POST',
          data: {
            codigo_ani: codigo_ani
          },
          dataType: 'json',
          success: function (data) {
            if (data.retorno) {
              sucesso(data.msg);
              location.reload();
            } else {
              erro(data.msg);
            }
          },
          error: function () {
            erro('Não foi possível excluir o animal, tente novamente.');
          }
        });
      }
    })
  });


  $('.item-ver-detalhes').on('click', function () {
    var codigo_ani = $(this).data('codigo');
    $.ajax({
      url: base_url + 'animal/busca_animal',
      type: 'POST',
      data: {
        codigo_ani: codigo_ani
      },
      dataType: 'json',
      success: function (data) {
        if (data.retorno) {
          $('#modal-detalhe-animal').modal('show');
          switch (data.dados.classificacao_ani) {
            case "1":
              var classificacao_ani = 'JC';
              $('#classificacao_ani').val(classificacao_ani);
              break;
            case "2":
              var classificacao_ani = 'SH';
              $('#classificacao_ani').val(classificacao_ani);
              break;
            case "3":
              var classificacao_ani = 'H';
              $('#classificacao_ani').val(classificacao_ani);
              break;
            case "4":
              var classificacao_ani = 'FC';
              $('#classificacao_ani').val(classificacao_ani);
              break;
            case "5":
              var classificacao_ani = 'UM';
              $('#classificacao_ani').val(classificacao_ani);
              break;
            case "6":
              var classificacao_ani = 'Outro';
              $('#classificacao_ani').val(classificacao_ani);
              break;
          }
          $('#codigo_ani').val(data.dados.codigo_ani);
          $('#nome_prop').val(data.dados.nome_prop);
          $('#documento_prop').val(data.dados.documento_prop);
          $('#telefone_prop').val(data.dados.telefone_prop);
          $('#nome_ani').val(data.dados.nome_ani);
          $('#registro_ani').val(data.dados.registro_ani);
          $('#especie_ani').val(data.dados.especie_ani);
          $('#raca_ani').val(data.dados.raca_ani);
          $('#sexo_ani').val(data.dados.sexo_ani);
          $('#idade_ani').val(data.dados.idade_ani);
          $('#nome_pro').val(data.dados.nome_pro);
          $('#cidadeuf_pro').val(data.dados.cidade_pro + ' / ' + data.dados.estadouf_pro);
          $('#imagem_resenha').attr('src', data.dados.resenha_ani)
        } else {
          erro(data.msg);
        }
      },
      error: function () {
        erro('Não foi possível excluir o animal, tente novamente.');
      }
    });
  });

  $('#btn-imprimir').on('click', function () {
    $.print("#modal-detalhe-animal");
  });

  $('.item-editar').on('click', function () {
    var codigo_ani = $(this).data('codigo');
    window.location.href = base_url + 'animal/cadastrar_animal/' + codigo_ani;
  });
});