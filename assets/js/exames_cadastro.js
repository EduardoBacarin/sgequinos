var base_url = $("#base_url").val();

$(document).ready(function () {

    /* BLUR DE CHECAGEM SE O NÚMERO DO EXAME JÁ EXISTE */
    /* $('#numeroexame_exa').on('blur', function () {
        var numero_exame = $(this).val();
        if ( numero_exame.length > 0 ) {
            $.ajax({
                url: base_url + 'exame/busca_numero_exame',
                type: 'POST',
                data: {
                    numero_exame: numero_exame
                },
                dataType: 'json',
                success: function (data) {
                    if (data.retorno) {
                        $('#btn-salvar-exame').prop('disabled', false);
                    } else {
                        $('#btn-salvar-exame').prop('disabled', true);
                        erro(data.msg);
                    }
                },
                error: function () {
                    erro('Não foi possível buscar os exames com este número');
                }
            });
        }
    }); */
    /* FINAL DO BLUR DE CHECAGEM SE O NÚMERO DO EXAME JÁ EXISTE */

    /* SELECT DO LABORATÓRIO */
    $('#select_laboratorio').on('change', function () {
        var codigo_lab = $(this).val();

        $.ajax({
            url: base_url + 'laboratorio/busca_laboratorio',
            type: 'POST',
            data: {
                codigo_lab: codigo_lab
            },
            dataType: 'json',
            success: function (data) {
                if (data.retorno) {
                    $('#codigo_lab').val(data.dados['codigo_lab']);
                    $('#nome_lab').val(data.dados['nome_lab']);
                    $('#portariacredenciamento_lab').val(data.dados['portariacredenciamento_lab']);
                    $('#email_lab').val(data.dados['email_lab']);
                    $('#cep_lab').val(data.dados['cep_lab']);
                    $('#rua_lab').val(data.dados['rua_lab']);
                    $('#numero_lab').val(data.dados['numero_lab']);
                    $('#bairro_lab').val(data.dados['bairro_lab']);
                    $('#cidade_lab').val(data.dados['cidade_lab']);
                    $('#estadouf_lab').val(data.dados['estadouf_lab']);
                } else {
                    aviso('Nenhum laboratório foi encontrado!');
                }
            },
            error: function () {
                erro('Não foi possível buscar os laboratórios, atualize e tente novamente');
            }
        });
    });
    /* FINAL DO SELECT DO LABORATÓRIO */

    /* SELECT DO PROPRIETÁRIO */
    $('#select_proprietarios').on('change', function () {
        var codigo_prop = $(this).val();
        if (codigo_prop != 0) {
            $.ajax({
                url: base_url + 'proprietario/busca_proprietario',
                type: 'POST',
                data: {
                    codigo_prop: codigo_prop
                },
                dataType: 'json',
                success: function (data) {
                    if (data.retorno) {
                        /* COMPLETA OS CAMPOS DO PROPRIETÁRIO */
                        $('#codigo_prop').val(data.dados['codigo_prop']);
                        $('#nome_prop').val(data.dados['nome_prop']);
                        $('#documento_prop').val(data.dados['documento_prop']);
                        $('#email_prop').val(data.dados['email_prop']);
                        $('#cep_prop').val(data.dados['cep_prop']);
                        $('#endereco_prop').val(data.dados['endereco_prop']);
                        $('#numero_prop').val(data.dados['numero_prop']);
                        $('#bairro_prop').val(data.dados['bairro_prop']);
                        $('#cidade_prop').val(data.dados['cidade_prop']);
                        $('#estadouf_prop').val(data.dados['estadouf_prop']);
                        /* BUSCA AS PROPRIEDADES CADASTRADAS NO PROPRIETÁRIO */
                        $.ajax({
                            url: base_url + 'propriedade/lista_propriedades_porproprietario',
                            type: 'POST',
                            data: {
                                codigo_prop: codigo_prop
                            },
                            dataType: 'json',
                            success: function (data) {
                                if (data.retorno) {
                                    /* ADICIONA AS PROPRIEDADES NO SELECT OPTION */
                                    $('#select_propriedade').prop('disabled', false);
                                    $('#select_propriedade')
                                        .find('option')
                                        .remove()
                                        .end()
                                        .append('<option value="0" selected>Selecione uma Propriedade</option>')
                                        .val(0);
                                    $(data.dados).each(function (index, element) {
                                        $('#select_propriedade').append(`<option value="${element.codigo_pro}" data-cidade="${element.cidade_pro}" data-estado="${element.estadouf_pro}">
                                        ${element.nome_pro}
                                    </option>`);
                                    });
                                } else {
                                    $('#select_propriedade')
                                        .find('option')
                                        .remove()
                                        .end()
                                        .append('<option value="0" selected>Cadastre uma propriedade primeiro</option>')
                                        .val(0);
                                    // $('#select_propriedade').find("option:first").text('Cadastre uma propriedade primeiro.').val(0).prop('selected', true)
                                    aviso('Esse proprietário não possui nenhuma propriedade cadastrada');
                                }
                            },
                            error: function () {
                                erro('Desculpe, encontramos um erro e não foi possível buscar as propriedades, atualize e tente novamente');
                            }
                        });

                        /* BUSCA OS ANIMASI CADASTRADOS NO PROPRIETÁRIO */
                        $.ajax({
                            url: base_url + 'proprietario/busca_animais_prop',
                            type: 'POST',
                            data: {
                                codigo_prop: codigo_prop
                            },
                            dataType: 'json',
                            success: function (data) {
                                if (data.retorno) {
                                    /* ADICIONA OS ANIMAIS NO SELECT OPTION */
                                    $('#select_animal').prop('readonly', false);
                                    $('#select_animal')
                                        .find('option')
                                        .remove()
                                        .end()
                                        .append('<option value="0" selected>Selecione um Animal</option>')
                                        .val(0);
                                    $(data.dados).each(function (index, element) {
                                        $('#select_animal').append(`<option value="${element.codigo_ani}">
                                           ${element.nome_ani}
                                      </option>`);
                                    });

                                    sucesso('Lista de animais carregada');
                                } else {
                                    $('#select_animal')
                                        .find('option')
                                        .remove()
                                        .end()
                                        .append('<option value="0" selected>Complete os dados do animal</option>')
                                        .val(0);
                                    // $('#select_animal').find("option:first").text('Complete os dados do animal').val(0).prop('selected', true)
                                    aviso('Esse proprietário não possui nenhum animal cadastrado');
                                }
                            },
                            error: function () {
                                erro('Erro na busca dos animais do proprietário');
                            }
                        });
                    } else {
                        alert('Não foi encontrado nenhum dado do proprietário, atualize e tente novamente');
                    }
                },
                error: function () {
                    erro('Desculpe, encontramos um erro e não foi possível buscar os proprietários, atualize e tente novamente');
                }
            });
        } else {
            /* LIMPA OS CAMPOS CASO O SELECT ESTEJA VAZIO */
            $('#codigo_prop').val(0);
            $('#nome_prop').val('');
            $('#documento_prop').val('');
            $('#email_prop').val('');
            $('#cep_prop').val('');
            $('#endereco_prop').val('');
            $('#numero_prop').val('');
            $('#bairro_prop').val('');
            $('#cidade_prop').val('');
            $('#estadouf_prop').val('');
            $('#select_animal').val(0).trigger('change');
            $('#select_propriedade').val(0).trigger('change');
        }
    });
    /* FINAL DO SELECT DO PROPRIETÁRIO */

    /* SELECT DO ANIMAL */
    $('#select_animal').on('change', function () {
        var codigo_ani = $(this).val();
        if (codigo_ani !== '0') {
            $.ajax({
                url: base_url + 'animal/busca_animal',
                type: 'POST',
                data: {
                    codigo_ani: codigo_ani
                },
                dataType: 'json',
                success: function (data) {
                    if (data.retorno) {
                        $('#nome_ani').val(data.dados['nome_ani']);
                        $('#registro_ani').val(data.dados['registro_ani']);
                        $('#especie_ani').val(data.dados['especie_ani']);
                        $('#raca_ani').val(data.dados['raca_ani']);
                        $('#sexo_ani').val(data.dados['sexo_ani']);
                        $('#idade_ani').val(data.dados['idade_ani']);
                        $('#pelagem_ani').val(data.dados['pelagem_ani']);
                        $('#select_propriedade').val(data.dados['codigo_pro']);
                        $('#cidade_ani').val(data.dados['cidade_pro']);
                        $('#estado_ani').val(data.dados['estadouf_pro']);
                        var img = new Image();
                        img.onload = function () {
                            var f_img = new fabric.Image(img);
                            canvas.setBackgroundImage(f_img);
                            canvas.renderAll();
                        };
                        img.src = base_url + data.dados['resenha_ani'];
                    } else {
                        alert('Nenhum animal encontrado');
                    }
                },
                error: function () {
                    erro('Erro ao buscar os animais');
                }
            });
        } else {
            $('#nome_ani').val('');
            $('#registro_ani').val('');
            $('#especie_ani').val('');
            $('#raca_ani').val('');
            $('#sexo_ani').val(1);
            $('#idade_ani').val('');
            $('#select_propriedade').val(0);
            $('#cidade_ani').val('');
            $('#estado_ani').val('');
        }
    });

    /* SELECT DA PROPRIEDADE */
    $('#select_propriedade').on('change', function () {
        var cidade = $(this).find(':selected').data('cidade');
        var estado = $(this).find(':selected').data('estado');

        $('#cidade_ani').val(cidade);
        $('#estado_ani').val(estado);
    });

    /* SELECT DA CLASSIFICAÇÃO */
    $('#select_classificacao').on('change', function () {
        var codigo_classificacao = $(this).val();
        if (codigo_classificacao == 6) {
            $('#divOutraClassificacao').show();
        } else {
            $('#divOutraClassificacao').hide();
        }
    });

    /* FORMULÁRIO DE CADASTRO DO EXAME */
    $('#formCadastroExame').formValidation({
            framework: 'bootstrap',
            excluded: [':disabled', ':hidden', ':not(:visible)'],
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                select_laboratorio: {
                    validators: {
                        notEmpty: {
                            message: 'É obrigatório a seleção de um laboratório',
                        }
                    }
                },
                select_proprietarios: {
                    validators: {
                        notEmpty: {
                            message: 'É obrigatório a seleção de um proprietário',
                        }
                    }
                },
                nome_prop: {
                    validators: {
                        notEmpty: {
                            message: 'Nome do proprietário deve estar completo, finalize o cadastro',
                        }
                    }
                },
                documento_prop: {
                    validators: {
                        notEmpty: {
                            message: 'Documento do proprietário deve estar completo, finalize o cadastro',
                        }
                    }
                },
                email_prop: {
                    validators: {
                        notEmpty: {
                            message: 'E-Mail do proprietário deve estar completo, finalize o cadastro',
                        }
                    }
                },
                cep_prop: {
                    validators: {
                        notEmpty: {
                            message: 'CEP do proprietário deve estar completo, finalize o cadastro',
                        }
                    }
                },
                nome_ani: {
                    validators: {
                        notEmpty: {
                            message: 'O número do exame não pode ser vazio',
                        }
                    }
                },
                registro_ani: {
                    validators: {
                        notEmpty: {
                            message: 'O número do exame não pode ser vazio',
                        }
                    }
                },
                especie_ani: {
                    validators: {
                        notEmpty: {
                            message: 'O número do exame não pode ser vazio',
                        }
                    }
                },
                raca_ani: {
                    validators: {
                        notEmpty: {
                            message: 'O número do exame não pode ser vazio',
                        }
                    }
                },
                sexo_ani: {
                    validators: {
                        notEmpty: {
                            message: 'O número do exame não pode ser vazio',
                        }
                    }
                },
                idade_ani: {
                    validators: {
                        notEmpty: {
                            message: 'O número do exame não pode ser vazio',
                        }
                    }
                },
                select_propriedade: {
                    validators: {
                        notEmpty: {
                            message: 'A propriedade deve estar selecionada, selecione ou cadastre uma propriedade',
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

            var resenha = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");

            $.each(params, function (i, val) {
                formData.append(val.name, val.value);
            });
            formData.append('resenha_base64', resenha);

            $.ajax({
                url: base_url + 'exame/salvar_exame',
                type: 'POST',
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.retorno) {
                        window.location.href = 'http://localhost/sgequinos/exame';
                    } else {
                        erro('Erro ao salvar o exame, verifique todos os dados e tente novamente');
                    }
                }
            });
        });
    /* FINAL DO FORMULÁRIO DE CADASTRO DO EXAME */

    /* FORMULÁRIO DO MODAL DE CADASTRO DE PROPRIEDADE */
    $('#formModalCadastroPropriedade').formValidation({
            framework: 'bootstrap',
            excluded: [':disabled', ':hidden', ':not(:visible)'],
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                select_proprietarios: {
                    validators: {
                        notEmpty: {
                            message: 'É obrigatório a seleção de um proprietário',
                        }
                    }
                },
                nome_pro: {
                    validators: {
                        notEmpty: {
                            message: 'Nome do proprietário deve estar completo, finalize o cadastro',
                        }
                    }
                },
                qtdequinos_pro: {
                    validators: {
                        notEmpty: {
                            message: 'Documento do proprietário deve estar completo, finalize o cadastro',
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
                url: base_url + 'propriedade/salvar_propriedade',
                type: 'POST',
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.retorno) {
                        sucesso(data.msg);
                        $('#modal-cadastro-propriedade').modal('hide');
                        $('#select_proprietarios_modal').val(0)
                        $('#nome_pro').val('')
                        $('#qtdequinos_pro').val('')
                        $('#cep_pro').val('')
                        $('#logradouro_pro').val('')
                        $('#numero_pro').val('')
                        $('#cidade_pro').val('')
                        $('#estadouf_pro').val('')
                        $('#observacao_pro').text('')
                        var codigo_prop = $('#codigo_prop').val();
                        if (codigo_prop != 0) {
                            $.ajax({
                                url: base_url + 'propriedade/lista_propriedades_porproprietario',
                                type: 'POST',
                                data: {
                                    codigo_prop: codigo_prop
                                },
                                dataType: 'json',
                                success: function (data) {
                                    if (data.retorno) {
                                        /* ADICIONA AS PROPRIEDADES NO SELECT OPTION */
                                        $('#select_propriedade').prop('disabled', false);
                                        $('#select_propriedade')
                                            .find('option')
                                            .remove()
                                            .end()
                                            .append('<option value="0" selected>Selecione uma Propriedade</option>')
                                            .val(0);
                                        $(data.dados).each(function (index, element) {
                                            $('#select_propriedade').append(`<option value="${element.codigo_pro}" data-cidade="${element.cidade_pro}" data-estado="${element.estadouf_pro}">
                                            ${element.nome_pro}
                                        </option>`);
                                        });
                                    } else {
                                        $('#select_propriedade')
                                            .find('option')
                                            .remove()
                                            .end()
                                            .append('<option value="0" selected>Cadastre uma propriedade primeiro</option>')
                                            .val(0);
                                        // $('#select_propriedade').find("option:first").text('Cadastre uma propriedade primeiro.').val(0).prop('selected', true)
                                        aviso('Esse proprietário não possui nenhuma propriedade cadastrada');
                                    }
                                },
                                error: function () {
                                    erro('Desculpe, encontramos um erro e não foi possível buscar as propriedades, atualize e tente novamente');
                                }
                            });
                        }
                    } else {
                        erro(data.msg);
                    }
                }
            });
        });
    /* FINAL DO FORMULÁRIO DO MODAL DE CADASTRO DE PROPRIEDADE */
});