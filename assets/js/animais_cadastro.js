var base_url = $("#base_url").val();
var avisos = 'Obrigatório. ';

$(document).ready(function () {
    $('#formCadastroProprietario').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nome_prop: {
                validators: {
                    notEmpty: {
                        message: avisos
                    }
                }
            },
            documento_prop: {
                validators: {
                    notEmpty: {
                        message: avisos
                    }
                }
            },
            telefone_prop: {
                validators: {
                    notEmpty: {
                        message: avisos
                    }
                }
            },
            email_prop: {
                validators: {
                    notEmpty: {
                        message: avisos
                    }
                }
            },
            endereco_prop: {
                validators: {
                    notEmpty: {
                        message: avisos
                    },
                }
            },
            numero_prop: {
                validators: {
                    notEmpty: {
                        message: avisos
                    }
                }
            },
            bairro_prop: {
                validators: {
                    notEmpty: {
                        message: avisos
                    },
                }
            },
            cidade_prop: {
                validators: {
                    notEmpty: {
                        message: avisos
                    },
                }
            },
            estado_prop: {
                validators: {
                    notEmpty: {
                        message: avisos
                    },
                    stringLength:{
                        max: 2,
                        message: "Endereço Inválido"
                    }
                }
            },
            numero_prop: {
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
            url: base_url + 'proprietario/salvar_proprietario',
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
});