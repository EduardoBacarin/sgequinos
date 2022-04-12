var base_url = $("#base_url").val();
var avisos = 'Obrigatório. ';
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
$(document).ready(function () {

    $('#formCadastroPropriedade').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nome_pro: {
                validators: {
                    notEmpty: {
                        message: avisos
                    }
                }
            },
            qtdequinos_pro: {
                validators: {
                    notEmpty: {
                        message: avisos
                    }
                }
            },
            logradouro_pro: {
                validators: {
                    notEmpty: {
                        message: avisos
                    }
                }
            },
            cidade_pro: {
                validators: {
                    notEmpty: {
                        message: avisos
                    }
                }
            },
            estadouf_pro: {
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
            url: base_url + 'propriedade/salvar_propriedade',
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