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
		$data = array();
		$data['login'] = 'No';
		$data['nomfuncion'] = 'post.js';
		$data['alerta'] = 'No'; 
		$data['usuario'] = '';
        $data['passw'] = '';
        if($this->session->userdata('logged_in')){
        	$data['login'] = 'Si';
            $session_data = $this->session->userdata('logged_in');
            $data['idusuario'] = $session_data['idusuario'];
            $data['nombre'] = $session_data['nombre'];
        }
		if($idauto == null){
		    $data['codeTimon'] = $this->code->get_Code_Type('tipotimon');
	        $data['codeTransmision'] = $this->code->get_Code_Type('tipotransmision');
	        $data['codeCombustible'] = $this->code->get_Code_Type('tipocombustible');
	        $data['brands'] = $this->brand->get_brands(); 
		}else{
			$data['codeTimon'] = $this->code->get_Code_Type('tipotimon');
            $data['codeTransmision'] = $this->code->get_Code_Type('tipotransmision');
            $data['codeCombustible'] = $this->code->get_Code_Type('tipocombustible');
            $data['brands'] = $this->brand->get_brands();
            $data['post'] = $this->product->get_products_id($idauto);
		}
		$this->load->view('post',$data);
	}

	public function insert(){
		try {
			$fecha = date('Y-m-d');
			if($this->input->is_ajax_request()){
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
				//GREGAR CAMPO CORREO EN USUARIO O PERSONA
				echo 1;
			} 
		} catch (Exception $e) {
			var_dump($e->getMessage());
		} 
	}

	public function postId($idauto = null){ 
		$data = array();		
		if(isset($_SESSION['idusuario']) == false){
			$data = array('post' => $this->product->get_products_id($idauto),
					      'comment' => $this->comment->get_Comment_Car_id($idauto));
		}else if(isset($_SESSION['idusuario']) == true) {
			$data = array('post' => $this->product->get_products_id($idauto),
					      'comment' => $this->comment->get_Comment_User_Id($_SESSION['idusuario'],$idauto));
		}
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

	public function insertResComment(){
		try {
			if($this->input->is_ajax_request()){
				$data = array(
					'idauto'=>$this->input->post('idauto'),
					'idusuario'=> $_SESSION['idusuario'],
					'comentario'=>$this->input->post('txtaresComment'),
					'idcomentariopadre'=>$this->input->post('idcomentario')
				);
				$this->comment->insertCommentPadre($data);
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

	public function filtrarAuto(){
		try { 
			$txtVehiculo = $this->input->post('txtVehiculo');
			$data = array('productFilter' => $this->product->get_product_filter($txtVehiculo),
						  'products' => $this->product->get_products(),
                      	  'brands' => $this->brand->get_brands());
			$this->load->view('filtroVehiculo',$data);
			// if($txtVehiculo != ""){
				
			// }else{
			// 	$ruta = base_url().'index.php/inicio/index';
			// 	echo "<script>location.href = '".$ruta."' </script>";
			// }
		} catch (Exception $e) {
			var_dump($e->getMessage());
		}
	}

	public function filtrarPorMarca($idMarca = null){
		try {
			$data = array('productFilter' => $this->product->get_product_brand($idMarca),
						  'products' => $this->product->get_products(),
                      	  'brands' => $this->brand->get_brands());
			$this->load->view('filtroVehiculo',$data);
		} catch (Exception $e) {
			var_dump($e->getMessage());
		}
	}

	public function filtrarPorPrecio(){
		try {
			$txtPrecioFiltro = $this->input->post('txtPrecioFiltro'); 
			$data = array('productFilter' => $this->product->get_product_Price($txtPrecioFiltro),
						  'products' => $this->product->get_products(),
                      	  'brands' => $this->brand->get_brands());
			$this->load->view('filtroVehiculo',$data);
		} catch (Exception $e) {
			var_dump($e->getMessage());
		}
	}

	public function filtrarPorAnio(){
		try {
			$spinnerAnio = $this->input->post('spinnerAnio');
			$data = array('productFilter' => $this->product->get_product_Year($spinnerAnio),
						  'products' => $this->product->get_products(),
                      	  'brands' => $this->brand->get_brands());
			$this->load->view('filtroVehiculo',$data);
		} catch (Exception $e) {
			var_dump($e->getMessage());
		}
	}

	public function subirFile(){
		try {
			$idauto = $this->input->post('idauto');
			$idusuario = $this->input->post('idusuario');
			 $config = [
				"upload_path" => "./assets/img/app/user",
				'allowed_types' => "png|jpg"
			]; 
	        $this->load->library('upload', $config);
            // $this->_create_thumbnail($file_info['file_name']); 
            if ($this->upload->do_upload('file')) {
            	$datos = array('upload_data' => $this->upload->data()); 
				$data = array( 
					'file'=>$datos['upload_data']['file_name']
				);
				$this->product->updateProductFile($data,$idauto,$idusuario);
				$ruta = base_url().'index.php/inicio/perfil';
				redirect('/inicio/perfil');
				// echo "<script>location.href = '".$ruta."' </script>";
            }else{
            	// something went really wrong show error page
			    $error = array('error' => $this->upload->display_errors()); 
			    var_dump($error);
            }
		} catch (Exception $e) {
			var_dump($e->getMessage());
		}
	}

	function _create_thumbnail($filename){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = '../../assets/img/app/user'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image']='uploads/thumbs/';
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }
     
}