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

class Propriedades_model extends CI_Model {

  public function insert_prop($dados) {
		$this->db->insert("proprietario", $dados);
		//print_r($this->db->last_query());exit;
		if ($this->db->insert_id() >= 1) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function lista_proprietarios($codigo_vet){
		$this->db->select("*");
		$this->db->from("proprietario");
		$this->db->where("ativo_prop", true);
		$this->db->where("codigo_vet", $codigo_vet);
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function busca_proprietario($codigo_prop, $codigo_vet){
		$this->db->select("*");
		$this->db->from("proprietario");
		$this->db->where("codigo_prop", $codigo_prop);
		$this->db->where("codigo_vet", $codigo_vet);
		$this->db->where("ativo_prop", true);
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