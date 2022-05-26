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

class Antigenos_model extends CI_Model {

	public function listar_antigenos($codigo_lab, $limit, $offset){
		$this->db->select("*");
		$this->db->from("antigenos");
		$this->db->where("antigenos.codigo_lab", $codigo_lab);
		$this->db->where("antigenos.ativo_ant", true);
        $this->db->order_by("antigenos.vencimento_ant", "ASC");
        $this->db->limit($limit, $offset);
		$query = $this->db->get();
		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function conta_antigenos($codigo_lab){
		$this->db->select("COUNT(codigo_ant)");
		$this->db->from("antigenos");
		$this->db->where("antigenos.codigo_lab", $codigo_lab);
		$this->db->where("antigenos.ativo_ant", true);
        $this->db->order_by("antigenos.vencimento_ant", "ASC");
		$total = $this->db->count_all_results();
		
		if ($this->db->count_all_results() >= 1) {
			return $total;
		} else {
			return 0;
		}
	}

	public function select_antigenos($codigo_lab, $tipo){
		$this->db->select("*");
		$this->db->from("antigenos");
		$this->db->where("ativo_ant", true);
		$this->db->where("codigo_lab", $codigo_lab);
		$this->db->where("tipo_ant", $tipo);
        $this->db->order_by("antigenos.vencimento_ant", "ASC");
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function busca_antigeno($codigo_ant, $codigo_lab){
		$this->db->select("*");
		$this->db->from("antigenos");
		$this->db->where("codigo_ant", $codigo_ant);
		$this->db->where("codigo_lab", $codigo_lab);
		$this->db->where("ativo_ant", true);
		$this->db->limit(1);
		$query = $this->db->get();

		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function inserir($dados) {
		$this->db->insert("antigenos", $dados);
		//print_r($this->db->last_query());exit;
		if ($this->db->insert_id() >= 1) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function inativa_antigeno($codigo_ant){
        $this->db->set('ativo_ant', false);

        $this->db->where("codigo_ant", $codigo_ant);

        if ($this->db->update("antigenos")) {
            return true;
        } else {
            return false;
        }
    }

}