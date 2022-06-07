<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Laudo_model extends CI_Model {

	public function buscar_exame($identificador){
		$this->db->select("*");
		$this->db->from("exame");
		$this->db->join('proprietario', 'exame.codigo_prop = proprietario.codigo_prop');
		$this->db->join('laboratorio', 'exame.codigo_lab = laboratorio.codigo_lab');
		$this->db->join('veterinario', 'exame.codigo_vet = veterinario.codigo_vet');
		$this->db->join('animal', 'exame.codigo_ani = animal.codigo_ani');
		$this->db->join('propriedade', 'animal.codigo_pro = propriedade.codigo_pro');
		$this->db->where("exame.identificacao_exa", $identificador);
		$this->db->where("exame.ativo_exa", true);
		$query = $this->db->get();
	
		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}