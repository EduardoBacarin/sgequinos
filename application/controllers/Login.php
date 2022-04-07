<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * Author: Eduardo de Oliveira Bacarin
 * Date: 05/04/2022
 * 
 **/

class Login extends CI_Controller{
    
  public function __construct(){
    parent::__construct();
    
  }

  public function index(){
    if(!empty($this->session->userdata('usuario'))){
      redirect('dashboard');
    }else{
      $this->load->view('01_login/login');
    }
  }

  public function entrar(){
    $this->load->model('veterinarios_model');
    $this->load->model('laboratorios_model');
    $post = $this->input->post();
    $senha = hash_hmac('sha256', $post['senha_user'], KEY);
    $email = $post['email_user'];
    $tipo_user = $post['tipo_usuario'];

    if ($tipo_user == 1){
      $busca = $this->veterinarios_model->busca_login($email, $senha);
      // echo json_encode($busca);exit;
      if (!empty($busca)){
        session_start();
        $sessao = [
          'codigo_user'      => $busca[0]->codigo_vet,
          'tipo_user'        => $post['tipo_usuario'],
          'nome_user'        => $busca[0]->nome_vet,
          'documento_user'   => $busca[0]->documento_vet,
        ];

        $this->session->set_userdata('usuario', $sessao);
        redirect('dashboard');
      }else{
        echo json_encode(array('retorno' => false, 'msg' => 'Usuário ou senha inválidos!'));
      }
    }else if($tipo_user == 2){
      $busca = $this->laboratorios_model->busca_login($email, $senha);
      // echo json_encode($busca);exit;
      if (!empty($busca)){
        session_start();
        $sessao = [
          'codigo_user'      => $busca[0]->codigo_lab,
          'tipo_user'        => $post['tipo_usuario'],
          'nome_user'        => $busca[0]->nome_lab,
          'documento_user'   => $busca[0]->documento_lab,
          'credenciais_user' => $busca[0]->portariacredenciamento_lab,
        ];

        $this->session->set_userdata('usuario', $sessao);
        redirect('dashboard');
      }else{
        echo json_encode(array('retorno' => false, 'msg' => 'Usuário ou senha inválidos!'));
      }
    }

  }

  public function registro(){
    $this->load->view('01_login/register');
  }

  public function registrar_usuario(){
    $this->load->model('veterinarios_model');
    $this->load->model('laboratorios_model');
    $post = $this->input->post();
    $senha = hash_hmac('sha256', $post['senha_user'], KEY);
    $senharedigitada = hash_hmac('sha256', $post['redigitasenha_user'], KEY);
    if ($senha == $senharedigitada){
      if (!empty($post['nome_user'])){
        if($post['tipo_usuario'] == 1){
          $dados_usuario = [
            'nome_vet'      => $post['nome_user'],
            'email_vet'     => $post['email_user'],
            'senha_vet'     => $senha,
            'documento_vet' => $post['documento_user'],
            'telefone_vet'  => $post['telefone_user'],
            'tipo_vet'      => $post['tipo_usuario']
          ];
          $insereVet = $this->veterinarios_model->insert_vet($dados_usuario);

          if ($insereVet){
            session_start();
            $sessao = [
              'codigo_user'      => $insereVet,
              'tipo_user'        => $post['tipo_user'],
              'nome_user'        => $post['nome_user'],
              'documento_user'   => $post['documento_user'],
            ];
            $this->session->set_userdata('usuario', $sessao);
            redirect('dashboard');
          }
        }else if($post['tipo_usuario'] == 2){
          $dados_usuario = [
            'nome_lab'                      => $post['nome_user'],
            'email_lab'                     => $post['email_user'],
            'senha_lab'                     => $senha,
            'documento_lab'                 => $post['documento_user'],
            'portariacredenciamento_lab'    => $post['credenciais_user'],
            'tipo_lab'                      => $post['tipo_usuario'],
            'telefone_lab'                  => $post['telefone_user'],
            'cep_lab'                       => $post['cep_user'],
            'rua_lab'                       => $post['rua_user'],
            'bairro_lab'                    => $post['bairro_user'],
            'numero_lab'                    => $post['numero_user'],
            'cidade_lab'                    => $post['cidade_user'],
            'estadouf_lab'                  => $post['estadouf_user'],
          ];
          $insereLab = $this->laboratorios_model->insert_lab($dados_usuario);
          
          if ($insereLab){
            session_start();
            $sessao = [
              'codigo_user'      => $insereLab,
              'tipo_user'        => $post['tipo_user'],
              'nome_user'        => $post['nome_user'],
              'documento_user'   => $post['documento_user'],
              'credenciais_user' => $post['credenciais_user'],
            ];
            $this->session->set_userdata('usuario', $sessao);
            redirect('dashboard');
          }
        }else{
          echo json_encode(array('retorno' => false, 'msg' => 'Erro no cadastro!'));
        }
      }
    }
  }

  public function sair()
	{
		$this->session->sess_destroy();
    $this->session->set_userdata('usuario', '');
    redirect('login');
	}
}