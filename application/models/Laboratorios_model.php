<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Laboratorios_model extends CI_Model {

  public function insert_lab($dados) {
		$this->db->insert("laboratorio", $dados);
		//print_r($this->db->last_query());exit;
		if ($this->db->insert_id() >= 1) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function busca_login($email, $senha){
		$this->db->select("*");
		$this->db->from("laboratorio");

		$this->db->where("email_lab", $email);
		$this->db->where("senha_lab", $senha);
		$this->db->where("ativo_lab", true);
		$this->db->limit(1);
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function lista_laboratorios(){
		$this->db->select("*");
		$this->db->from("laboratorio");
		$this->db->where("ativo_lab", true);
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function busca_laboratorio($codigo_lab){
		$this->db->select("*");
		$this->db->from("laboratorio");
		$this->db->where("codigo_lab", $codigo_lab);
		$this->db->where("ativo_lab", true);
		$this->db->limit(1);
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}