<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Code extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function get_Code_Type($type){
			$this->db->from('codigo');
			$this->db->where("idtipocodigo",$type);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

	}
?>