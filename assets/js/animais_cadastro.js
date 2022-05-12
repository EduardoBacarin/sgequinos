var base_url = $("#base_url").val();
var avisos = 'Obrigatório. ';

$(document).ready(function () {

    var codigo_ani = $('#codigo_ani').val()
    if (codigo_ani != 0){
        var img = new Image();
        img.onload = function() {
            var f_img = new fabric.Image(img);
            canvas.setBackgroundImage(f_img);
            canvas.renderAll();
        };
        img.src = base_url + $('#imagem_resenha').val();
        setTimeout(function(){
            $('#select_proprietarios').trigger('change');
        }, 500);
        
    }

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
                    console.log(data)
                    if (data.retorno) {
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
        var codigo_pro = $('#codigo_propriedade').val();
                                        $('#select_propriedade').append(`<option value="${element.codigo_pro}" data-cidade="${element.cidade_pro}" data-estado="${element.estadouf_pro}" ${element.codigo_pro == $('#codigo_propriedade').val() ? 'selected' : ''}>
                                        ${element.nome_pro}
                                    </option>`);
                                    });
                                    $('#select_propriedade').trigger('change');
                                
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

    $('#select_propriedade').on('change', function () {
        var cidade = $(this).find(':selected').data('cidade');
        var estado = $(this).find(':selected').data('estado');

        $('#cidade_ani').val(cidade);
        $('#estado_ani').val(estado);
    });

    $('#formCadastroAnimal').formValidation({
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
            url: base_url + 'animal/salvar_animal',
            type: 'POST',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.retorno) {
                    window.location.href = 'http://localhost/sgequinos/animal';
                } else {
                    erro('Erro ao cadastrar o animal, verifique todos os dados e tente novamente');
                }
            }
        });
    });
});