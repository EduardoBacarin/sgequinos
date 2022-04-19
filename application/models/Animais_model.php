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

class Animais_model extends CI_Model {

  	public function insert_animal($dados) {
		$this->db->insert("animal", $dados);
		//print_r($this->db->last_query());exit;
		if ($this->db->insert_id() >= 1) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function busca_animal($codigo_ani){
		$this->db->select("*");
		$this->db->from("animal");
		$this->db->join('propriedade', "propriedade.codigo_pro = animal.codigo_pro");
		$this->db->where("animal.codigo_ani", $codigo_ani);
		$this->db->where("animal.ativo_ani", true);
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