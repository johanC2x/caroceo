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
            $data['postCount'] = $this->product->get_count_product($data['idusuario']);

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
        $flag = '1';
        // $case = 'datadni';
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
                $reniecDni = new Tecactus\Reniec\DNI('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBiMzdiN2I0MmExZTNiODExMDYwYzU1NGI4MDNiNTMxNWZmMmJjZjNmZjY5OWQ2MmM4MzU2YTlmODNhNDEyNjEzODAxM2VjNzdhZWU2NDgyIn0.eyJhdWQiOiIxIiwianRpIjoiMGIzN2I3YjQyYTFlM2I4MTEwNjBjNTU0YjgwM2I1MzE1ZmYyYmNmM2ZmNjk5ZDYyYzgzNTZhOWY4M2E0MTI2MTM4MDEzZWM3N2FlZTY0ODIiLCJpYXQiOjE0ODE1ODUwNDYsIm5iZiI6MTQ4MTU4NTA0NiwiZXhwIjo0NjM3MjU4NjQ2LCJzdWIiOiI0NCIsInNjb3BlcyI6WyJ1c2UtcmVuaWVjIl19.YG-zCDF8wtLJkD3t75iPuiP3D0q1r8xZVOPTnww_7i9S4UH5lZ0ZZERLWcLfOZHoF1DAesx2ax4SXU8sX8SJMmEJkbOGc0BBxvJmR6NIjuwKoXSKtQvLwQkdkiTdCOtAfA5o7J57mmvTckOXTS6dFUxS6-EMqxUJM8nNmiRpC96ECc2NYmAk0WlZhxl13Sbc3RVt-zscVoSys-uLt5ytpEXowdObWwAh1mGByaV6VoJenMiRFt_JBunf6W9P0ogTpm0oQEisiwY8xQT9mPe16x4wNFInb-Fvz87HyPkhWR-sD5pAd-uGJM1hHc7KvfxcYbgnDyjpC84T_q3Iqft75jdQ9dBdj_LuJ9gPgfFDMuAHSFN81Z9iIYdgL8LblGbly0sDHCt-wWhxdNH0Ah8Gqx8VgqLPbBNf7udbM6quX7ZXjf8-F10XZ0EiYyS1BNAD8EtdvKa5uNdrIF4ZL0eDKDE6yYupDCT4XK90eKa9a-Fv0g191WmZ3Cilu19FpRcLI90yn5nW45Fu26CH3HsyAQotzOTfKj4B4nylVjT1QwE71z11NxBrkEzw7tqE3BQ_vrSihMob4c8PSz3hp4-XQekYGRcMwUfLgdZ6doFu9d-Z1cjag10P3xraBvmdgQC3g-OtwugVnrxm2nc3nG-2pjFLHpmTczb0I-AexfvC1bI');
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
    }


    /* RESUMEN DE USUARIO */
    public function resumen(){
        
    }

}
?>
    