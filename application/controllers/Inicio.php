<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."views/reniec/vendor/autoload.php"); 

class Inicio extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database('default');
        $this->load->helper(array('url','form'));
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
                    'nombre' => $datos[0]['nombres']);
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
        $flag = '1';
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
            case 'datadni':
                $flag = '2';
                $reniecDni = new Tecactus\Reniec\DNI('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjA5ZDIwYzg3N2NmMzJjYjNjMTEzODIwNTU1YWQ1MmMwNmQzZWUwNzUxYTVkNWFjZTEzYmIwOGFjMDI1OWI3MGY2YmY5ZDNlZDg3YjM2ZGE1In0.eyJhdWQiOiIxIiwianRpIjoiMDlkMjBjODc3Y2YzMmNiM2MxMTM4MjA1NTVhZDUyYzA2ZDNlZTA3NTFhNWQ1YWNlMTNiYjA4YWMwMjU5YjcwZjZiZjlkM2VkODdiMzZkYTUiLCJpYXQiOjE0Nzk3NTAyNDksIm5iZiI6MTQ3OTc1MDI0OSwiZXhwIjo0NjM1NDIzODQ5LCJzdWIiOiI0NCIsInNjb3BlcyI6WyJ1c2UtcmVuaWVjIl19.YeAnxbgz3ZEh220kWInHEDHY8bdxeAahwMs5KKe4oN8LGW8Q6gG3cY0RqFU7GFVdgX5HPqUUzA90dSM-ZF_MrgpJLl10VkZtx_E_zxS6kXVC74oZ6o51NjFSaSz9g2FyVtMFR6ViJ-SuxUwxETkB2FDIghQGrEMjHIZO-RLl5VB59rjNKi_HunV0gdmBI4Ym2YmzV3cjx3tncBFHkhxfJOtZzraoz3MqNFrtxmIJLCgc72oyjfWrK8qHKnDzbA7ea3DpRo_JRgutLefA5IpOBk1t0wleTH4zZmcrrEzi0MJANeLEg1sUNHOB1AyqiHzbmo091_j8LHzERBDzpwYYPnny5csCNy3k9gH68dz99BgVZ5RsOayH0Cj-1lgxOJddeFeStKqd9ZmmmcNUchxGjvx7-HCKu5LdxrIiysdRFUP51rKFs5AYuE0jTv6Z93-GqJTxwB04GIAl9fkSSOzbKRr4p0-WqJpcbLhcislccxkS721tPN6ihSfLLA_xA7CmJKCDwHUO3xUooHceKXeJC6GGxE5KCu4jyiIWtwFpGl1YyKiyW5BNY-fIXnQEYGlMKv3d83z9hmSPQJ81J7OWFTc0xHgZKjUrH_uULQ4ZreW26zfbzRVgjP6diVTxAP6yE0KUZNmSBlybGIPt49iOYNt99l01dGERCPqObYCYB54');
                $datos = $reniecDni->get($_POST['dni']);
                //https://cel.reniec.gob.pe/celweb/
        endswitch;
        if($flag == '1'){
            echo json_encode(array('msj'=>$data['respuesta']));
        }else{
            echo json_encode($datos);
        }
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
    }}
