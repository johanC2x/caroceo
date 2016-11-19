<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //cargamos la base de datos por defecto
        $this->load->database('default');
        //cargamos el helper url y el helper form
        $this->load->helper(array('url','form'));
        //cargamos el modelo crud_model
        $this->load->model('product'); 
        $this->load->model('brand');
        $this->load->model('usuario');
        $this->load->model('publish');
    }

    public function index(){
        $data = array('titulo' => 'Crud en codeigniter',
                      'products' => $this->product->get_products(),
                      'brands' => $this->brand->get_brands());
        $data['login'] = 'No';
        $data['alerta'] = 'No';
        $data['usuario'] = '';
        $data['passw'] = '';
        if(!empty($_POST)){
            $datos = $this->usuario->login($_POST);
            $resultado = ((count($datos)>0)?'S':'N');
            $data['alerta'] = 'Si';
            $data['usuario'] = $_POST['usuario'];
            $data['passw'] = $_POST['passw'];
            if($resultado == 'S'){
                $data['alerta'] = 'No';
                $data['login'] = 'Si';
                $sess_array = array('idusuario' => $datos[0]['idusuario'],
                    'idtipousuario' => $datos[0]['idtipousuario'],
                    'nombre' => $datos[0]['nombre']);
                $this->session->set_userdata('logged_in', $sess_array);
                $session_data = $this->session->userdata('logged_in');
                $data['nombre'] = $session_data['nombre'];
                $this->load->view('index',$data);
            }else{
                $this->load->view('index',$data);
            }
        }else{
            $this->load->view('index',$data);
        }
    }
    
    public function perfil(){ 
        $data = array();
        $data['login'] = 'No';
        if($this->session->userdata('logged_in')){
            $data['login'] = 'Si';
            $session_data = $this->session->userdata('logged_in');
            $data['nombre'] = $session_data['nombre'];
            $data['idusuario'] = $session_data['idusuario'];
            $data['post'] = $this->product->get_post_car_user($data['idusuario']);
            //CAMBIO DE SESION=================================
            $_SESSION['nombre'] = $session_data['nombre'];
            $_SESSION['idusuario'] = $session_data['idusuario'];
            //=================================================
            $this->load->view('perfil',$data);
        }else{
            redirect('/inicio/index');
        }
    }

    public function cerrarsession(){
        $this->load->helper('url');
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('/inicio/index');
    }
}
