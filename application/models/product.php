<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Product extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		//OBTENER AUTO-PUBLICACION POR USUARIO
		public function get_post_car_user($user_id){
			$this->db->select('per.nombres,per.apepat,per.apemat,per.edad,per.nrodoc,u.usuario,
							   au.idauto,au.modelo,au.placa,au.precio,au.anio,au.nropuertas,au.color,au.idusuario,
							   au.fechaini,au.fechafin,au.estado,au.creafecha,au.descripcion,au.titulo'); 
			$this->db->from('auto as au'); 
			$this->db->join('usuario as u','au.idusuario = u.idusuario');
			$this->db->join('persona as per','u.idpersona = per.idpersona');
			$this->db->where("u.idusuario",$user_id);
			$this->db->order_by("au.idauto", "desc");			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result(); 
			}
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
			$this->db->select('per.nombre,per.apepat,per.apemat,per.edad,per.nrodoc,u.usuario,
							   au.idauto,au.modelo,au.placa,au.precio,au.anio,au.nropuertas,au.color,au.idusuario,
							   au.fechaini,au.fechafin,au.estado,au.creafecha,au.descripcion,au.titulo'); 
			$this->db->from('auto as au'); 
			$this->db->join('usuario as u','au.idusuario = u.idusuario');
			$this->db->join('persona as per','u.idpersona = per.idpersona');
			$this->db->where('au.idauto',$idauto);
			$query = $this->db->get();
			$data = $query->result_array();
			if($query->num_rows() > 0){
				return $data;
			}
		}

		public function get_max_id(){
			$query = $this->db->query("select ifnull(max(idauto),0) as idauto from auto");
		    if($query->num_rows() > 0){
				return $query->row();
			}
		}
		public function insertProduct($data){
			$this->db->insert('auto',$data);
		}
 
	}

?>