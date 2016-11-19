<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Perfil extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->database('default');
			$this->load->helper(array('url','form'));
			$this->load->model('product');
			$this->load->model('brand');
		}

		public function index(){
			$data = array('product' => $this->product->get_post_car_user($_SESSION['idusuario'])); 
			$this->load->view('perfil',$data);
		}

	}


?>