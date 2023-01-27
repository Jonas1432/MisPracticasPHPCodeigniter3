<?php

class Perfiles extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Perfiles_model');
    }


    public function index()
    {
        $this->load->view('template/head');
        $this->load->view('template/navbar');
        $this->load->view('view_perfiles');
        $this->load->view('template/footer');
    }


    public function registrar()
    {
        //var_dump($_POST);
        //print_r($_POST);
        //die();
        //exit();

        //echo $this->input->post('perfil');

        
        if ($this->input->post('acction') == 'editar') {
            # code...
            $datos = array(
                'nombre_perfil' => trim($this->input->post('nombre_perfil')),
                'especialidad' => trim($this->input->post('especialidad'))
            );
            $id  = $this->input->post('id_perfil');
            $response = $this->Perfiles_model->update($id, $datos);
            if ($response == TRUE) {
                # code...
                echo  json_encode("Actualizado correctamente");
            } else {
    
                echo  json_encode("No fue posible realizar el resgistro, conacta a soporte");
            }

        }else{
            $datos = array(
                'nombre_perfil' => trim($this->input->post('nombre_perfil')),
                 'especialidad' => trim($this->input->post('especialidad'))
            );
            $response = $this->Perfiles_model->insert($datos);
            if ($response == TRUE) {
                # code...
                echo json_encode("Regitro exitoso");
            } else {
    
                echo json_encode("No fue posible realizar el resgistro, conacta a soporte");
            }
        }

        
    }
    
    public function listar()
    {

        $response =  $this->Perfiles_model->readData();
        $data = array();
        foreach ($response as $key) {

            //<button class="btn btn-info btn-sm btn-block update" id="' . $key['id_perfil'] . ' "><i class='fa-solid fa-pen'></i></button>
            $botones =
            '<button class="btn btn-info" type="button" onclick="updateData(' . $key['id_perfil'] . ')"><i class="fa-solid fa-pen"></i></button>
            <button class="btn btn-danger" type="button" onclick="eliminar(' . $key['id_perfil'] . ')"><i class="fa-solid fa-trash"></i></button>';
            $row = array();
            $row[] = $key['id_perfil'];
            $row[] = $key['nombre_perfil'];
            $row[] = $key['especialidad'];
            $row[] = $botones;
            $data[] = $row;
        }
        $result  = array('data' => $data);


        echo json_encode($result);
    }

    public function actualizar()
    {
        $idback = $this->input->post('idback');
        $data =  $this->Perfiles_model->fetch($idback);
 //print_r($data);
        echo json_encode($data);
    }
    public function eliminar()
    {
        $idback  = $this->input->post('idback');
        $response = $this->Perfiles_model->delete($idback);
        if($response == true){
            echo json_encode("Eliminado exitoso");
        }else{
            echo json_encode("No fue posible realizar el eliminado, contacte a soporte");
        }
        echo json_encode($response);
    }

}
