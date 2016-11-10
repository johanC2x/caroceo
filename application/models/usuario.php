<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Model{
    
    var $table = 'usuario';
    var $column_order = array('idusuario', 'idpersona', 'usuario', 'passw', 'estado', 'idtipousuario');
    var $column_search = array('idusuario', 'idpersona', 'usuario', 'passw', 'estado', 'idtipousuario');
    var $order = array('idusuario' => 'desc');

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function login($datos){
        $this->db->select('usuario.idusuario,usuario.idtipousuario,persona.nombre');
        $this->db->from($this->table);
        $this->db->join('persona','persona.idpersona = usuario.idpersona');
        $this->db->where('usuario', $datos['usuario']);
        $this->db->where('passw', $datos['passw']);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function cerrarsession(){
        $this->load->helper('url');
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('/inicio/index');
    }
}