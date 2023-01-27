<?php

class Welcome_model extends CI_Model {

    function __construct() {
        parent::__construct();
        #$this->load->database();
    }

    private $table  = 'preregistro' ;

    public function insert($data)
    {
        $isOkey = $this->db->insert($this->table, $data);
        return ($isOkey == true) ? true : false;
    }

    public function readData()
    {
        $rstQuery = $this->db->get($this->table);
        return $rstQuery->result_array();
    }

    public function fetch($id)
    {
        $rstQuery = $this->db->get_where($this->table, array('id_preregistro' => $id));
        #$result = $rstQuery->row_array();
        return $rstQuery->result_array();
    }

    public function update($id, $data){
        $this->db->where('id_preregistro', $id);
        $isOkey = $this->db->update($this->table, $data);
        return ($isOkey == true) ? true : false;
    }

}