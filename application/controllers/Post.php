<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller{

	function __construct(){
		parent::__construct();
        $this->load->database('default');
        $this->load->helper(array('url','form'));
        $this->load->model('code');
        $this->load->model('brand');
        $this->load->model('product');
        $this->load->model('publish');
        $this->load->model('comment');
        $this->load->model('comment');
	} 

	public function index($idauto = null){
		if($idauto == null){
			$data = array('codeTimon' => $this->code->get_Code_Type('tipotimon'),
                      'codeTransmision' => $this->code->get_Code_Type('tipotransmision'),
                      'codeCombustible' => $this->code->get_Code_Type('tipocombustible'),
                      'brands' => $this->brand->get_brands());
			$data['nomfuncion'] = 'post.js';
			$data['alerta'] = 'No';
			$data['usuario'] = '';
	        $data['passw'] = '';
		}else{
			$data = array('codeTimon' => $this->code->get_Code_Type('tipotimon'),
                      'codeTransmision' => $this->code->get_Code_Type('tipotransmision'),
                      'codeCombustible' => $this->code->get_Code_Type('tipocombustible'),
                      'brands' => $this->brand->get_brands(),
                      'post' => $this->product->get_products_id($idauto));
		}
		$this->load->view('post',$data);
	}

	public function insert(){
		try {
			$fecha = date('Y-m-d');
			if($this->input->is_ajax_request()){
				/*
				$upload_folder = '../../assets/img';
		        $nombre_archivo = $_FILES['file']['name'];
		        opendir($upload_folder);
		        $archivador = $upload_folder . '/' . $nombre_archivo;
		        copy($_FILES['file']['tmp_name'], $archivador);
		        $tipo_archivo = $_FILES['file']['type'];
		        $tipo_archivo = $_FILES['file']['type'];
		        $tamano_archivo = $_FILES['file']['size'];
		        $tmp_archivo = $_FILES['file']['tmp_name'];
		        */
				//AUTO-PUBLISH
				$data = array(
					'idmarca'=>$this->input->post('idmarca'),
					'idusuario' => $_SESSION['idusuario'],
					'modelo'=>$this->input->post('modelo'),
					'anio'=>$this->input->post('anio'),
					'titulo'=>$this->input->post('titulo'),
					'precio'=>$this->input->post('precio'),
					'nropuertas'=>$this->input->post('nropuertas'),
					'color'=>$this->input->post('color'),
					'idtipotransmision'=>$this->input->post('idtipotransmision'),
					'idtipotimon'=>$this->input->post('idtipotimon'),
					'idtipocombustible'=>$this->input->post('idtipocombustible'),
					'descripcion' =>$this->input->post('descripcion'),
					'fechaini' => $fecha,
					'fechafin' => $fecha,
					'estado' => 1
				);
				$this->product->insertProduct($data);
				echo 1;
			} 
		} catch (Exception $e) {
			var_dump($e->getMessage());
		} 
	}

	public function postId($idauto = null){
		$data = array('post' => $this->product->get_products_id($idauto),
					  'comment' => $this->comment->get_Comment_User_Id($_SESSION['idusuario'],$idauto));
		$this->load->view('publish',$data);
	}

	public function insertComment(){		
	try {
			if($this->input->is_ajax_request()){
				$data = array(
					'idauto'=>$this->input->post('idauto'),
					'idusuario'=>$this->input->post('idusuario'),
					'comentario'=>$this->input->post('comentario')
				);
				$this->comment->insertComment($data);
				echo 1;
			}
		} catch (Exception $e) {
			var_dump($e->getMessage());
		}	
	}

	public function update(){
		try {
			if($this->input->is_ajax_request()){
				$data = array(
					'idmarca'=>$this->input->post('idmarca'),
					'idusuario' => $_SESSION['idusuario'],
					'modelo'=>$this->input->post('modelo'),
					'anio'=>$this->input->post('anio'),
					'titulo'=>$this->input->post('titulo'),
					'motor'=>$this->input->post('motor'),
					'precio'=>$this->input->post('precio'),
					'nropuertas'=>$this->input->post('nropuertas'),
					'color'=>$this->input->post('color'),
					'idtipotransmision'=>$this->input->post('idtipotransmision'),
					'idtipotimon'=>$this->input->post('idtipotimon'),
					'idtipocombustible'=>$this->input->post('idtipocombustible'),
					'descripcion' =>$this->input->post('descripcion'),
					'estado' =>$this->input->post('estado')
				);
				$this->product->updateProduct($data,$this->input->post('idauto'));
				echo 1;
			}
		} catch (Exception $e) {
			var_dump($e->getMessage());
		}
	}

	public function obtenerPorOrdenMarca(){
		try {
			$idmarca = $_POST["idmarca"];
			$data = array('product' => $this->product->get_product_order_brand($idmarca));
			echo json_encode($data);
		} catch (Exception $e) {
			var_dump($e->getMessage());
		}
	}

}