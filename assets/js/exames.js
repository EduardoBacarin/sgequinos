var base_url = $("#base_url").val();

$(document).ready(function () {
  $("#tabela-exames").DataTable({
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
    "ajax": base_url + "exame/lista_exames",
    "columns": [{
        "width": "5%",
        "name": "Posição"
      },
      {
        "width": "15%",
        "name": "Número do Exame"
      },
      {
        "width": "25%",
        "name": "Veterinário"
      },
      {
        "width": "25%",
        "name": "Proprietário"
      },
      {
        "width": "15%",
        "name": "Nome do Animal"
      },
      {
        "width": "15%",
        "name": "Registro do Animal"
      },
      {
        "width": "15%",
        "name": "Status",
        render: function (data, type, row, meta) {
          if (data == 1) {
            return '<i class="fa-solid fa-clock" style="color: orange;"></i> Aguardando';
          } else if (data == 2) {
            datafimstr = row[9].replace(/-/g, "/");

            $("#contador-" + row[0]).countdown(new Date(row[9]), function (event) {
              var totalHours = event.offset.totalDays * 24 + event.offset.hours;
              $(this).text(
                event.strftime(totalHours + ':%M:%S')
              );
            });
            var status = '<i class="fa-solid fa-microscope" style="color: orange;"></i> Em Análise<br><span class="countdown-analise justify-content-center" id="contador-' + row[0] + '"></span>';
            return status;
          } else if (data == 3) {
            return ' <i class="fa-solid fa-circle-check" style="color: green;"></i> Aprovado';
          } else if (data == 4) {
            return '<i class="fa-solid fa-ban" style="color: red;"></i> Reprovado';
          }
        }
      },
      {
        "width": "10%",
        "name": "Ações"
      }
    ],
    "columnDefs": [{
        "targets": [8, 9],
        "visible": false
      },
      {
        "targets": [1, 6],
        "className": 'dt-body-nowrap'
      }
    ],
  });


  $(document).on('click', '.item-ver-detalhes', function () {
    var codigo_exa = $(this).data('codigo');

    $.ajax({
      url: base_url + 'exame/buscar_exame',
      type: 'POST',
      data: {
        codigo_exa: codigo_exa
      },
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
          $('#nome_ani').val(data.dados.nome_ani);
          $('#registro_ani').val(data.dados.registro_ani);
          $('#especie_ani').val(data.dados.especie_ani);
          $('#raca_ani').val(data.dados.raca_ani);
          $('#sexo_ani').val(data.dados.sexo_ani);
          $('#idade_ani').val(data.dados.idade_ani);
          $('#nome_pro').val(data.dados.nome_pro);
          $('#cidadeuf_pro').val(data.dados.cidade_pro + '/' + data.dados.estadouf_pro);

          switch (data.dados.status_exa) {
            case "1":
              $("#imagem_status").hide();
              break;
            case "2":
              $("#imagem_status").show();
              $("#imagem_status").attr("src", base_url + "assets/svg/aprovado.svg");
              break;
            case "3":
              $("#imagem_status").show();
              $("#imagem_status").attr("src", base_url + "assets/svg/reprovado.svg");
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

  $(document).on('click', '.item-aprovar-exame', function () {
    var codigo_exa = $(this).data('codigo');
    $.ajax({
      url: base_url + 'exame/aprovar_exame',
      type: 'POST',
      data: {
        codigo_exa: codigo_exa
      },
      dataType: 'json',
      success: function (data) {
        if (data.retorno) {
          $('#tabela-exames').DataTable().draw();
          sucesso(data.msg);
        } else {
          error('Exame não encontrado, atualize a página e tente novamente.')
        }
      }
    });
  });

  $(document).on('click', '.item-reprovar-exame', function () {
    var codigo_exa = $(this).data('codigo');
    $.ajax({
      url: base_url + 'exame/reprovar_exame',
      type: 'POST',
      data: {
        codigo_exa: codigo_exa
      },
      dataType: 'json',
      success: function (data) {
        if (data.retorno) {
          $('#tabela-exames').DataTable().draw();
          sucesso(data.msg);
        } else {
          error('Exame não encontrado, atualize a página e tente novamente.')
        }
      }
    });
  });

  $(document).on('click', '.item-emanalise-exame', function () {
    var codigo_exa = $(this).data('codigo');
    $.ajax({
      url: base_url + 'exame/em_analise_exame',
      type: 'POST',
      data: {
        codigo_exa: codigo_exa
      },
      dataType: 'json',
      success: function (data) {
        if (data.retorno) {
          $('#tabela-exames').DataTable().draw();
          sucesso(data.msg);
        } else {
          error('Exame não encontrado, atualize a página e tente novamente.')
        }
      }
    });
  });

  $(document).on('click', '.item-finalizar-exame', function () {
    var codigo_exa = $(this).data('codigo');
    var tipo_exame = $(this).data('tipo');
    $('#codigo_exa_finaliza').val(codigo_exa);
    $('#tipo_exame').val(tipo_exame);
    $('#modal-finaliza-exame').modal('show');
    $.ajax({
      url: base_url + 'exame/buscar_exame',
      type: 'POST',
      data: {
        codigo_exa: codigo_exa
      },
      dataType: 'json',
      success: function (data) {
        if (data.retorno) {
          var info = data.dados;
          console.log(info);
          switch (info.estgestacional_ani) {
            case '1':
              var estado_gestacional = "NÃO";
              break;
            case '2':
              var estado_gestacional = "SIM";
          }

          switch (info.tipoexame_exa) {
            case '1':
              var tipoexame = "MORMO";
              $('.divAIE').hide();
              $('.divMORMO').show();
              $('#tipoexame_exa_resultado_mormo').val(tipoexame);
              break;
            case '2':
              var tipoexame = "AIE";
              $('.divAIE').show();
              $('.divMORMO').hide();
              $('#tipoexame_exa_resultado_aie').val(tipoexame);
              break;
          }

          /* DADOS PROPRIETÁRIO */
          $('#nome_proprietario').val(info.nome_prop);
          $('#documento_proprietario').val(info.documento_prop);
          $('#endereco_proprietario').val(info.endereco_prop);
          $('#cidadeuf_proprietario').val(info.cidade_prop);
          $('#telefone_proprietario').val(info.telefone_prop);

          /* DADOS VETERINÁRIO */
          $('#nome_veterinario').val(info.nome_vet);
          $('#documento_vet').val(info.documento_vet);
          $('#crmv_vet').val(info.crmv_vet);
          $('#portariacredenciamento_vet').val();
          $('#email_veterinario').val(info.email_vet);
          $('#endereco_veterinario').val(info.logradouro_vet + ', ' + info.numero_vet + ' - ' + info.bairro_vet);
          $('#cidadeuf_veterinario').val(info.cidade_vet + '/' + info.estadouf_vet);
          $('#telefone_veterinario').val(info.telefone_vet);

          /* DADOS ANIMAL */
          $('#nome_animal').val(info.nome_ani);
          $('#especie_animal').val(info.especie_ani);
          $('#raca_animal').val(info.raca_ani);
          $('#pelagem_animal').val(info.pelagem_ani);
          $('#sexo_animal').val(info.sexo_ani);
          $('#estadogestacional_animal').val(estado_gestacional);
          $('#idade_animal').val(info.idade_ani);
          $('#registro_animal').val(info.registro_ani);

          /* DADOS PROPRIEDADE */
          $('#nome_propriedade').val(info.nome_pro);
          $('#logradouro_propriedade').val(info.logradouro_pro);
          $('#bairro_propriedade').val(info.bairro_pro);
          $('#cidadeuf_propriedade').val(info.cidade_pro + '/' + info.estadouf_pro);

          /* DADOS EXAME */
          $('#tipoexame_exa').val(tipoexame);
          $('#datacoleta_exa').val(info.datacoleta_exa).attr('disabled', true);
          $('#datarecepcao_exa').val(moment(info.datarecepcao_exa).format("YYYY-MM-DD")).attr('disabled', true);
        } else {
          error('Exame não encontrado, atualize a página e tente novamente.')
        }
      }
    });
  });

  $('#formModalFinalizarExame').formValidation({
      framework: 'bootstrap',
      excluded: [':disabled', ':hidden', ':not(:visible)'],
      icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        matriz_res: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        numlacre_res: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        datainicial_aie: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        datafinal_aie: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        datainicial_mormo: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        datafinal_mormo: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        nomecomercial_mormo: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        fabricante_mormo: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        partidalote_mormo: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        kitvalidade_mormo: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        nomecomercial_aie: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        fabricante_aie: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        partidalote_aie: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        kitvalidade_aie: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        resultado_mormo: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        datavalidade_mormo: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        resultado_aie: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
            }
          }
        },
        datavalidade_aie: {
          validators: {
            notEmpty: {
              message: 'Obrigatório',
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

      $.each(params, function (i, val) {
        formData.append(val.name, val.value);
      });

      $.ajax({
        url: base_url + 'exame/finalizar_exame',
        type: 'POST',
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
          if (data.retorno) {

          } else {

          }
        }
      });
    });

  $('#modal-finaliza-exame').on('hidden.bs.modal', function () {
    limpa_finaliza_exame();
  })
});

function limpa_finaliza_exame() {
  /* DADOS PROPRIETÁRIO */
  $('#nome_proprietario').val('');
  $('#documento_proprietario').val('');
  $('#endereco_proprietario').val('');
  $('#cidadeuf_proprietario').val('');
  $('#telefone_proprietario').val('');

  /* DADOS VETERINÁRIO */
  $('#nome_veterinario').val('');
  $('#documento_vet').val('');
  $('#crmv_vet').val('');
  $('#portariacredenciamento_vet').val('');
  $('#email_veterinario').val('');
  $('#endereco_veterinario').val('');
  $('#cidadeuf_veterinario').val('');
  $('#telefone_veterinario').val('');

  /* DADOS ANIMAL */
  $('#nome_animal').val('');
  $('#especie_animal').val('');
  $('#raca_animal').val('');
  $('#pelagem_animal').val('');
  $('#sexo_animal').val('');
  $('#estadogestacional_animal').val('');
  $('#idade_animal').val('');
  $('#registro_animal').val('');

  /* DADOS PROPRIEDADE */
  $('#nome_propriedade').val('');
  $('#logradouro_propriedade').val('');
  $('#bairro_propriedade').val('');
  $('#cidadeuf_propriedade').val('');

  /* DADOS EXAME */
  $('#tipoexame_exa').val('');
}