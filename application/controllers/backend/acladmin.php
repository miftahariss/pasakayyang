<?php

/**
 * Description of acladmin
 *
 * @author digit002
 */
class Acladmin extends CI_Controller {

    private $limit = 10;

    public function __construct() {
        parent::__construct();
        $this->load->model('acladminmodel');
        //$this->load->helper('video');

        if (!$this->session->userdata('login')) {
            redirect('backend/cmsauth');
        }
        $this->sess_id = $this->session->userdata('user_id');

        // Login
//        if (!isset($_SERVER['PHP_AUTH_USER'])) {
//            header('WWW-Authenticate: Basic realm="Basic Authentication" ');
//            header('HTTP/1.0 401 Unautorized');
//            exit();
//        } else {
//            if ($_SERVER['PHP_AUTH_USER'] != 'digit' || $_SERVER['PHP_AUTH_PW'] != 'digit002') {
//                header('WWW-Authenticate: Basic realm="Basic Authentication" ');
//            }
//        }
    }

    private function onlyAdmin() {
        if ($this->session->userdata('role') != 1) {
            redirect('backend/acladmin');
        }
    }

    public function index() {
        $data['page'] = 'home';
        $data['title'] = 'Home';
        $this->load->view('acladmin/main', $data);
    }

    private function upload_gallery() {
        $this->load->library('image_lib');
        $format_upload = '';
        $files = $_FILES;
        $cpt = count($_FILES['galleryfile']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $rename = url_title(time()) . $i;

            $_FILES['galleryfile']['name'] = $files['galleryfile']['name'][$i];
            $_FILES['galleryfile']['type'] = $files['galleryfile']['type'][$i];
            $_FILES['galleryfile']['tmp_name'] = $files['galleryfile']['tmp_name'][$i];
            $_FILES['galleryfile']['error'] = $files['galleryfile']['error'][$i];
            $_FILES['galleryfile']['size'] = $files['galleryfile']['size'][$i];

            if (isset($_FILES['galleryfile']['name']) && $_FILES['galleryfile']['name'] != "") {

                $base_path = APPPATH . '../asset_admin/assets/uploads/cover/';
                chmod($base_path, 0777);
                $ori_path = $base_path . 'original/';

                $size = array(
                    array('width' => '150', 'height' => '150', 'type' => 'small'),
                    array('width' => '300', 'height' => '300', 'type' => 'medium'),
                    array('width' => '650', 'height' => '650', 'type' => 'large'),
                );

                //UPLOAD ORG IMAGE
                $config = array(
                    'upload_path' => $ori_path,
                    'allowed_types' => 'gif|jpg|jpeg|png',
                    'max_size' => '2048'
                );
                $this->load->library('upload', $config);
                $this->upload->do_upload('galleryfile');

                foreach ($size as $value) {

                    $image_data = $this->upload->data();

                    //RESIZE IMAGE
                    $config_thumb = array(
                        'image_library' => 'gd2',
                        'source_image' => $image_data['full_path'],
                        'new_image' => $base_path . $value["type"],
                        'create_thumb' => false,
                        'maintain_ratio' => true,
                        'width' => $value['width'],
                        'height' => $value['width']
                    );

                    $this->image_lib->initialize($config_thumb);
                    if (!$this->image_lib->resize()) {
                        echo $this->image_lib->display_errors();
                    }

                    //CROPING
                    switch ($value['type']) {
                        case 'small':
                            $meta_image['small'] = $base_path . 'small' . '/' . $rename . $image_data['file_ext'];
                            break;
                        case 'medium':
                            $meta_image['medium'] = $base_path . 'medium' . '/' . $rename . $image_data['file_ext'];
                            break;
                        case 'large':
                            $meta_image['large'] = $base_path . 'large' . '/' . $rename . $image_data['file_ext'];
                            break;
                    }

                    $config_crop = array(
                        'image_library' => 'gd2',
                        'source_image' => $base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext'],
                        'new_image' => $base_path . $value["type"] . '/' . $rename . $image_data['file_ext'],
                        'create_thumb' => false,
                        'maintain_ratio' => true,
                    );

                    $this->image_lib->initialize($config_crop);
                    if (!$this->image_lib->crop()) {
                        echo $this->image_lib->display_errors();
                    }

                    //DELETE RESIZE IMAGE
                    unlink($base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext']);
                    $this->image_lib->clear();
                }

                rename($image_data['full_path'], $ori_path . $rename . $image_data['file_ext']);
                $format_upload[] = $rename . $image_data['file_ext'];
            }
        }

        return $format_upload;
    }

    /**
     * Upload images
     * @return string
     */
    private function upload() {
        $this->load->library('image_lib');
        $format_upload = '';
        $rename = url_title(time());
        if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != "") {

            $base_path = APPPATH . '../asset_admin/assets/uploads/cover/';
            chmod($base_path, 0777);
            $ori_path = $base_path . 'original/';

            $size = array(
                array('width' => '150', 'height' => '150', 'type' => 'small'),
                array('width' => '300', 'height' => '300', 'type' => 'medium'),
                array('width' => '650', 'height' => '650', 'type' => 'large'),
            );

            //UPLOAD ORG IMAGE
            $config = array(
                'upload_path' => $ori_path,
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '2048'
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload();

            foreach ($size as $value) {

                $image_data = $this->upload->data();

                //RESIZE IMAGE
                $config_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => $image_data['full_path'],
                    'new_image' => $base_path . $value["type"],
                    'create_thumb' => false,
                    'maintain_ratio' => true,
                    'width' => $value['width'],
                    'height' => $value['width']
                );

                $this->image_lib->initialize($config_thumb);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                //CROPING
                switch ($value['type']) {
                    case 'small':
                        $meta_image['small'] = $base_path . 'small' . '/' . $rename . $image_data['file_ext'];
                        break;
                    case 'medium':
                        $meta_image['medium'] = $base_path . 'medium' . '/' . $rename . $image_data['file_ext'];
                        break;
                    case 'large':
                        $meta_image['large'] = $base_path . 'large' . '/' . $rename . $image_data['file_ext'];
                        break;
                }

                $config_crop = array(
                    'image_library' => 'gd2',
                    'source_image' => $base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext'],
                    'new_image' => $base_path . $value["type"] . '/' . $rename . $image_data['file_ext'],
                    'create_thumb' => false,
                    'maintain_ratio' => true,
                );

                $this->image_lib->initialize($config_crop);
                if (!$this->image_lib->crop()) {
                    echo $this->image_lib->display_errors();
                }

                //DELETE RESIZE IMAGE
                unlink($base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext']);
                $this->image_lib->clear();
            }

            rename($image_data['full_path'], $ori_path . $rename . $image_data['file_ext']);
            $format_upload = $rename . $image_data['file_ext'];
        }

        return $format_upload;
    }

    public function add_media() {
        $permalink = url_title($this->input->post('title'), 'dash', true);
        if ($this->input->post('submit')) {
            // validation
            $valid = $this->form_validation;
            $valid->set_rules('title', 'Judul', 'required');
            $valid->set_rules('short_desc', 'Short Desc', 'required');
            $valid->set_rules('body', 'Isi', 'required');
            $valid->set_rules('website', 'Website', 'required');
            $valid->set_rules('meta_keywords', 'Meta Keywords', 'required');
            $valid->set_rules('meta_description', 'Meta Description', 'required');
            if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] == "") {
                $valid->set_rules('userfile', 'Foto', 'required');
            }

            if ($valid->run() == false) {
                // run
            } else {

                $format_upload = $this->upload();
                $data = array(
                    'id_account' => 1,
                    'title' => $this->input->post('title'),
                    'short_desc' => $this->input->post('short_desc'),
                    'body' => $this->input->post('body'),
                    'filename' => $format_upload,
                    //'headline'         => $this->input->post('headline') ? 1 : 0,
                    'permalink' => $permalink,
                    'created_date' => time(),
                    'modified_date' => null,
                    'created_by' => $this->sess_id,
                    'modified_by' => null,
                    'status' => 1,
                );

                $id = $this->acladminmodel->addMedia($data);
//                if ($id) {
//                    $gallery = $this->upload_gallery();
//                    $this->acladminmodel->addGalleryArticle($gallery, $id);
//                }
                redirect('backend/acladmin/view_media');
            }
        }
        $data['page'] = 'add_media';
        $data['title'] = 'Tambah Media Baru';

