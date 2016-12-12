<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Comment extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}

		// public function get_Comment_User_Id($user_id,$auto_id){
		// 	$this->db->select('c.idcomentario,c.comentario,c.nivel,c.estado,c.creafecha as creaComment,
		// 					   au.idauto,au.idmarca,au.modelo,au.placa,au.precio,
		// 					   au.anio,au.nropuertas,au.color,au.fechaini,au.fechafin,
		// 					   au.creafecha,u.idusuario,p.nombre,p.apepat,p.apemat,p.edad,
		// 					   p.sexo,p.fecnac,p.nrodoc');
		// 	$this->db->from('comentario as c');
		// 	$this->db->join('auto as au','c.idauto = au.idauto');
		// 	$this->db->join('marca as m','au.idmarca = m.idmarca','left');
		// 	$this->db->join('usuario as u','c.idusuario = u.idusuario');
		// 	$this->db->join('persona as p','u.idpersona = p.idpersona');
		// 	// $this->db->where("c.idusuario",$user_id)->where("c.idauto",$auto_id)->where_not_in('c.idusuario',$user_id);
		// 	$this->db->where("c.idauto",$auto_id)->where_not_in('c.idusuario',$user_id);
		// 	$query = $this->db->get();
		// 	if($query->num_rows() > 0){
		// 		return $query->result();
		// 	}
		// }

		public function get_Comment_Car_id($auto_id){
			$sql = ("select * from (
					select c.idcomentario,c.comentario,c.nivel,c.estado,c.creafecha as creaComment,
					au.idauto,au.idmarca,au.modelo,au.placa,au.precio,
					au.anio,au.nropuertas,au.color,au.fechaini,au.fechafin,
					au.creafecha,u.idusuario,p.nombre,p.apepat,p.apemat,p.edad,
					p.sexo,p.fecnac,p.nrodoc,1 as dato,ifnull(c.idcomentariopadre,0) as idcomentariopadre 
					from comentario c
					inner join auto au on c.idauto = au.idauto
					left join marca m on au.idmarca = m.idmarca
					inner join usuario u on c.idusuario = u.idusuario
					inner join persona p on u.idpersona = p.idpersona
					where c.idauto = ? 
					and c.idcomentario in (select idcomentariopadre from comentario where idauto = ?) order by c.idcomentario) 
					as consulta2
					union all
					select * from (select c.idcomentario,c.comentario,c.nivel,c.estado,c.creafecha as creaComment,
					au.idauto,au.idmarca,au.modelo,au.placa,au.precio,
					au.anio,au.nropuertas,au.color,au.fechaini,au.fechafin,
					au.creafecha,u.idusuario,p.nombre,p.apepat,p.apemat,p.edad,
					p.sexo,p.fecnac,p.nrodoc,2 as dato,ifnull(c.idcomentariopadre,0) as idcomentariopadre 
					from comentario c
					inner join auto au on c.idauto = au.idauto
					left join marca m on au.idmarca = m.idmarca
					inner join usuario u on c.idusuario = u.idusuario
					inner join persona p on u.idpersona = p.idpersona
					where c.idauto = ? order by c.idcomentariopadre) 
					as consulta");
			$query=$this->db->query($sql, array($auto_id,$auto_id,$auto_id));
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		public function get_Comment_User_Id($user_id,$auto_id){
			$sql = ("select * from (
					select c.idcomentario,c.comentario,c.nivel,c.estado,c.creafecha as creaComment,
					au.idauto,au.idmarca,au.modelo,au.placa,au.precio,
					au.anio,au.nropuertas,au.color,au.fechaini,au.fechafin,
					au.creafecha,u.idusuario,p.nombre,p.apepat,p.apemat,p.edad,
					p.sexo,p.fecnac,p.nrodoc,1 as dato,ifnull(c.idcomentariopadre,0) as idcomentariopadre 
					from comentario c
					inner join auto au on c.idauto = au.idauto
					left join marca m on au.idmarca = m.idmarca
					inner join usuario u on c.idusuario = u.idusuario
					inner join persona p on u.idpersona = p.idpersona
					where c.idauto = ? and c.idusuario = ? 
					and c.idcomentario in (select idcomentariopadre from comentario where idauto = ? and idusuario not in(?)) order by c.idcomentario) 
					as consulta2
					union all
					select * from (select c.idcomentario,c.comentario,c.nivel,c.estado,c.creafecha as creaComment,
					au.idauto,au.idmarca,au.modelo,au.placa,au.precio,
					au.anio,au.nropuertas,au.color,au.fechaini,au.fechafin,
					au.creafecha,u.idusuario,p.nombre,p.apepat,p.apemat,p.edad,
					p.sexo,p.fecnac,p.nrodoc,2 as dato,ifnull(c.idcomentariopadre,0) as idcomentariopadre 
					from comentario c
					inner join auto au on c.idauto = au.idauto
					left join marca m on au.idmarca = m.idmarca
					inner join usuario u on c.idusuario = u.idusuario
					inner join persona p on u.idpersona = p.idpersona
					where c.idauto = ? and c.idusuario not in(?) order by c.idcomentariopadre) 
					as consulta");
			$query=$this->db->query($sql, array($auto_id,$user_id,$auto_id,$user_id,$auto_id,$user_id));
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		public function get_Comment_All($auto_id){
			$this->db->select('c.idcomentario,c.comentario,c.nivel,c.estado,c.creafecha,
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

		public function insertCommentPadre($data){
			$estado = 1;
			$fecha = date('Y-m-d');
			$dataComment = array(
					'idauto' => $data["idauto"],
					'idusuario' => $data["idusuario"],
					'comentario' => $data["comentario"],
					'creafecha' => $fecha,
					'estado' => $estado,
					'idcomentariopadre' => $data["idcomentariopadre"]
				);
			$this->db->insert('comentario',$dataComment);
		}

	}
?>