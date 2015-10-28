<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_frontend extends CI_Model{
	function __construct() {
        parent::__construct();
    }

    public function get_updates(){
    	$data = array();

        $this->db->order_by('id', 'desc');
        $this->db->where('status', '1');
        $query = $this->db->get('update');

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
}