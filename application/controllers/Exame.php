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
    );
    
    $data['laboratorios'] = $this->laboratorios_model->lista_laboratorios();
    $data['veterinarios'] = $this->veterinarios_model->lista_veterinarios();
    $data['proprietarios'] = $this->proprietarios_model->lista_proprietarios($this->session->userdata('usuario')['codigo_user']);
    // echo json_encode($data['laboratorios']);exit;
    $this->load->view('estrutura/topo', $topo);
    $this->load->view('03_cadastros/exames_cadastro', $data);
    $this->load->view('estrutura/rodape', $rodape);
  }

}