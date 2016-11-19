<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Publish extends CI_Model{
		function __construct(){
			parent::__construct(); 
		}

		//OBTENER AUTO POR USUARIO_ID
		public function get_posts_user($user_id){
			$this->db->select('per.nombre,per.apepat,per.apemat,per.edad,per.nrodoc,
							   au.idauto,au.modelo,au.placa,au.precio,au.anio,au.nropuertas,au.color,au.idusuario,
							   p.fechaini,p.fechafin,p.idpublicacion,p.estado');    
			$this->db->from('publicacion as p'); 
			$this->db->join('auto as au','p.idauto = au.idauto');
			$this->db->join('usuario as u','au.idusuario = u.idusuario');
			$this->db->join('persona as per','u.idpersona = per.idpersona');
			$this->db->where("u.idusuario",$user_id);
			$this->db->order_by("au.idauto", "desc");			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result(); 
			}
		}

		public function insertPost($data){
			$fecha = date('Y-m-d');
			$dataPost[] = array(
					'idauto' => $data["idauto"],
					'fechaini' => $fecha,
					'fechafin' => $fecha,
					'estado' => 1,
					'descripcion' => $data["descripcion"]
				);
			$this->db->insert('publicacion',$dataPost);
		}

	}
?>