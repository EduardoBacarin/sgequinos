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

	public function lista_exames_vet($codigo_vet){
		$this->db->select("*");
		$this->db->from("exame");
		$this->db->join('proprietario', 'exame.codigo_prop = proprietario.codigo_prop');
		$this->db->join('animal', 'exame.codigo_ani = animal.codigo_ani');
		$this->db->where("exame.codigo_vet", $codigo_vet);
		$this->db->where("exame.ativo_exa", true);
		$query = $this->db->get();
	
		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function conta_exames_vet($codigo_vet){
		$this->db->select("COUNT(codigo_exa)");
		$this->db->from("exame");
		$this->db->where("codigo_vet", $codigo_vet);
		$this->db->where("ativo_exa", true);
        $this->db->order_by("exame.codigo_exa", "DESC");
		$total = $this->db->count_all_results();
		
		if ($this->db->count_all_results() >= 1) {
			return $total -1;
		} else {
			return 0;
		}
	}

	public function lista_exames_lab($codigo_lab, $limit, $offset){
		$this->db->select("*");
		$this->db->from("exame");
		$this->db->join('proprietario', 'exame.codigo_prop = proprietario.codigo_prop');
		$this->db->join('animal', 'exame.codigo_ani = animal.codigo_ani');
		$this->db->where("exame.codigo_lab", $codigo_lab);
		$this->db->where("exame.ativo_exa", true);
        $this->db->order_by("exame.codigo_exa", "DESC");
        $this->db->limit($limit, $offset);
		$query = $this->db->get();
		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function conta_exames_lab($codigo_lab){
		$this->db->select("COUNT(codigo_exa)");
		$this->db->from("exame");
		$this->db->where("codigo_lab", $codigo_lab);
		$this->db->where("ativo_exa", true);
        $this->db->order_by("exame.codigo_exa", "DESC");
		$total = $this->db->count_all_results();
		
		if ($this->db->count_all_results() >= 1) {
			return $total -1;
		} else {
			return 0;
		}
	}


	public function buscar_exame($codigo_exa){
		$this->db->select("*");
		$this->db->from("exame");
		$this->db->join('proprietario', 'exame.codigo_prop = proprietario.codigo_prop');
		$this->db->join('laboratorio', 'exame.codigo_lab = laboratorio.codigo_lab');
		$this->db->join('animal', 'exame.codigo_ani = animal.codigo_ani');
		$this->db->join('propriedade', 'animal.codigo_pro = propriedade.codigo_pro');
		$this->db->where("exame.codigo_exa", $codigo_exa);
		$this->db->where("exame.ativo_exa", true);
		$query = $this->db->get();
	
		// print_r($this->db->last_query());exit;
		
		if ($query->num_rows() >= 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function em_analise_exame($codigo_exa){
		date_default_timezone_set('America/Sao_Paulo');

		$datahoje  = new DateTime();
		$data2dias = new DateTime();
		$data2dias = $data2dias->add(new DateInterval('P2D'));

        $this->db->set('status_exa', 2);
        $this->db->set('inicioanalise_exa', $datahoje->format('Y-m-d H:i:s'));
        $this->db->set('fimanalise_exa', $data2dias->format('Y-m-d H:i:s'));

        $this->db->where("codigo_exa", $codigo_exa);

        if ($this->db->update("exame")) {
            return true;
        } else {
            return false;
        }
    }

	public function aprovar_exame($codigo_exa){
        $this->db->set('status_exa', 3);

        $this->db->where("codigo_exa", $codigo_exa);

        if ($this->db->update("exame")) {
            return true;
        } else {
            return false;
        }
    }
	public function reprovar_exame($codigo_exa){
        $this->db->set('status_exa', 4);

        $this->db->where("codigo_exa", $codigo_exa);

        if ($this->db->update("exame")) {
            return true;
        } else {
            return false;
        }
    }

}