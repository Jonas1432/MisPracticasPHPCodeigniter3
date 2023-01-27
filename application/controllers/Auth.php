<?php

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $this->load->view('view_login');
    }

    public function ingresar()
    {
        //comprobamos que datos estamos recibiendo por POST
        #print_r($_POST);
        $usuario =  trim($this->input->post('email'));
        $password = trim($this->input->post('pwd'));

        if ($this->verificarUsuario($usuario) == true) {
            $is_session = $this->Auth_model->selectUser($usuario, $password);
            if (!$is_session) {
                
                $this->session->set_flashdata('warning', 'El usuario y/o contraseña no coinciden');
                
            } else {

                $params = array(
                    'id' => $is_session['id_preregistro'],
                    'nombre' => $is_session['nombre'] . ' ' . $is_session['apaterno'] . ' ' . $is_session['amaterno'],
                    'correo' => $is_session['correo'],
                    'perfil' => 2,
                    'acceso' =>  true
                );
               
                $this->session->set_userdata($params);
                #print_r($this->session); // podemos verificar los valores que trae la session global
                #$this->session->set_flashdata('success', 'Bienvendio '.$this->session->userdata('nombre'));
                $this->session->set_flashdata('success', 'Bienvendio '.$params['nombre']);
                redirect('Welcome');
            }
        } else {

            $this->session->set_flashdata('dager', 'El usuario no existe');
        }
    }

    public function verificarUsuario($dato)
    {
        return $this->Auth_model->verificaExistencia($dato);
    }

    public function salir()
    {
        $vars = array('id', 'correo', 'nombre', 'acceso');
        $this->session->unset_userdata($vars);
        $this->session->sess_destroy();
        redirect('');
    }
}
