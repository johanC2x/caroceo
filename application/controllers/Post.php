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
        $this->load->model('usuario');
    } 

    public function index($idauto = null){
        $this->load->helper('url');
        $data = array();
        $data['login'] = 'No';
        $data['codeTimon'] = $this->code->get_Code_Type('tipotimon');
        $data['codeTransmision'] = $this->code->get_Code_Type('tipotransmision');
        $data['codeCombustible'] = $this->code->get_Code_Type('tipocombustible');
        $data['brands'] = $this->brand->get_brands();
        $data['nomfuncion'] = 'post.js';
        $data['alerta'] = 'No';
        $data['login'] = 'No';
        $data['usuario'] = '';
        $data['passw'] = '';
        if($this->session->userdata('logged_in')){
            $data['login'] = 'Si';
            $session_data = $this->session->userdata('logged_in');
            $data['nombre'] = $session_data['nombre'];
            $this->load->view('post',$data);
        }else{
            $this->load->view('post',$data);
        }
    }

    public function insert(){
        try {
            $fecha = date('Y-m-d');
            if($this->input->is_ajax_request()){
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
        try{
            if($this->input->is_ajax_request()){
                $data = array(
                        'idauto'=>$this->input->post('idauto'),
                        'idusuario'=>$this->input->post('idusuario'),
                        'comentario'=>$this->input->post('comentario')
                );
                $this->comment->insertComment($data);
                echo 1;
            }
        }catch (Exception $e) {
            var_dump($e->getMessage());
        }	
    }
}