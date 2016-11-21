<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Persona extends CI_Model{
    
    var $table = 'persona';
    var $column_order = array('idpersona', 'nombres', 'apellidos', 'nomcomp', 'edad', 'sexo', 'fecnac', 'idtipodoc', 'nrodoc', 'email', 'usuario');
    var $column_search = array('idpersona', 'nombres', 'apellidos', 'nomcomp', 'edad', 'sexo', 'fecnac', 'idtipodoc', 'nrodoc', 'email', 'usuario');
    var $order = array('idpersona' => 'desc');

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function existeCorreo($CorreoUsu){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('email', $CorreoUsu);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
}