<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * Author: Eduardo de Oliveira Bacarin
 * Date: 05/04/2022
 * 
 **/

class Exame extends CI_Controller{
    
  public function __construct(){
    parent::__construct();
    // echo json_encode($this->session->userdata());exit;
    if(empty($this->session->userdata('usuario')) || $this->session->userdata('usuario') == false){
      redirect('login');
    }
  }

  public function index(){
    $this->load->model('laboratorios_model');
    $topo['css_link'] = array(
      '//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    );

    $rodape['js'] = array(
        'assets/js/exames.js' . V,
    );
    $data['laboratorios'] = $this->laboratorios_model->lista_laboratorios();
    // echo json_encode($data['laboratorios']);exit;
    $this->load->view('estrutura/topo', $topo);
    $this->load->view('04_listas/exames_lista', $data);
    $this->load->view('estrutura/rodape', $rodape);
  }

  public function cadastrar_exame(){
    $this->load->model('laboratorios_model');
    $this->load->model('veterinarios_model');
    $this->load->model('proprietarios_model');
    $this->load->model('exames_model');
    $topo['css_link'] = array(
      '//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    );

    $rodape['js'] = array(
        'assets/js/exames_cadastro.js' . V,
        'assets/js/funcoes.js' . V,
    );
    
    $data['laboratorios'] = $this->laboratorios_model->lista_laboratorios();
    $data['veterinarios'] = $this->veterinarios_model->lista_veterinarios();
    $data['proprietarios'] = $this->proprietarios_model->lista_proprietarios($this->session->userdata('usuario')['codigo_user']);
    // echo json_encode($data['laboratorios']);exit;
    $this->load->view('estrutura/topo', $topo);
    $this->load->view('03_cadastros/exames_cadastro', $data);
    $this->load->view('estrutura/rodape', $rodape);
  }

  public function salvar_exame(){
    $post = $this->input->post();
    echo json_encode($post);exit;
    if (!empty($post)){

      if ($post['codigo_ani'] == 0 ){
        $dados_cavalo = [
          'codigo_lab' => $post['codigo_lab'],
          'codigo_prop' => $post['codigo_prop'],
          'codigo_vet'  => $this->session->userdata('usuario')['codigo_user'],
          'nome_ani'    => $post['nome_ani'],
          'registro_ani' => $post['registroanimal_exa'],
          'especie_ani' => $post['especie_ani'],
          'raca_ani'   => $post['raca_ani'],
          'sexo_ani'   => $post['sexo_ani'],
          'idade_ani' => $post['idade_ani'],
          'classificacao_ani' => $post['classificacao_ani'],
          'outraclassificacao_ani' => (!empty($post['outraclassificacao_ani']) ? $post['outraclassificacao_ani'] : ''),
        ];

        $insereAnimal = 0;
    }
      $dados_exame = [
        'codigo_lab' => $post['codigo_lab'],
        'codigo_prop' => $post['codigo_prop'],
        'codigo_vet'  => $this->session->userdata('usuario')['codigo_user'],
        'numeroexame_exa' => $post['numeroexame_exa'],
        'registroanimal_exa' => $post['registroanimal_exa'],
        'status_exa'         => 1,
        'comentarios_exa'    => (!empty($post['comentarios_exa']) ? $post['comentarios_exa'] : ''),
      ];
      
      $insereExame = 0;
      if ($insereExame){
        echo json_encode(array('retorno' => true, 'msg' => 'Exame cadastrado com sucesso!'));
      }else{
        echo json_encode(array('retorno' => false, 'msg' => 'Erro no cadastramento do exame'));
      }
    }else{
      echo json_encode(array('retorno' => false, 'msg' => 'Erro no cadastramento da exame'));
    }
  }

}