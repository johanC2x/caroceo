<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Product extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		//OBTENER AUTO CON LIMITE
		public function get_products(){
			$this->db->order_by("idauto", "desc");
			$this->db->limit(6);
			$query = $this->db->get('auto');
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		//OBTENER AUTO SIN LIMITE
		public function get_products_out_limit(){
			$this->db->order_by("idauto", "desc");			
			$query = $this->db->get('auto');
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		public function get_products_id($idauto){
			$this->db->where('idauto',$idauto);
			$query = $this->db->get('auto');
			if($query->num_rows() > 0){
				return $query->result();
			}
		}
 
	}

?>