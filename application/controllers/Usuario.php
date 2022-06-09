<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * Author: Eduardo de Oliveira Bacarin
 * Date: 05/04/2022
 * 
 **/

class Usuario extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // echo json_encode($this->session->userdata());exit;
    if (empty($this->session->userdata('usuario')) || $this->session->userdata('usuario') == false) {
      redirect('login');
    }
    $this->load->helper('funcoes_helper');
    $this->codigo_usu = $this->session->userdata('usuario')['codigo_user'];
    $this->tipo_usu = $this->session->userdata('usuario')['tipo_user'];
  }

  public function index()
  {
    $this->load->model('veterinarios_model');
    $this->load->model('laboratorios_model');

    $topo['css_link'] = array(
      '//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    );

    $rodape['js'] = array(
      'assets/js/usuario.js' . V,
    );
    if ($this->session->userdata('usuario')['tipo_user'] == 1) {
      $usuario = $this->veterinarios_model->busca_veterinario($this->session->userdata('usuario')['codigo_user'])[0];
      $data['nome'] = $usuario->nome_vet;
      $data['telefone'] = $usuario->telefone_vet;
      $data['documento'] = $usuario->documento_vet;
      $data['crmv'] = $usuario->crmv_vet;
      $data['email'] = $usuario->email_vet;
      $data['cep'] = $usuario->cep_vet;
      $data['logradouro'] = $usuario->logradouro_vet;
      $data['numero'] = $usuario->numero_vet;
      $data['bairro'] = $usuario->bairro_vet;
      $data['cidade'] = $usuario->cidade_vet;
      $data['estadouf'] = $usuario->estadouf_vet;
      $data['logradouro'] = $usuario->logradouro_vet;
    } else {
      $usuario = $this->laboratorios_model->busca_laboratorio($this->session->userdata('usuario')['codigo_user']);
    }

    $this->load->view('estrutura/topo', $topo);
    $this->load->view('02_dashboard/alterar_usuario', $data);
    $this->load->view('estrutura/rodape', $rodape);
  }

  public function salvar_usuario()
  {
    $post = $this->input->post();
    if (!empty($post)) {
      if ($this->tipo_usu == 1) {
        $dados_usu = [
          'nome_vet' => formata_string($post['nome'], 'string'),
          'telefone_vet' => formata_string($post['telefone'], 'numeric'),
          'documento_vet' => formata_string($post['documento'], 'numeric'),

          'cep_vet' => formata_string($post['cep'], 'string'),
          'logradouro_vet' => formata_string($post['logradouro'], 'string'),
          'numero_vet' => formata_string($post['numero'], 'string'),
          'bairro_vet' => formata_string($post['bairro'], 'string'),
          'cidade_vet' => formata_string($post['cidade'], 'sanitize'),
          'estadouf_vet' => formata_string($post['estado'], 'sanitize'),
        ];
        if (!empty($post['senha'])){
          $dados_usu['senha_vet'] = hash_hmac('sha256', $post['senha'], KEY);
        }
        echo json_encode($dados_usu);exit;

      } else if ($this->tipo_usu == 2) {
        $dados_usu = [
          '' => ''
        ];
      } else {
        echo json_encode(array('retorno' => false, 'msg' => 'Tipo de usuário inválido, saia e faça o login novamente'));
      }
    }
  }
}
