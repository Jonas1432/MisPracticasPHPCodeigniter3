<?php

class Auth_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    private $table  = 'preregistro';

    public function selectUser($usuario, $password)
    {
        #print_r($usuario, $password); exit(); //Esta podria ser una forma de validar que estamos llegando  al modelo
        //$rstQuery = $this->db->get_where($this->table, array('correo' => $usuario, 'contrasenia' => $password ));
        $rstQuery = $this->db->get_where($this->table, 
                                        array('correo' => $usuario));
        if ($rstQuery->num_rows() == 1) {
            $result = $rstQuery->row_array();    
            if (password_verify($password, $result['contrasenia']) == true) {
                #print_r($result); exit();
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function logAcceeso()
    {

    }

    public function verificaExistencia($usuario)
    {
        #print_r($usuario, $password); exit();

        $rstQuery = $this->db->get_where($this->table, array('correo' => $usuario));
        if ($rstQuery->num_rows() > 0) {
            #$result = $rstQuery->row_array();
            #print_r($result); exit();
            return true;
        } else {
            return false;
        }
    }
}