        $data['content'] = $this->load->view('acladmin/module/add_media', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function view_media() {
        $data['headline'] = $this->input->get('filter') ? $this->input->get('filter') : '1';
        $this->load->library('pagination');
        $config['base_url'] = site_url('backend/acladmin/view_media');
        $config['per_page'] = $this->limit;
        $config['total_rows'] = $this->acladminmodel->countMedia(1);
        $config['uri_segment'] = 4;
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4) ? $this->uri->segment(4) : '');
        $data['media'] = $this->acladminmodel->fetchMedia($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['page'] = 'view_media';
        $data['title'] = 'Media Portolio';
        $data['content'] = $this->load->view('acladmin/module/view_media', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function edit_media() {
        $id = $this->uri->segment(4);
        if ($id) {
            $permalink = url_title($this->input->post('title'), 'dash', true);
            if ($this->input->post('submit')) {
                $valid = $this->form_validation;
                $valid->set_rules('channel', 'Kanal', 'required');
                $valid->set_rules('title', 'Judul', 'required');
                $valid->set_rules('short_desc', 'Short Desc', 'required');
                $valid->set_rules('body', 'Isi', 'required');
                $valid->set_rules('website', 'Website', 'required');
                $valid->set_rules('meta_keywords', 'Meta Keywords', 'required');
                $valid->set_rules('meta_description', 'Meta Description', 'required');

                if ($valid->run() == false) {
                    // show error in view
                } else {
                    $format_upload = $this->upload();
                    if ($format_upload != "") {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'body' => $this->input->post('body'),
                            'website' => $this->input->post('website'),
                            'filename' => $format_upload,
                            'id_channel' => $this->input->post('channel'),
                            //'headline'         => $this->input->post('headline') ? 1 : 0,
                            'permalink' => $permalink,
                            'meta_keywords' => $this->input->post('meta_keywords'),
                            'meta_description' => $this->input->post('meta_description'),
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateMedia($data, $id);
                    } else {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'body' => $this->input->post('body'),
                            'website' => $this->input->post('website'),
                            'id_channel' => $this->input->post('channel'),
                            //'headline'         => $this->input->post('headline'),
                            'permalink' => $permalink,
                            'meta_keywords' => $this->input->post('meta_keywords'),
                            'meta_description' => $this->input->post('meta_description'),
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateMedia($data, $id);
                    }

//                    $gallery = $this->upload_gallery();
//                    $this->acladminmodel->addGalleryArticle($gallery, $id);

                    redirect('backend/acladmin/view_media');
                }
            }
            $data['page'] = 'edit_media';
            $data['title'] = 'Edit Media';
            $data['article'] = $this->acladminmodel->getIdMedia($id);
            //$data['photos']  = $this->acladminmodel->getIdGalleryArticle($id);

            $parent = $this->acladminmodel->parentChannel();

            $option = '<select name="channel" required="required"><option value="">-- Pilih Kanal --</option>';

            foreach ($parent as $channel) {
                if ($data['article']->id_channel == $channel->id)
                    $select = 'selected';
                else
                    $select = '';

                $option .= "<option $select value=$channel->id>$channel->title</option>";
                $child = $this->acladminmodel->childChannel($channel->id);

                if (count($child) > 0) {
                    foreach ($child as $chl) {
                        if ($data['article']->id_channel == $chl->id)
                            $select = 'selected';
                        else
                            $select = '';

                        $option .= "<option $select value=$chl->id>&nbsp;&nbsp;&nbsp;$chl->title</option>";
                    }
                }
            }

            $data['channel'] = $option;
            $data['content'] = $this->load->view('acladmin/module/edit_media', $data, true);
            $this->load->view('acladmin/main', $data);
        } else {
            redirect('backend/acladmin/view_media');
        }
    }

    

    public function delete_media() {
        if ($this->uri->segment(4)) {
            $data = array('status' => 0);
            $id = $this->uri->segment(4);
            $this->acladminmodel->deleteMedia($data, $id);
            redirect('backend/acladmin/view_media');
        } else {
            redirect('backend/acladmin/view_media');
        }
    }

    public function search_media() {
        $search = $this->input->post('search');
        $submit = $this->input->post('submit');
        if ($search && $submit) {
            $data['media'] = $this->acladminmodel->search_media($search);
        } else {
            redirect(getenv('HTTP_REFERER'));
        }
        $data['page'] = 'search_media';
        $data['title'] = 'Search Results';
        $data['content'] = $this->load->view('acladmin/module/search_media', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    
    public function add_user() {
        $this->onlyAdmin();

        if ($this->input->post('submit')) {
            // validation
            $valid = $this->form_validation;
            $valid->set_rules('name', 'Nama User', 'required');
            $valid->set_rules('email', 'Email', 'required|valid_email');
            $valid->set_rules('role', 'Hak Akses', 'required');
            $valid->set_rules('password', 'Password', 'min_length[5]|required');
            $valid->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]');

            if ($valid->run() == false) {
                // run
            } else {
                $name = $this->input->post('name');
                $email = $this->input->post('email');

                //cek user/email exist
                $exist = $this->userEmailExist($name, $email);

                if (!$exist) {
                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'role' => $this->input->post('role'),
                        'password' => sha1(md5($this->input->post('password'))),
                        'created_date' => time(),
                        'modified_date' => null,
                        'status' => 1
                    );

                    $this->acladminmodel->addUser($data);
                    redirect('backend/acladmin/view_user');
                }
            }
        }
        $data['page'] = 'add_user';
        $data['title'] = 'Tambah User Baru';
        $data['content'] = $this->load->view('acladmin/module/add_user', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    /**
     * check user/email
     */
    public function userEmailExist($name, $email, $id = false) {
        //check username
        $username = $this->acladminmodel->checkUsernameExist($name, $id);

        if ($username->num_rows() > 0) {
            $this->session->set_flashdata('error', 'Nama User Sudah Digunakan');
            redirect(getenv('HTTP_REFERER'));
        }

        //check email
        $email = $this->acladminmodel->checkEmailExist($email, $id);

        if ($email->num_rows > 0) {
            $this->session->set_flashdata('error', 'Email Sudah Digunakan');
            redirect(getenv('HTTP_REFERER'));
        }

        return false;
    }

    /**
     * list user
     * status 1
     */
    public function view_user() {
        $this->onlyAdmin();

        $this->load->library('pagination');
        $config['base_url'] = site_url('backend/acladmin/view_user');
        $config['per_page'] = $this->limit;
        $config['total_rows'] = $this->acladminmodel->countUser(1);
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4) ? $this->uri->segment(4) : '');
        $data['list'] = $this->acladminmodel->fetchUser($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['page'] = 'view_user';
        $data['title'] = 'User';
        $data['content'] = $this->load->view('acladmin/module/view_user', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    /**
     * edit user
     */
    public function edit_user() {
        $this->onlyAdmin();

        $id = $this->uri->segment(4);
        if ($id) {
            if ($this->input->post('submit')) {
                // validation
                $valid = $this->form_validation;
                $valid->set_rules('name', 'Nama User', 'required');
                $valid->set_rules('email', 'Email', 'required|valid_email');
                $valid->set_rules('role', 'Hak Akses', 'required');
                $valid->set_rules('password', 'Password', 'min_length[5]|required');
                $valid->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]');

                if ($valid->run() == false) {
                    // run
                } else {
                    $name = $this->input->post('name');
                    $email = $this->input->post('email');

                    //cek user/email exist
                    $exist = $this->userEmailExist($name, $email, $id);

                    if (!$exist) {
                        $data = array(
                            'name' => $name,
                            'email' => $email,
                            'role' => $this->input->post('role'),
                            'modified_date' => time(),
                            'status' => 1
                        );

                        $password = $this->input->post('password');
                        $old_password = $this->input->post('oldpass');

                        if ($password != $old_password)
                            $data['password'] = sha1(md5($password));

                        $this->acladminmodel->updateUser($data, $id);
                        redirect('backend/acladmin/view_user');
                    }
                }
            }
            $id = $this->uri->segment(4);
            $data['edit'] = $this->acladminmodel->getIdUser($id);
            $data['page'] = 'edit_user';
            $data['title'] = 'Edit User';
            $data['content'] = $this->load->view('acladmin/module/add_user', $data, true);
        } else {
            redirect('backend/acladmin/view_user');
        }
        $this->load->view('acladmin/main', $data);
    }

    /**
     * edit user
     */
    public function edit_password() {
        if ($this->input->post('submit')) {
            // validation
            $valid = $this->form_validation;
            $valid->set_rules('old_password', 'Password Lama', 'required');
            $valid->set_rules('new_password', 'Password Baru', 'min_length[5]|required');
            $valid->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[new_password]');

            if ($valid->run() == false) {
                // run
            } else {

                $cek_password = $this->acladminmodel->checkPassword($this->input->post('old_password'));
                if ($cek_password) {
                    $data = array(
                        'password' => sha1(md5($this->input->post('new_password'))),
                        'modified_date' => time()
                    );
                    $id = $this->session->userdata('user_id');
                    $this->acladminmodel->updateUser($data, $id);
                    $this->session->set_flashdata('success', 'Berhasil Ubah Password');
                } else {
                    $this->session->set_flashdata('error', 'Password Lama Salah');
                }
                redirect(getenv('HTTP_REFERER'));
            }
        }
        $data['page'] = 'edit_password';
        $data['title'] = 'Edit Password';
        $data['content'] = $this->load->view('acladmin/module/edit_password', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    /**
     * delete channel
     * change status 1 to 0
     */
    public function delete_user() {
        $this->onlyAdmin();

        if ($this->uri->segment(4)) {
            $data = array('status' => 0);
            $id = $this->uri->segment(4);
            $this->acladminmodel->deleteUser($data, $id);
        }
        redirect('backend/acladmin/view_user');
    }

    /**
     * list channel status 0
     */
    public function archive_user() {
        $this->onlyAdmin();

        $this->load->library('pagination');
        $config['base_url'] = site_url('backend/acladmin/archive_user');
        $config['per_page'] = $this->limit;
        $config['total_rows'] = $this->acladminmodel->countUser(0);
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4) ? $this->uri->segment(4) : '');
        $data['content'] = $this->acladminmodel->fetchArchiveUser($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['page'] = 'archive_user';
        $data['title'] = 'Arsip User';
        $data['content'] = $this->load->view('acladmin/module/archive_user', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function active_user() {
        $this->onlyAdmin();

        if ($this->uri->segment(4)) {
            $id = $this->uri->segment(4);
            $data = array('status' => 1);
            $this->acladminmodel->activeUser($data, $id);
        }
        redirect('backend/acladmin/view_user');
    }

    /*     * ***************** END OFF USER ***************** */
}
