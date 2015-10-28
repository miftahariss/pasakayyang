<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frontend extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_frontend');
    }

    public function index() {
        $data['base'] = 'Home';

        $data['mainpage'] = 'frontend/home';
        $this->load->view('frontend/templates', $data);
    }

    public function morowali(){
        $data['base'] = 'Morowali';

        $data['mainpage'] = 'frontend/morowali';
        $this->load->view('frontend/templates', $data);
    }

    public function sukubajo(){
        $data['base'] = 'Sukubajo';

        $data['mainpage'] = 'frontend/sukubajo';
        $this->load->view('frontend/templates', $data);
    }

    public function festival(){
        $data['base'] = 'Festival';

        $data['mainpage'] = 'frontend/festival';
        $this->load->view('frontend/templates', $data);
    }

    public function galeri(){
        $data['base'] = 'Galeri';

        $data['mainpage'] = 'frontend/galeri';
        $this->load->view('frontend/templates', $data);
    }

    public function update(){
        $data['base'] = 'Update';

        $limit = 6;

        $this->db->where_in('status', array('1'));
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $this->uri->segment(2));
        $photo_query = $this->db->get('update');
        $data['updates'] = $photo_query->result_array();

        $this->db->where_in('status', array('1'));
        $query_total = $this->db->get('update');
        $data['total'] = $query_total->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = site_url('update');
        $config['total_rows'] = $data['total'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 2;
        $config['num_links'] = 2;
        $config['prev_link'] = '&laquo;';
        // $config['prev_tag_open'] = '<li><span><span aria-hidden="true">';
        // $config['prev_tag_close'] = '</span></span></li>';
        $config['next_link'] = '»';
        // $config['next_tag_open'] = '<li><span aria-hidden="true">';
        // $config['next_tag_close'] = '</span></li>';
        $config['last_link'] = '';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['first_link'] = '';
        $config['first_tag_open'] = '';
        $config['first_tag_close'] = '';
        // $config['num_tag_open'] = '<li><span>';
        // $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<span class="page active">';
        $config['cur_tag_close'] = '</span>';
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['anchor_class'] = 'class="page"';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();

        $data['mainpage'] = 'frontend/update';
        $this->load->view('frontend/templates', $data);
    }

    public function detail(){
        $data['base'] = 'Update';

        $permalink = $this->uri->segment(2);

        $data['detail'] = $this->m_frontend->get_detail_updates($permalink);
        //var_dump($data['detail'][0]->title);exit;
        if($data['detail']==FALSE){redirect(show_404());die;}

        $data['mainpage'] = 'frontend/detail';
        $this->load->view('frontend/templates', $data);
    }

    public function kontak(){
        $data['base'] = 'Kontak';

        $data['mainpage'] = 'frontend/kontak';
        $this->load->view('frontend/templates', $data);
    }

}
