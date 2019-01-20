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
        $this->db->select('usuario.idusuario,usuario.idtipousuario,persona.nombre,persona.nombres'); 
        $this->db->from($this->table);
        $this->db->join('persona','persona.usuario = usuario.usuario');
        $this->db->where('usuario.usuario', $datos['usuario']);
        $this->db->where('usuario.passw', $datos['passw']);
        $query = $this->db->get();
        $data = $query->result_array(); 
        return $data;
    }

    public function registrousuario($data){
        try{
            if(isset($data['terminos'])){
                $data['terminos'] = 1;
            }else{
                $data['terminos'] = 2;
            }
            $datausuario = array('usuario' => 'DA'.$data['nrodoc'], 'passw' => $data['passw'],
                'estado' => 'A', 'terminos' => $data['terminos'], 'idtipousuario' => 'U'
                );
            $datapersona = array('nombres' => $data['nombres'], 'apellidos' => $data['apellidos']
                , 'nomcomp' => $data['nombres'].' '.$data['apellidos'],'sexo' => $data['sexo']
                , 'fecnac' => $data['ano'].'-'.$data['mes'].'-'.$data['dia'],'nrodoc' => $data['nrodoc']
                , 'email' => $data['email'], 'usuario' => 'DA'.$data['nrodoc']);
            $this->db->insert($this->table , $datausuario);
            $this->db->insert('persona' , $datapersona);
            return 'Si';
        }catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
    }
    
    public function updatepass($usuario,$password){
        try {
            $this->db->where('usuario', $usuario);
            $data =array('passw'=>$password);
            $this->db->update($this->table , $data);
            return 'Si';
        }catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
    }
}
?>