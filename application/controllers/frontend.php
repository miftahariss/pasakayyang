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

        $data['updates'] = $this->m_frontend->get_updates();
        //var_dump($data['updates']);exit;

        $data['mainpage'] = 'frontend/update';
        $this->load->view('frontend/templates', $data);
    }

    public function detail(){
        $data['base'] = 'Update';

        $data['mainpage'] = 'frontend/detail';
        $this->load->view('frontend/templates', $data);
    }

    public function kontak(){
        $data['base'] = 'Kontak';

        $data['mainpage'] = 'frontend/kontak';
        $this->load->view('frontend/templates', $data);
    }

}
