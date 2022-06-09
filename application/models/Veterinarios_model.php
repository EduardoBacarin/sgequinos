<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Veterinarios_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Veterinarios_model extends CI_Model {

  public function insert_vet($dados) {
		$this->db->insert("veterinario", $dados);
		//print_r($this->db->last_query());exit;
		if ($this->db->insert_id() >= 1) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function busca_login($email, $senha){
		$this->db->select("*");
		$this->db->from("veterinario");

		$this->db->where("email_vet", $email);
		$this->db->where("senha_vet", $senha);
		$this->db->where("ativo_vet", true);
		$this->db->limit(1);
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function busca_veterinario($codigo_vet){
		$this->db->select("*");
		$this->db->from("veterinario");

		$this->db->where("codigo_vet", $codigo_vet);
		$this->db->where("ativo_vet", true);
		$this->db->limit(1);
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function lista_veterinarios(){
		$this->db->select("*");
		$this->db->from("veterinario");
		$this->db->where("ativo_vet", true);
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}