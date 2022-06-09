<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * Author: Eduardo de Oliveira Bacarin
 * Date: 05/04/2022
 * 
 **/

class Proprietario extends CI_Controller{
    
  public function __construct(){
    parent::__construct();
    // echo json_encode($this->session->userdata());exit;
    if(empty($this->session->userdata('usuario')) || $this->session->userdata('usuario') == false){
      redirect('login');
    }else if($this->session->userdata('usuario')['tipo_user'] == 2){
      redirect('dashboard');
    }
  }

  public function index(){
    $this->load->model('proprietarios_model');
    $topo['css_link'] = array(
      '//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    );

    $rodape['js'] = array(
        'assets/js/proprietarios.js' . V,
    );
    $data['proprietarios'] = $this->proprietarios_model->lista_proprietarios($this->session->userdata('usuario')['codigo_user']);

    $this->load->view('estrutura/topo', $topo);
    $this->load->view('04_listas/proprietarios_lista', $data);
    $this->load->view('estrutura/rodape', $rodape);
  }

  public function cadastro_proprietario(){

    $topo['css_link'] = array(
      '//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    );

    $rodape['js'] = array(
        'assets/js/proprietarios_cadastro.js' . V,
    );
    $this->load->view('estrutura/topo', $topo);
    $this->load->view('03_cadastros/proprietarios_cadastro');
    $this->load->view('estrutura/rodape', $rodape);
  }

  public function salvar_proprietario(){
    $this->load->model('proprietarios_model');
    $post = $this->input->post();

    if (!empty($post)){
      $dados = [
        'codigo_vet'            => $this->session->userdata('usuario')['codigo_user'],
        'nome_prop'             => $post['nome_prop'],
        'email_prop'            => $post['email_prop'],
        'datanascimento_prop'   => $post['datanascimento_prop'],
        'documento_prop'        => $post['documento_prop'],
        'telefone_prop'         => $post['telefone_prop'],
        'cep_prop'              => $post['cep_prop'],
        'endereco_prop'         => $post['endereco_prop'],
        'bairro_prop'           => $post['bairro_prop'],
        'numero_prop'           => $post['numero_prop'],
        'cidade_prop'           => $post['cidade_prop'],
        'estadouf_prop'         => $post['estadouf_prop']
      ];
      $insereProp = $this->proprietarios_model->insert_prop($dados);
      if ($insereProp){
        echo json_encode(array('retorno' => true, 'msg' => 'Proprietário cadastrado com sucesso!'));
      }else{
        echo json_encode(array('retorno' => false, 'msg' => 'Erro no cadastramento do proprietário'));
      }
    }else{
      echo json_encode(array('retorno' => false, 'msg' => 'Erro no cadastramento do proprietário'));
    }
  }

  public function busca_proprietario(){
    $this->load->model('proprietarios_model');
    $codigo_prop = $this->input->post('codigo_prop');
    
    $data = $this->proprietarios_model->busca_proprietario($codigo_prop, $this->session->userdata('usuario')['codigo_user'])[0];
    if($data){
      echo json_encode(array('retorno' => true, 'dados' => $data));
    }else{
      echo json_encode(array('retorno' => false, 'msg' => 'Dados do Proprietário não encontrados'));
    }
  }

  public function busca_animais_prop(){
    $this->load->model('proprietarios_model');
    $codigo_prop = $this->input->post('codigo_prop');

    $data = $this->proprietarios_model->busca_animais_prop($codigo_prop, $this->session->userdata('usuario')['codigo_user']);
    if(!empty($data)){
      echo json_encode(array('retorno' => true, 'dados' => $data));
    }else{
      echo json_encode(array('retorno' => false, 'msg' => 'Dados do Proprietário não encontrados'));
    }
  }

}