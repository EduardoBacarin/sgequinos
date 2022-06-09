<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * Author: Eduardo de Oliveira Bacarin
 * Date: 05/04/2022
 * 
 **/

class Propriedade extends CI_Controller{
    
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
    $this->load->model('propriedades_model');
    $topo['css_link'] = array(
      '//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    );

    $rodape['js'] = array(
        'assets/js/propriedades.js' . V,
    );

    $this->load->view('estrutura/topo', $topo);
    $this->load->view('04_listas/propriedades_lista');
    $this->load->view('estrutura/rodape', $rodape);
  }

  public function cadastro_propriedade(){
    $this->load->model('proprietarios_model');
    $data['proprietarios'] = $this->proprietarios_model->lista_proprietarios($this->session->userdata('usuario')['codigo_user']);

    $topo['css_link'] = array(
      '//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    );

    $rodape['js'] = array(
        'assets/js/propriedades_cadastro.js' . V,
    );
    $this->load->view('estrutura/topo', $topo);
    $this->load->view('03_cadastros/propriedades_cadastro', $data);
    $this->load->view('estrutura/rodape', $rodape);
  }

  public function lista_propriedades()
  {
    $this->load->model('propriedades_model');
    $post = $this->input->get();

    if (!empty($post)) {
      $page   = $post['start'];
      $limit  = $post['length'];
      $q      = $post['search']['value'];

      $dados = $this->propriedades_model->listar_propriedades($this->session->userdata('usuario')['codigo_user'], $limit, $page);
      $total = $this->propriedades_model->conta_propriedades($this->session->userdata('usuario')['codigo_user']);

      if (!empty($dados)) {
        $total_registros = $total;
        $retorno_dados = [];
        $contador = 0;
        foreach ($dados as $dt) {
          $contador++;

          $menu = '<div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">Ações </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item item-excluir" data-codigo="' . $dt->codigo_pro . '"> <i class="fa-solid fa-trash-can"></i> Excluir</a>
                    </div>
                  </div>';
          
          $array = array(
            $contador,
            $dt->nome_pro,
            $dt->nome_prop,
            $dt->qtdequinos_pro,
            $dt->logradouro_pro,
            $dt->cidade_pro . ' - ' . $dt->estadouf_pro,
            $menu
          );
          array_push($retorno_dados, $array);
        }

        $retorno = array(
          'recordsTotal' => $total_registros,
          'recordsFiltered' => $total_registros,
          'data' => $retorno_dados,
        );

        echo json_encode($retorno);
      } else {
        $retorno = array(
          'recordsTotal' => 0,
          'recordsFiltered' => 0,
          'data' => [],
        );

        echo json_encode($retorno);
      }
    }
  }

  public function salvar_propriedade(){
    $this->load->model('proprietarios_model');
    $this->load->model('propriedades_model');

    $post = $this->input->post();

    if (!empty($post)){
      $dados = [
        'codigo_vet'         => $this->session->userdata('usuario')['codigo_user'],
        'codigo_prop'        => $post['select_proprietarios'],
        'nome_pro'           => $post['nome_pro'],
        'qtdequinos_pro'     => $post['qtdequinos_pro'],
        'cep_pro'            => $post['cep_pro'],
        'logradouro_pro'     => $post['logradouro_pro'],
        'numero_pro'         => $post['numero_pro'],
        'cidade_pro'         => $post['cidade_pro'],
        'estadouf_pro'       => $post['estadouf_pro'],
        'latitude_pro'       => $post['latitude_pro'],
        'longitude_pro'      => $post['longitude_pro'],
        'observacao_pro'     => $post['observacao_pro'],
      ];
      $inserePropriedade = $this->propriedades_model->insert_propriedade($dados);
      if ($inserePropriedade){
        echo json_encode(array('retorno' => true, 'msg' => 'Propriedade cadastrada com sucesso!'));
      }else{
        echo json_encode(array('retorno' => false, 'msg' => 'Erro no cadastramento do propriedade'));
      }
    }else{
      echo json_encode(array('retorno' => false, 'msg' => 'Erro no cadastramento da propriedade'));
    }
  }

  public function busca_propriedade(){
    $this->load->model('propriedades_model');
    $codigo_pro = $this->input->post('codigo_pro');
    
    $data = $this->propriedades_model->busca_propriedade($codigo_pro, $this->session->userdata('usuario')['codigo_user'])[0];
    if($data){
      echo json_encode(array('retorno' => true, 'dados' => $data));
    }else{
      echo json_encode(array('retorno' => false, 'msg' => 'Dados do Proprietário não encontrados'));
    }
  }

  public function lista_propriedades_porproprietario(){
    $this->load->model('propriedades_model');
    $codigo_prop = $this->input->post('codigo_prop');
    
    $data = $this->propriedades_model->lista_propriedades_por_proprietario($codigo_prop);
    if($data){
      echo json_encode(array('retorno' => true, 'dados' => $data));
    }else{
      echo json_encode(array('retorno' => false, 'msg' => 'Dados do Proprietário não encontrados'));
    }
  }

}