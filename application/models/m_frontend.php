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

    public function get_detail_updates($permalink){
        $data = array();

        $this->db->where('status', '1');
        $this->db->where('permalink', $permalink);
        $query = $this->db->get('update');

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_updates_home(){
        $data = array();

        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $this->db->where('status', '1');
        $query = $this->db->get('update');

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $rows) {
                $data[] = $rows;
            }
        }

        $query->free_result();
        return $data;
    }

    public function get_galeri_home(){
        $data = array();

        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $this->db->where('status', '1');
        $query = $this->db->get('galeri');

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $rows) {
                $data[] = $rows;
            }
        }

        $query->free_result();
        return $data;
    }
}