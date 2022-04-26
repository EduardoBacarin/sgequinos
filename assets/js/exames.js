var base_url = $("#base_url").val();

$(document).ready(function () {
    $('#tabela-exames').DataTable({
        "ordering": true,
        "filter": true,
        "lengthMenu": [25],
        "responsive": true,
        "columns": [
          { "width": "5%",  "name": "Posição"},
          { "width": "10%", "name": "Número do Exame"},
          { "width": "15%", "name": "Proprietário"},
          { "width": "15%", "name": "Nome do Animal"},
          { "width": "10%", "name": "Registro do Animal"},
          { "width": "10%", "name": "Status"},
          { "width": "10%", "name": "Ações"}
        ],
    });


    $('.item-ver-detalhes').on('click', function(){
      var codigo_exa = $(this).data('codigo');

      $.ajax({
        url: base_url + 'exame/buscar_exame',
        type: 'POST',
        data: { codigo_exa: codigo_exa },
        dataType: 'json',
        success: function (data) {
          console.log(data.dados);
            if (data.retorno) {
              $('#modal-detalhe-exame').modal('show');
              $('#nome_prop').val(data.dados.nome_prop);
              $('#documento_prop').val(data.dados.documento_prop);
              $('#telefone_prop').val(data.dados.telefone_prop);
              $('#nome_lab').val(data.dados.nome_lab);
              $('#telefone_lab').val(data.dados.telefone_lab);
              $('#portariacredenciamento_lab').val(data.dados.portariacredenciamento_lab);
              $('#cidadeestado_lab').val(data.dados.cidade_lab + '/' + data.dados.estadouf_lab);
              $('#comentarios_exa').val(data.dados.comentarios_exa);

              switch (data.dados.classificacao_ani){
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
              $('#nome_ani').val(data.dados.nome_ani);
              $('#registro_ani').val(data.dados.registro_ani);
              $('#especie_ani').val(data.dados.especie_ani);
              $('#raca_ani').val(data.dados.raca_ani);
              $('#sexo_ani').val(data.dados.sexo_ani);
              $('#idade_ani').val(data.dados.idade_ani);
              $('#nome_pro').val(data.dados.nome_pro);
              $('#cidadeuf_pro').val(data.dados.cidade_pro + '/' + data.dados.estadouf_pro);

              switch (data.dados.status_exa){
                case "1":
                  $("#imagem_status").hide();
                  break;
                case "2":
                  $("#imagem_status").show();
                  $("#imagem_status").attr("src",base_url + "assets/svg/aprovado.svg");
                  break;
                case "3":
                  $("#imagem_status").show();
                  $("#imagem_status").attr("src",base_url + "assets/svg/reprovado.svg");
                  break;
                case "4":
                  $("#imagem_status").hide();
                  break;
              }

              $('#imagem_resenha').attr('src', data.dados.resenha_ani)

            } else {
              error('Exame não encontrado, atualize a página e tente novamente.')  
            }
        }
    });
    });
});