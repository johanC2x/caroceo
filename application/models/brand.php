<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Brand extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}

		public function get_brands(){
			$this->db->order_by("idmarca", "desc");
			$this->db->limit(6);
			$query = $this->db->get('marca');
			if($query->num_rows() > 0){
				return $query->result();
			}
		} 

	}
?>