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

  public function insert_propriedade($dados) {
		$this->db->insert("propriedade", $dados);
		//print_r($this->db->last_query());exit;
		if ($this->db->insert_id() >= 1) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function lista_propriedades($codigo_vet){
		$this->db->select("*");
		$this->db->from("propriedade");
		$this->db->join("proprietario", "proprietario.codigo_prop = propriedade.codigo_prop", 'inner');
		$this->db->where("propriedade.ativo_pro", true);
		$this->db->where("propriedade.codigo_vet", $codigo_vet);
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function busca_propriedade($codigo_pro, $codigo_vet){
		$this->db->select("*");
		$this->db->from("propriedade");
		$this->db->where("codigo_pro", $codigo_pro);
		$this->db->where("codigo_vet", $codigo_vet);
		$this->db->where("ativo_pro", true);
		$this->db->limit(1);
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function lista_propriedades_por_proprietario($codigo_prop){
		$this->db->select("*");
		$this->db->from("propriedade");
		$this->db->where("ativo_pro", true);
		$this->db->where("codigo_prop", $codigo_prop);
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}