<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * Author: Eduardo de Oliveira Bacarin
 * Date: 05/04/2022
 * 
 **/

class Laudo extends CI_Controller{
    
  public function __construct(){
    parent::__construct();
    // echo json_encode($this->session->userdata());exit;
    if(empty($this->session->userdata('usuario')) || $this->session->userdata('usuario') == false){
      redirect('login');
    }
  }

  public function index($identificador, $formato = 'web'){
    $this->load->model('laudo_model');
    $topo['css_link'] = array(
      '//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css'
    );

    $rodape['js'] = array(
        'assets/js/laboratorio.js' . V,
    );

    $exame = $this->laudo_model->buscar_exame($identificador)[0];
    // echo json_encode($exame);exit;
    switch($exame->tiporequisicao_exa){
      case 1: $tipo_requisicao = 'MORMO';break;
      case 2: $tipo_requisicao = 'ANEMIA INFECCIOSA EQUINA';break;
      case 3: $tipo_requisicao = 'MORMO E ANEMIA INFECCIOSA EQUINA';break;
    }

    $iniciais_vet = explode(' ',$exame->nome_vet);
    $iniciais_vet = substr($iniciais_vet[array_key_first($iniciais_vet)], 0, 1) . substr($iniciais_vet[count($iniciais_vet)-1], 0, 1);

    $data['tipo_requisicao'] = $tipo_requisicao;
    $data['nome_laboratorio'] = $exame->nome_lab;
    $data['portaria_credenciamento'] = $exame->portariacredenciamento_lab;
    $data['numero_exame'] = $iniciais_vet . ' ' . $exame->numeroexame_exa;
    $data['endereco_laboratorio'] = $exame->rua_lab . ', ' . $exame->bairro_lab  . ', ' . $exame->numero_lab;
    $data['cidadeuf_laboratorio'] = $exame->cidade_lab . ' / ' . $exame->estadouf_lab;
    $data['email_laboratorio'] = $exame->email_lab;
    $data['telefone_laboratorio'] = $exame->telefone_lab;

    $data['nome_proprietario'] = $exame->nome_prop;
    $data['endereco_proprietario'] = $exame->endereco_prop . ', ' . $exame->bairro_prop . ', ' . $exame->numero_prop . ' - ' . $exame->cidade_prop . '/' . $exame->estadouf_prop;
    $data['telefone_proprietario'] = $exame->telefone_prop;

    $data['nome_veterinario'] = $exame->nome_vet;
    $data['telefone_veterinario'] = $exame->telefone_vet;
    $data['endereco_veterinario'] = $exame->logradouro_vet . ', ' . $exame->bairro_vet . ', ' . $exame->numero_vet . ' - ' . $exame->cidade_vet . '/' . $exame->estadouf_vet;

    $data['nome_animal'] = $exame->nome_ani;
    $data['registro_animal'] = $exame->registro_ani;
    $data['especie_animal'] = $exame->especie_ani;
    $data['raca_animal'] = $exame->raca_ani;
    $data['sexo_animal'] = $exame->sexo_ani;
    $data['idade_animal'] = $exame->idade_ani;
    $data['classificacao_animal'] = $exame->classificacao_ani;
    $data['outraclassificacao_animal'] = !empty($exame->outraclassificacao_ani) ? $exame->outraclassificacao_ani : '';
    $data['nome_propriedade'] = $exame->nome_pro;
    $data['cidadeuf_propriedade'] = $exame->cidade_pro . ' / ' . $exame->estadouf_pro;
    $data['qtdequinos_propriedade'] = $exame->qtdequinos_pro;
    $data['imagem_animal']  = $exame->resenha_ani;
    $data['descricao_animal']  = $exame->descricao_ani;
    
    $this->load->view('05_laudo/requisicao', $data);

  }
}