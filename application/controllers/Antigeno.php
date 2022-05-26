<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * Author: Eduardo de Oliveira Bacarin
 * Date: 05/04/2022
 * 
 **/

class Antigeno extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // echo json_encode($this->session->userdata());exit;
    if (empty($this->session->userdata('usuario')) || $this->session->userdata('usuario') == false) {
      redirect('login');
    }
    $this->load->helper('funcoes_helper');
  }

  public function index()
  {
    $topo['css_link'] = array(
      '//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    );

    $rodape['js'] = array(
      'assets/js/antigenos.js' . V,
    );
    // $data['propriedades'] = $this->propriedades_model->lista_propriedades($this->session->userdata('usuario')['codigo_user']);

    $this->load->view('estrutura/topo', $topo);
    $this->load->view('04_listas/antigenos_lista');
    $this->load->view('03_cadastros/antigenos_cadastro');
    $this->load->view('estrutura/rodape', $rodape);
  }

  public function lista_antigenos()
  {
    $this->load->model('antigenos_model');
    $post = $this->input->get();

    if (!empty($post)) {
      $page   = $post['start'];
      $limit  = $post['length'];
      $q      = $post['search']['value'];

      $dados = $this->antigenos_model->listar_antigenos($this->session->userdata('usuario')['codigo_user'], $limit, $page);
      $total = $this->antigenos_model->conta_antigenos($this->session->userdata('usuario')['codigo_user']);

      if (!empty($dados)) {
        $total_registros = $total;
        $retorno_dados = [];
        $contador = 0;
        foreach ($dados as $dt) {
          $contador++;
          $vencimento = new DateTime($dt->vencimento_ant);

          $menu = '<div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">Ações </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item item-excluir" data-codigo="' . $dt->codigo_ant . '"> <i class="fa-solid fa-trash-can"></i> Excluir</a>
                    </div>
                  </div>';

          $data_vencimento = '';
          $hoje = new DateTime();
          $difference = $vencimento->diff($hoje);
          if ($difference->days < 10) {
            $data_vencimento = '<span aria-label="Próximo do Vencimento" data-balloon-pos="up">' . $vencimento->format('m/Y') . '<i class="fa-solid fa-exclamation text-danger ml-2"></i></span>';
          } else if ($hoje > $vencimento) {
            $data_vencimento = '<span aria-label="Vencido!" data-balloon-pos="up">' . $vencimento->format('m/Y') . '<i class="fa-solid fa-ban text-danger ml-2"></i></span>';
          } else if ($hoje < $vencimento) {
            $data_vencimento = '<span aria-label="Em dia." data-balloon-pos="up">' . $vencimento->format('m/Y') . '<i class="fa-solid fa-check text-success ml-2"></i></span>';
          }
          switch($dt->tipo_ant){
            case 1:
              $tipo = 'MORMO';
              break;
            case 2:
              $tipo = 'AIE';
              break;
          }
          
          $array = array(
            $contador,
            $dt->nome_ant,
            $dt->fabricante_ant,
            $dt->lote_ant,
            $tipo,
            $data_vencimento,
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

  public function salvar_antigeno()
  {
    $this->load->model('antigenos_model');

    $post = $this->input->post();
    if (!empty($post)) {
      if ($post['codigo_ant'] == 0) {
        if ($post['tipo_ant'] == 1 || $post['tipo_ant'] == 2){
          $antigeno = [
            'fabricante_ant' => $post['fabricante_ant'],
            'lote_ant'       => $post['lote_ant'],
            'nome_ant'       => $post['nome_ant'],
            'vencimento_ant' => $post['validade_ant'],
            'tipo_ant'       => $post['tipo_ant'],
            'codigo_lab'     => $this->session->userdata('usuario')['codigo_user']
          ];

          $insereAntigeno = $this->antigenos_model->inserir($antigeno);
          if ($insereAntigeno) {
            echo json_encode(array('retorno' => true, 'msg' => 'Antígeno cadastrado com sucesso'));
          } else {
            echo json_encode(array('retorno' => false));
          }
        }else{
          echo json_encode(array('retorno' => true, 'msg' => 'Tipo inválido'));
        }
      }
    }
  }

  public function inativa_antigeno()
  {
    $this->load->model('antigenos_model');
    $codigo_ant = $this->input->post('codigo_ant');

    $data = $this->antigenos_model->inativa_antigeno($codigo_ant);
    if ($data) {
      echo json_encode(array('retorno' => true, 'msg' => 'Antígeno excluido com sucesso'));
    } else {
      echo json_encode(array('retorno' => false, 'msg' => 'Erro ao excluir o antígeno'));
    }
  }

  public function busca_antigeno()
  {
    $this->load->model('antigenos_model');
    $codigo_ant = $this->input->post('codigo_ant');

    $data = $this->antigenos_model->busca_antigeno($codigo_ant, $this->session->userdata('usuario')['codigo_user'])[0];
    if ($data) {
      echo json_encode(array('retorno' => true, 'dados' => $data, 'msg' => 'Antígeno encontrado!'));
    } else {
      echo json_encode(array('retorno' => false, 'msg' => 'Dados do Antígeno não encontrados'));
    }
  }

  public function select_antigenos($tipo)
  {
    $this->load->model('antigenos_model');

    $data = $this->antigenos_model->select_antigenos($this->session->userdata('usuario')['codigo_user'], $tipo);
    if ($data) {
      echo json_encode(array('retorno' => true, 'dados' => $data));
    } else {
      echo json_encode(array('retorno' => false, 'msg' => 'Antígenos não encontrados'));
    }
  }
}
