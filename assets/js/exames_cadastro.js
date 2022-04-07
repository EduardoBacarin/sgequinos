var base_url = $("#base_url").val();

$(document).ready(function () {
  $('#select_laboratorio').on('change', function(){
      var codigo_lab = $(this).val();

    $.ajax({
        url: base_url + 'laboratorio/busca_laboratorio',
        type: 'POST',
        data: { codigo_lab : codigo_lab },
        dataType : 'json',
        success: function(data) {
            console.log(data);
            if(data.retorno){
                console.log(data.dados);
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
            }else{
            
            }
        },
        error: function(){
        
        }
    });
  });

  $('#select_proprietarios').on('change', function(){
    var codigo_prop = $(this).val();

  $.ajax({
      url: base_url + 'proprietario/busca_proprietario',
      type: 'POST',
      data: { codigo_prop : codigo_prop },
      dataType : 'json',
      success: function(data) {
          console.log(data);
          if(data.retorno){
              console.log(data.dados);
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
          }else{
          
          }
      },
      error: function(){
      
      }
  });
});
});