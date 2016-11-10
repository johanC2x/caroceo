<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Product extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function get_products(){
			$this->db->order_by("idauto", "desc");
			$this->db->limit(6);
			$query = $this->db->get('auto');
			if($query->num_rows() > 0){
				return $query->result();
			}
		} 
 
	}

?>