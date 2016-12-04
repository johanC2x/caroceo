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
        $this->load->model('persona');
    } 

    public function index(){
        $data = array('titulo' => 'Crud en codeigniter',
                      'products' => $this->product->get_products(),
                      'brands' => $this->brand->get_brands());
        $data['login'] = 'No';
        $data['alerta'] = 'No';
        $data['usuario'] = '';
        $data['passw'] = '';
        $data['nomfuncion'] = 'inicio.js';
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

    public function json(){
        $this->url_elements = explode('/', $_SERVER['PATH_INFO']);
        $case = $this->url_elements[3];
        $domain = explode('/', $_SERVER['HTTP_REFERER']);
        $urlContorlador = $domain[0].'//'.$domain[2].'/'.$domain[3].'/assets/imagenes/';
        switch ($case):
            case 'registro':
                $data['respuesta'] = $this->usuario->registrousuario($_POST);
                break;
            case 'recuperarpass':
                $existeCorreo = $this->persona->existeCorreo($_POST['CorreoUsu']);
                $datos = count($existeCorreo);
                if($datos > 0){
                    $data['respuesta'] = $this->envioCorreo($_POST['CorreoUsu'],$existeCorreo[0]['usuario']);
                }else{
                    $data['respuesta'] = 'correoNoExiste';
                }
                break;
        endswitch;
        echo json_encode(array('msj'=>$data['respuesta']));
    }
    
    public function envioCorreo($correo,$usuario){
        $password = $this->generateRandomString();
        $actualizarpass = $this->usuario->updatepass($usuario,$password);
        $email_body= "<b>Se actualizo su contraseña:</b><br/>";
        $email_body.= "<b>Usuario:</b> $usuario<br/>";
        $email_body.= "<b>Contraseña: </b>$password <br/>";
        $titulo = "Restauración de contraseña";
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: Descubre Autos <renato.mpisconte@gmail.com.com>\r\n";
        $to = $correo;
        $bool = mail($to,$titulo,$email_body,$headers);
        return 'Si';
    }

    public function generateRandomString($length = 10) { 
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    }
}
