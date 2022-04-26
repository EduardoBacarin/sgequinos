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
    $this->load->helper('funcoes_helper');
  }

  public function index(){
    $this->load->model('exames_model');
    $topo['css_link'] = array(
      '//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    );

    $rodape['js'] = array(
        'assets/js/exames.js' . V,
    );

    if ($this->session->userdata('usuario')['tipo_user'] == 1){
      $data['exames'] = $this->exames_model->lista_exames_vet($this->session->userdata('usuario')['codigo_user']);
    }else{
      $data['exames'] = $this->exames_model->lista_exames_lab($this->session->userdata('usuario')['codigo_user']);
    }
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
        'assets/js/desenhar.js' . V,
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
    $this->load->model('animais_model');
    $this->load->model('exames_model');
    $post = $this->input->post();
    if (!empty($post)){
      $resenha_base64 = $post['resenha_base64'];
      $caminho_resenha = converte_resenha_base64($resenha_base64, $post['numeroexame_exa']);

      if (empty($post['select_animal'])){
        $dados_cavalo = [
          'codigo_lab'             => $post['codigo_lab'],
          'codigo_prop'            => $post['codigo_prop'],
          'codigo_pro'             => $post['select_propriedade'],
          'codigo_vet'             => $this->session->userdata('usuario')['codigo_user'],
          'nome_ani'               => $post['nome_ani'],
          'registro_ani'           => $post['registro_ani'],
          'especie_ani'            => $post['especie_ani'],
          'raca_ani'               => $post['raca_ani'],
          'sexo_ani'               => $post['sexo_ani'],
          'idade_ani'              => $post['idade_ani'],
          'classificacao_ani'      => $post['select_classificacao'],
          'outraclassificacao_ani' => (!empty($post['outraclassificacao_ani']) ? $post['outraclassificacao_ani'] : ''),
          'resenha_ani'            => $caminho_resenha
        ];

        $insereAnimal = $this->animais_model->insert_animal($dados_cavalo);
        $post['select_animal'] = $insereAnimal;
      }

      $dados_exame = [
        'codigo_lab' => $post['codigo_lab'],
        'codigo_prop' => $post['codigo_prop'],
        'codigo_vet'  => $this->session->userdata('usuario')['codigo_user'],
        'codigo_ani'  => $post['select_animal'],
        'numeroexame_exa' => $post['numeroexame_exa'],
        'registroanimal_exa' => $post['registro_ani'],
        'status_exa'         => 1,
        'comentarios_exa'    => (!empty($post['comentarios_exa']) ? $post['comentarios_exa'] : ''),
      ];
      
      $insereExame = $this->exames_model->insert_exame($dados_exame);
      if ($insereExame){
        echo json_encode(array('retorno' => true, 'msg' => 'Exame cadastrado com sucesso!'));
      }else{
        echo json_encode(array('retorno' => false, 'msg' => 'Erro no cadastramento do exame'));
      }
    }else{
      echo json_encode(array('retorno' => false, 'msg' => 'Erro no cadastramento da exame'));
    }
  }


  public function busca_numero_exame(){
    $this->load->model('exames_model');
    $numero_exame = $this->input->post('numero_exame');
    // echo json_encode($numero_exame);exit;
    if (!empty($numero_exame)){
      $busca_exame = $this->exames_model->busca_numero_exame($numero_exame, $this->session->userdata('usuario')['codigo_user']);
      if (empty($busca_exame)){
        echo json_encode(array('retorno' => true));
      }else{
        echo json_encode(array('retorno' => false, 'msg' => 'Número do exame já existe, utilize outro valor.'));
      }
    }
  }

  public function buscar_exame(){
    $this->load->model('exames_model');
    $codigo_exa = $this->input->post('codigo_exa');
    if (!empty($codigo_exa)){
      $busca_exame = $this->exames_model->buscar_exame($codigo_exa);
      if (!empty($busca_exame)){
        echo json_encode(array('retorno' => true, 'dados' => $busca_exame[0]));
      }else{
        echo json_encode(array('retorno' => false, 'msg' => 'Número do exame já existe, utilize outro valor.'));
      }
    }
  }
}