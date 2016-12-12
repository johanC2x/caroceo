<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Product extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		//OBTENER AUTO-PUBLICACION POR USUARIO
		public function get_post_car_user($user_id){
			$this->db->select('per.nombre,per.apepat,per.apemat,per.edad,per.nrodoc,u.usuario,
							   au.idauto,au.modelo,au.placa,au.precio,au.anio,au.nropuertas,au.color,au.idusuario,
							   au.fechaini,au.fechafin,au.estado,au.creafecha,au.descripcion,au.titulo,au.file');
			$this->db->from('auto as au'); 
			$this->db->join('usuario as u','au.idusuario = u.idusuario');
			$this->db->join('persona as per','u.idpersona = per.idpersona');
			$this->db->join('marca as m','au.idmarca = m.idmarca','left');
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
			$this->db->limit(12);
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

		public function get_product_order_brand($idmarca){
			$this->db->select('au.idauto,au.titulo,au.precio,au.modelo,au.idmarca,m.nombre as nonmarca,au.file');
			$this->db->from('auto as au');
			$this->db->join('marca as m','au.idmarca = m.idmarca','left');
			$this->db->where('au.idmarca',$idmarca);
			$this->db->order_by("m.idmarca", "asc");
			$this->db->limit(12);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		public function get_count_product($user_id){
			$sql = ("select count(*) as contador,1 as tipo from auto where idusuario = ?
					 union all
					 select count(*) as contador,2 as tipo from comentario c
					 inner join auto au on c.idauto = au.idauto
					 where au.idusuario = ? and c.idusuario not in(?)
					 union all
					 select count(*)  as contador,3 as tipo from comentario c
					 inner join auto au on c.idauto = au.idauto
					 where c.idusuario = ? and au.idusuario not in(?)");
			$query=$this->db->query($sql, array($user_id,$user_id,$user_id,$user_id,$user_id));
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		public function get_products_id($idauto){
			$this->db->select('per.nombre,per.apepat,per.apemat,per.edad,per.nrodoc,u.usuario,
							   au.idauto,au.modelo,au.placa,au.precio,au.anio,au.nropuertas,au.color,au.idusuario,
							   au.fechaini,au.fechafin,au.estado,au.creafecha,au.descripcion,au.titulo,au.idmarca,au.motor,
							   au.idtipotimon,au.idtipotransmision,au.idtipocombustible,m.nombre as nonmarca,au.file');
			$this->db->from('auto as au'); 
			$this->db->join('usuario as u','au.idusuario = u.idusuario');
			$this->db->join('persona as per','u.idpersona = per.idpersona');
			$this->db->join('marca as m','au.idmarca = m.idmarca','left');
			$this->db->where('au.idauto',$idauto);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		public function get_product_filter($descripcion){
			$sql = ("select per.nombre,per.apepat,per.apemat,per.edad,per.nrodoc,u.usuario,
					au.idauto,au.modelo,au.placa,au.precio,au.anio,au.nropuertas,au.color,au.idusuario,
					au.fechaini,au.fechafin,au.estado,au.creafecha,au.descripcion,au.titulo,au.idmarca,au.motor,
					au.idtipotimon,au.idtipotransmision,au.idtipocombustible,m.nombre as nonmarca,au.file
					from auto as au
					inner join usuario as u on au.idusuario = u.idusuario
					inner join persona as per on u.idpersona = per.idpersona
					left join marca as m on au.idmarca = m.idmarca
					where concat(m.nombre,' ',au.anio,' ',au.nropuertas,' ',au.modelo) like concat('%',?,'%')");
			$query=$this->db->query($sql, array($descripcion));
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		public function get_product_brand($idmarca){
			$sql = ("select per.nombre,per.apepat,per.apemat,per.edad,per.nrodoc,u.usuario,
					au.idauto,au.modelo,au.placa,au.precio,au.anio,au.nropuertas,au.color,au.idusuario,
					au.fechaini,au.fechafin,au.estado,au.creafecha,au.descripcion,au.titulo,au.idmarca,au.motor,
					au.idtipotimon,au.idtipotransmision,au.idtipocombustible,m.nombre as nonmarca,au.file
					from auto as au
					inner join usuario as u on au.idusuario = u.idusuario
					inner join persona as per on u.idpersona = per.idpersona
					left join marca as m on au.idmarca = m.idmarca
					where au.idmarca = ?");
			$query=$this->db->query($sql, array($idmarca));
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		public function get_product_Price($precio){
			$sql = ("select per.nombre,per.apepat,per.apemat,per.edad,per.nrodoc,u.usuario,
					au.idauto,au.modelo,au.placa,au.precio,au.anio,au.nropuertas,au.color,au.idusuario,
					au.fechaini,au.fechafin,au.estado,au.creafecha,au.descripcion,au.titulo,au.idmarca,au.motor,
					au.idtipotimon,au.idtipotransmision,au.idtipocombustible,m.nombre as nonmarca,au.file
					from auto as au
					inner join usuario as u on au.idusuario = u.idusuario
					inner join persona as per on u.idpersona = per.idpersona
					left join marca as m on au.idmarca = m.idmarca
					where au.precio like concat('%',?,'%')");
			$query=$this->db->query($sql, array($precio));
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		public function get_product_Year($anio){
			$sql = ("select per.nombre,per.apepat,per.apemat,per.edad,per.nrodoc,u.usuario,
					au.idauto,au.modelo,au.placa,au.precio,au.anio,au.nropuertas,au.color,au.idusuario,
					au.fechaini,au.fechafin,au.estado,au.creafecha,au.descripcion,au.titulo,au.idmarca,au.motor,
					au.idtipotimon,au.idtipotransmision,au.idtipocombustible,m.nombre as nonmarca,au.file
					from auto as au
					inner join usuario as u on au.idusuario = u.idusuario
					inner join persona as per on u.idpersona = per.idpersona
					left join marca as m on au.idmarca = m.idmarca
					where au.anio like concat('%',?,'%')");
			$query=$this->db->query($sql, array($anio));
			if($query->num_rows() > 0){
				return $query->result();
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

		public function updateProduct($data,$idauto){
			$this->db->where('idauto', $idauto);
			$this->db->update('auto',$data);
		}

		public function updateProductFile($data,$idauto,$iduser){
			$this->db->where('idauto',$idauto)->where('idusuario',$iduser);
			$this->db->update('auto',$data);
		}
 
	}

?>