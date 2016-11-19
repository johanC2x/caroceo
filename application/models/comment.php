<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Comment extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}

		public function get_Comment_User_Id($user_id,$auto_id){
			$this->db->select('c.comentario,c.nivel,c.estado,c.creafecha as creaComment,
							   au.idauto,au.idmarca,au.modelo,au.placa,au.precio,
							   au.anio,au.nropuertas,au.color,au.fechaini,au.fechafin,
							   au.creafecha,u.idusuario,p.nombre,p.apepat,p.apemat,p.edad,
							   p.sexo,p.fecnac,p.nrodoc');
			$this->db->from('comentario as c');
			$this->db->join('auto as au','c.idauto = au.idauto');
			$this->db->join('marca as m','au.idmarca = m.idmarca','left');
			$this->db->join('usuario as u','c.idusuario = u.idusuario');
			$this->db->join('persona as p','u.idpersona = p.idpersona');
			$this->db->where("c.idusuario",$user_id)->where("c.idauto",$auto_id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		public function get_Comment_All($auto_id){
			$this->db->select('c.comentario,c.nivel,c.estado,c.creafecha,
							   au.idauto,au.idmarca,au.modelo,au.placa,au.precio,
							   au.anio,au.nropuertas,au.color,au.fechaini,au.fechafin,
							   au.creafecha,u.idusuario,p.nombre,p.apepat,p.apemat,p.edad,
							   p.sexo,p.fecnac,p.nrodoc');
			$this->db->from('comentario as c');
			$this->db->join('auto as au','c.idauto = au.idauto');
			$this->db->join('marca as m','au.idmarca = m.idmarca');
			$this->db->join('usuario as u','c.idusuario = u.idusuario');
			$this->db->join('persona p','u.idpersona = p.idpersona');
			$this->db->where("c.idauto",$auto_id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result(); 
			}
		}

		public function insertComment($data){
			$estado = 1;
			$fecha = date('Y-m-d');
			$dataComment = array(
					'idauto' => $data["idauto"],
					'idusuario' => $data["idusuario"],
					'comentario' => $data["comentario"],
					'creafecha' => $fecha,
					'estado' => $estado
				);
			$this->db->insert('comentario',$dataComment);
		}

	}
?>