<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * Author: Eduardo de Oliveira Bacarin
 * Date: 05/04/2022
 * 
 **/

class Laboratorio extends CI_Controller{
    
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
        'assets/js/laboratorio.js' . V,
    );
    $data['laboratorios'] = $this->laboratorios_model->lista_laboratorios();
    // echo json_encode($data['laboratorios']);exit;
    $this->load->view('estrutura/topo', $topo);
    $this->load->view('04_listas/laboratorios_lista', $data);
    $this->load->view('estrutura/rodape', $rodape);
  }

  public function busca_laboratorio(){
    $this->load->model('laboratorios_model');
    $codigo_lab = $this->input->post('codigo_lab');
    
    $data = $this->laboratorios_model->busca_laboratorio($codigo_lab)[0];
    if($data){
      echo json_encode(array('retorno' => true, 'dados' => $data));
    }else{
      echo json_encode(array('retorno' => false, 'msg' => 'Dados do Laboratório não encontrados'));
    }
  }

}