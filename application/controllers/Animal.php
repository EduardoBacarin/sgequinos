<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * Author: Eduardo de Oliveira Bacarin
 * Date: 05/04/2022
 * 
 **/

class Animal extends CI_Controller{
    
  public function __construct(){
    parent::__construct();
    // echo json_encode($this->session->userdata());exit;
    if(empty($this->session->userdata('usuario')) || $this->session->userdata('usuario') == false){
      redirect('login');
    }else if($this->session->userdata('usuario')['tipo_user'] == 2){
      redirect('dashboard');
    }
    $this->load->helper('funcoes_helper');
  }

  public function index(){
    $this->load->model('animais_model');
    $topo['css_link'] = array(
      '//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    );

    $rodape['js'] = array(
        'assets/js/animais.js' . V,
        'assets/js/funcoes.js' . V,
        'assets/plugins/jQuery.print/jQuery.print.min.js',
    );
    $data['animais'] = $this->animais_model->lista_animais($this->session->userdata('usuario')['codigo_user']);

    $this->load->view('estrutura/topo', $topo);
    $this->load->view('04_listas/animais_lista', $data);
    $this->load->view('estrutura/rodape', $rodape);
  }

  public function cadastrar_animal($codigo_ani = ''){
    $this->load->model('proprietarios_model');
    $this->load->model('animais_model');
    $topo['css_link'] = array(
      '//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    );

    $rodape['js'] = array(
        'assets/js/animais_cadastro.js' . V,
        'assets/js/desenhar.js' . V,
        'assets/js/funcoes.js' . V,
    );

    $data['proprietarios'] = $this->proprietarios_model->lista_proprietarios($this->session->userdata('usuario')['codigo_user']);
    if (!empty($codigo_ani)){
      $data['animal'] = $this->animais_model->busca_animal($codigo_ani, $this->session->userdata('usuario')['codigo_user'])[0];
    }else{
      $data['animal'] = '';
    }
    $this->load->view('estrutura/topo', $topo);
    $this->load->view('03_cadastros/animais_cadastro', $data);
    $this->load->view('estrutura/rodape', $rodape);
  }

  
  public function salvar_animal(){
    $this->load->helper('funcoes_helper');
    $this->load->model('animais_model');
    $post = $this->input->post();
    if (!empty($post)){
      $resenha_base64 = $post['resenha_base64'];
      $caminho_resenha = converte_resenha_base64($resenha_base64, time());
      $dados_cavalo = [
        'codigo_prop'            => $post['select_proprietarios'],
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
        'descricao_ani'          => $post['comentarios_exa'],
        'resenha_ani'            => $caminho_resenha
      ];

      $insereAnimal = $this->animais_model->insert_animal($dados_cavalo);
      if ($insereAnimal){
        echo json_encode(array('retorno' => true, 'msg' => 'Animal cadastrado com sucesso!'));
      }else{
        echo json_encode(array('retorno' => false, 'msg' => 'Erro no cadastramento do animal'));
      }
    }else{
      echo json_encode(array('retorno' => false, 'msg' => 'Erro no cadastramento do animal'));
    }
  }

  public function busca_animal(){
    $this->load->model('animais_model');
    $codigo_ani = $this->input->post('codigo_ani');
    
    $data = $this->animais_model->busca_animal($codigo_ani, $this->session->userdata('usuario')['codigo_user'])[0];
    if($data){
      echo json_encode(array('retorno' => true, 'dados' => $data));
    }else{
      echo json_encode(array('retorno' => false, 'msg' => 'Dados do Proprietário não encontrados'));
    }
  }


  public function inativa_animal(){
    $this->load->model('animais_model');
    $codigo_ani = $this->input->post('codigo_ani');
    
    $data = $this->animais_model->inativa_animal($codigo_ani);
    if($data){
      echo json_encode(array('retorno' => true, 'msg' => 'Animal excluido com sucesso'));
    }else{
      echo json_encode(array('retorno' => false, 'msg' => 'Erro ao excluir o animal'));
    }
  }

}