<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Comment extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->database('default');
	        $this->load->helper(array('url','form'));
	        $this->load->model('comment');
		}

		public function insert(){		
		try {
				if($this->input->is_ajax_request()){
					echo "llego";exit();
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

	}

 ?>