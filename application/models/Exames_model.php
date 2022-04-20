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

class Exames_model extends CI_Model {

  	public function insert_exame($dados) {
		$this->db->insert("exame", $dados);
		//print_r($this->db->last_query());exit;
		if ($this->db->insert_id() >= 1) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function busca_numero_exame($numero_exame, $codigo_vet){
		$this->db->select("*");
		$this->db->from("exame");
		$this->db->where("numeroexame_exa", $numero_exame);
		$this->db->where("codigo_vet", $codigo_vet);
		$this->db->where("ativo_exa", true);
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

}