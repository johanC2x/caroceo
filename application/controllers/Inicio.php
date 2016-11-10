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
    }

    public function index(){
        $data = array('titulo' => 'Crud en codeigniter',
                      'products' => $this->product->get_products(),
                      'brands' => $this->brand->get_brands());
        $this->load->view('index',$data);
    }
}
