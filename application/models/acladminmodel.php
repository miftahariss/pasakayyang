<?php

/**
 * Description of acladminmodel
 *
 * @author digit002
 */
class Acladminmodel extends CI_Model {

    private $table = array(
        'article' => 'article',
        'channel' => 'article_channel',
        'event'   => 'event',
        'project_gallery' => 'project_gallery',
        'album'   => 'photo_album',
        'counter' => 'view_counter',
        'user'    => 'user',
        'profile' => 'profile',
        'contact' => 'contact',
        'update'   => 'update',
        'services'=> 'services',
        'project' => 'project',
        'news_event' => 'news_event',
        'news_event_gallery' => 'news_event_gallery',
        'advertising_print' => 'advertising_print',
        'advertising_print_detail' => 'advertising_print_detail',
        'advertising_digital' => 'advertising_digital',
        'advertising_digital_detail' => 'advertising_digital_detail'
    );

    /**
     * show all data event
     * status 1
     * @param type $user
     * @param type $pass
     * @return type
     */

    public function checkLogin($user, $pass) {
        $this->db->select('*');
        $this->db->from($this->table['user']);
        $this->db->where("email = '$user' or name = '$user'");
        $this->db->where('password', $pass);

        return $this->db->get();
    }

    /**
     * Count Record article
     * @param type $status
     * @param $headline = 1
     * @return type
     */
    public function countArticle($status,$headline = 1) {
        $this->db->select('id');
        $this->db->from($this->table['article']);
        $this->db->where('status', $status);
        $this->db->where('id_channel !=', 0);

        if ($headline == '2') {
            $this->db->where('headline', 1);
        } else if ($headline == '3') {
            $this->db->where('headline', 0);
        }

        $count = $this->db->count_all_results();

        return $count;
    }
    
    public function countMedia($status) {
        $this->db->select('id');
        $this->db->from($this->table['media']);
        $this->db->where('status', $status);
        $this->db->where('id_channel !=', 0);

        $count = $this->db->count_all_results();

        return $count;
    }
    
    public function countRatePrint($status) {
        $this->db->select('id');
        $this->db->from($this->table['advertising_print']);
        $this->db->where('status', $status);

        $count = $this->db->count_all_results();

        return $count;
    }
    
    public function countRateDigital($status) {
        $this->db->select('id');
        $this->db->from($this->table['advertising_digital']);
        $this->db->where('status', $status);

        $count = $this->db->count_all_results();

        return $count;
    }
    
    public function countProject($status) {
        $this->db->select('id');
        $this->db->from($this->table['project']);
        $this->db->where('status', $status);
        $this->db->where('id_channel !=', 0);

        $count = $this->db->count_all_results();

        return $count;
    }
    
    public function countNewsEvent($status){
        $this->db->select('id');
        $this->db->from($this->table['news_event']);
        $this->db->where('status', $status);
        $this->db->where('id_channel !=', 0);

        $count = $this->db->count_all_results();

        return $count;
    }
    
    public function countServices($status) {
        $this->db->select('id');
        $this->db->from($this->table['services']);
        $this->db->where('status', $status);
        $this->db->where('id_channel !=', 0);

        $count = $this->db->count_all_results();

        return $count;
    }

    /**
     * Count Record table channel
     * @param type $status
     * @return type
     */
    public function countChannel($status) {
        $this->db->select('id');
        $this->db->from($this->table['channel']);
        $this->db->where('status', $status);
        $count = $this->db->count_all_results();

        return $count;
    }

    /**
     * Count Record user
     * @param type $status
     * @return type
     */
    public function countUser($status) {
        $this->db->select('id');
        $this->db->from($this->table['user']);
        $this->db->where('status', $status);
        $count = $this->db->count_all_results();

        return $count;
    }

    /**
     * Count Record event
     * @param type $status
     * @return type
     */
    public function countEvent($status) {
        $this->db->select('id');
        $this->db->from($this->table['event']);
        $this->db->where('status', $status);
        $count = $this->db->count_all_results();

        return $count;
    }

    /**
     * show all data event
     * status 1
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    public function fetchEvent($limit, $start) {
        $this->db->select('*');
        $this->db->from($this->table['event']);
        $this->db->where('status', 1);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * show all data user
     * status 1
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    public function fetchUser($limit, $start) {
        $this->db->select('*');
        $this->db->from($this->table['user']);
        $this->db->where('status', 1);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * show all data artikel
     * status 1
     * @param type $headline
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    public function fetchArticle($headline, $limit, $start) {
        $this->db->select('article.*, article_channel.title as channel');
        $this->db->from($this->table['article']);
        $this->db->join('article_channel', 'article_channel.id = article.id_channel');
        $this->db->where('article.status', 1);

        if ($headline == '2') {
            $this->db->where('article.headline', 1);
        } else if ($headline == '3') {
            $this->db->where('article.headline', 0);
        }

        $this->db->limit($limit, $start);
        $this->db->order_by('article.id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
    
    public function fetchMedia($limit, $start) {
        $this->db->select('media.*, article_channel.title as channel');
        $this->db->from($this->table['media']);
        $this->db->join('article_channel', 'article_channel.id = media.id_channel');
        $this->db->where('media.status', 1);

        $this->db->limit($limit, $start);
        $this->db->order_by('media.id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
    
    public function fetchRatePrint($limit, $start) {
        $this->db->select('advertising_print.*, article_channel.title as channel');
        $this->db->from($this->table['advertising_print']);
        $this->db->join('article_channel', 'article_channel.id = advertising_print.id_channel');
        $this->db->where('advertising_print.status', 1);

        $this->db->limit($limit, $start);
        $this->db->order_by('advertising_print.id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
    
    public function fetchRateDigital($limit, $start) {
        $this->db->select('advertising_digital.*, article_channel.title as channel');
        $this->db->from($this->table['advertising_digital']);
        $this->db->join('article_channel', 'article_channel.id = advertising_digital.id_channel');
        $this->db->where('advertising_digital.status', 1);

        $this->db->limit($limit, $start);
        $this->db->order_by('advertising_digital.id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
    
    public function fetchProject($limit, $start) {
        $this->db->select('project.*, article_channel.title as channel');
        $this->db->from($this->table['project']);
        $this->db->join('article_channel', 'article_channel.id = project.id_channel');
        $this->db->where('project.status', 1);

        $this->db->limit($limit, $start);
        $this->db->order_by('project.id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
    
    public function fetchNewsEvent($limit, $start){
        $this->db->select('news_event.*, article_channel.title as channel');
        $this->db->from($this->table['news_event']);
        $this->db->join('article_channel', 'article_channel.id = news_event.id_channel');
        $this->db->where('news_event.status', 1);

        $this->db->limit($limit, $start);
        $this->db->order_by('news_event.id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
    
    public function fetchServices($limit, $start) {
        $this->db->select('services.*, article_channel.title as channel');
        $this->db->from($this->table['services']);
        $this->db->join('article_channel', 'article_channel.id = services.id_channel');
        $this->db->where('services.status', 1);

        $this->db->limit($limit, $start);
        $this->db->order_by('services.id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
    
    public function fetchServicesTags(){
        $this->db->select('id, title');
        $this->db->from($this->table['services']);
        //$this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
    
    public function fetchProfile() {
        $this->db->select('profile.*, article_channel.title as channel');
        $this->db->from($this->table['profile']);
        $this->db->join('article_channel', 'article_channel.id = profile.id_channel');
        $this->db->where('profile.status', 1);
        $this->db->order_by('profile.id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
    
    public function fetchContact() {
        $this->db->select('contact.*, article_channel.title as channel');
        $this->db->from($this->table['contact']);
        $this->db->join('article_channel', 'article_channel.id = contact.id_channel');
        $this->db->where('contact.status', 1);
        $this->db->order_by('contact.id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * show all data artikel dengan id_channel =1 dan status=1
     * status 1
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    public function fetchPengisiAcara($limit, $start) {
        $this->db->select('*');
        $this->db->from($this->table['article']);
        $this->db->where('status', 1);
        $this->db->where('id_channel', 5);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * fetchall photo
     * @param type $limit
     * @param type $start
     * @return type array
     */
    public function fetchGalleryPhoto($limit, $start) {
        $this->db->select('*');
        $this->db->from($this->table['album']);
        $this->db->where('status', 1);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * show all data artikel channel
     * status 1
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    public function fetchArticleChannel($limit, $start) {
        $data = array();
        $this->db->select('*');
        $this->db->from($this->table['channel']);
        $this->db->where('status', 1);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    /**
     * show all data kanal
     * status 0
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    public function fetchArchiveChannel($limit, $start) {
        $data = array();
        $this->db->select('*');
        $this->db->from($this->table['channel']);
        $this->db->where('status', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    /**
     * show all data user
     * status 0
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    public function fetchArchiveUser($limit, $start) {
        $data = array();
        $this->db->select('*');
        $this->db->from($this->table['user']);
        $this->db->where('status', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    /**
     * show all data archive article
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    public function fetchArchiveArticle($limit, $start) {
        $data = array();
        $this->db->select('*');
        $this->db->from($this->table['article']);
        $this->db->where('status', 0);
        $this->db->where('id_channel !=', 5); //5=pengisi acara
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    /**
     * show all data archive gallery album
     * @return multitype:unknown |boolean
     */
    public function fetchArchiveGallery($limit, $start) {
        $data = array();
        $this->db->select('*');
        $this->db->from($this->table['album']);
        $this->db->where('status', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    /**
     * show all data archive article with channel_id = 5(Pengisi Acara)
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    public function fetchArchivePengisiAcara($limit, $start) {
        $data = array();
        $this->db->select('*');
        $this->db->from($this->table['article']);
        $this->db->where('status', 0);
        $this->db->where('id_channel', 5);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    /**
     * arsip event
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    public function fetchArchiveEvent($limit, $start) {
        $data = array();
        $this->db->select('*');
        $this->db->from($this->table['event']);
        $this->db->where('status', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    /**
     * save article
     * @param type $data
     */
    public function addArticle($data) {
        $this->db->insert($this->table['article'], $data);

        return $this->db->insert_id();
    }
    
    public function addMedia($data) {
        $this->db->insert($this->table['update'], $data);

        return $this->db->insert_id();
    }
    
    public function addRatePrint($data) {
        $this->db->insert($this->table['advertising_print'], $data);
        $id = $this->db->insert_id();
        
        //masuk tabel advertising_print_detail
        $position = $this->input->post('position');
        $price = $this->input->post('price');
        foreach($position as $key => $position1){
            $print_detail = array(
              'id_advertising_print' => $id,
              'created'              => time(),
              'position'             => $position1,
              'price'                => $price[$key],
              'status'               => 1
            );
            $this->db->insert($this->table['advertising_print_detail'], $print_detail);
        }
    }
    
    public function addRateDigital($data) {
        $this->db->insert($this->table['advertising_digital'], $data);
        $id = $this->db->insert_id();

        //masuk tabel advertising_digital_detail
        $position = $this->input->post('position');
        $time_daily = $this->input->post('time_daily');
        $time_weekly = $this->input->post('time_weekly');
        $time_monthly = $this->input->post('time_monthly');
        foreach($position as $key => $position1){
            $digital_detail = array(
                'id_advertising_digital' => $id,
                'created'              => time(),
                'position'             => $position1,
                'time_daily'           => $time_daily[$key],
                'time_weekly'          => $time_weekly[$key],
                'time_monthly'         => $time_monthly[$key],
                'status'               => 1
            );
            $this->db->insert($this->table['advertising_digital_detail'], $digital_detail);
        }
    }
    
    public function addProject($data) {
        $this->db->insert($this->table['project'], $data);

        return $this->db->insert_id();
    }
    
    public function addNewsEvent($data) {
        $this->db->insert($this->table['news_event'], $data);

        return $this->db->insert_id();
    }
    
    public function addServices($data) {
        $this->db->insert($this->table['services'], $data);

        return $this->db->insert_id();
    }

    /**
     * save Gallery Article
     * @param type $data
     */
    public function addGalleryProject($format_upload, $id_project) {
        if (count($format_upload) > 0 && $format_upload != "") {
            // table gallery
            $title_photo = $this->input->post('title_photo');
            $desc_photo  = $this->input->post('desc_photo');
            $filename    = $format_upload;

            foreach ($title_photo as $key => $title) {
                $photo = array(
                    'title'        => $title,
                    'body'         => $desc_photo[$key],
                    'filename'     => $filename[$key], //from method upload
                    'id_project'   => $id_project,
                    'created_date' => time(),
                    'status'       => 1,
                );
                $this->db->insert($this->table['project_gallery'], $photo);
            }
            //return true;
        }
    }
    
    public function addGalleryNewsEvent($format_upload, $id_news) {
        if (count($format_upload) > 0 && $format_upload != "") {
            // table gallery
            $title_photo = $this->input->post('title_photo');
            $desc_photo  = $this->input->post('desc_photo');
            $filename    = $format_upload;

            foreach ($title_photo as $key => $title) {
                $photo = array(
                    'title'        => $title,
                    'body'         => $desc_photo[$key],
                    'filename'     => $filename[$key], //from method upload
                    'id_news'   => $id_news,
                    'created_date' => time(),
                    'status'       => 1,
                );
                $this->db->insert($this->table['news_event_gallery'], $photo);
            }
            //return true;
        }
    }

    /**
     * save event
     * @param type $data
     */
    public function addEvent($data) {
        $this->db->insert($this->table['event'], $data);
    }

    /**
     * save pengisi acara
     * @param type $data
     */
    public function addPengisiAcara($data) {
        $this->db->insert($this->table['article'], $data);
    }

    /**
     * save Gallery photo
     * @param type $data
     */
    public function addGallery($format_upload) {
        // table photo_album
        $album = array(
            'title'             => $this->input->post('title'),
            'body'              => $this->input->post('body'),
            'meta_keywords	' => $this->input->post('meta_keywords'),
            'meta_description'  => $this->input->post('meta_description'),
            'created_date'      => time(),
            'status'            => 1,
        );
        $this->db->insert($this->table['album'], $album);
        $id = $this->db->insert_id();

        // table photo
        $title_photo = $this->input->post('title_photo');
        $desc_photo  = $this->input->post('desc_photo');
        $filename    = $format_upload;

        foreach ($title_photo as $key => $title) {
            $photo = array(
                'title'        => $title,
                'body'         => $desc_photo[$key],
                'filename'     => $filename[$key], //from method upload
                'id_album'     => $id,
                'created_date' => time(),
                'status'       => 1,
            );
            $this->db->insert($this->table['gallery'], $photo);
        }
        //return true;
    }

    /**
     * update Gallery photo
     * @param type $data
     */
    public function updateGallery($format_upload) {
        // table photo_album
        $data_album = array(
            'title'            => $this->input->post('title'),
            'body'             => $this->input->post('body'),
            'meta_keywords'    => $this->input->post('meta_keywords'),
            'meta_description' => $this->input->post('meta_description')
        );
        $id_album   = $this->input->post('id_album');
        $this->db->where('id', $id_album);
        $this->db->update($this->table['album'], $data_album);

        if (count($format_upload) > 0 && $format_upload != "") {
            // table photo
            $title_photo = $this->input->post('title_photo');
            $desc_photo  = $this->input->post('desc_photo');
            $filename    = $format_upload;
            $id_photo    = $this->input->post('id_album');

            foreach ($title_photo as $key => $title) {
                $photo = array(
                    'title'        => $title,
                    'body'         => $desc_photo[$key],
                    'filename'     => $filename[$key], //from method upload
                    'id_album'     => $id_photo,
                    'created_date' => time(),
                    'status'       => 1,
                );
                $this->db->insert($this->table['gallery'], $photo);
            }
        }
    }

    /**
     * Update article
     * @param type $data
     * @param type $id
     */
    public function updateArticle($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['article'], $data);
    }
    
    public function updateMedia($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['media'], $data);
    }
    
    public function updateRatePrint($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['advertising_print'], $data);
        
        //update tabel advertising_print_detail
        $id_detail = $this->input->post('id_detail');
        //var_dump($id_detail);exit;
        $position = $this->input->post('position');
        $price = $this->input->post('price');
        foreach($position as $key => $position1){
            //cek kalo ada id di update, kalo ga ada insert
            $this->db->select('*');
            $this->db->from($this->table['advertising_print_detail']);
            $this->db->where('id', $id_detail[$key]);
            $query = $this->db->get();
            
            if ($query->num_rows() == 0) {
                $print_detail = array(
                    'id_advertising_print' => $id,
                    'created'              => time(),
                    'position'             => $position1,
                    'price'                => $price[$key],
                    'status'               => 1
                  );
                $this->db->insert($this->table['advertising_print_detail'], $print_detail);
            } else {
                $print_detail = array(
                    'id_advertising_print' => $id,
                    'created'              => time(),
                    'position'             => $position1,
                    'price'                => $price[$key],
                    'status'               => 1
                  );
                  $this->db->where('id', $id_detail[$key]);
                  $this->db->update($this->table['advertising_print_detail'], $print_detail);
            }
        }
    }
    
    public function updateRateDigital($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['advertising_digital'], $data);
        
        //update tabel advetising_digital_detail
        $id_detail = $this->input->post('id_detail');
        $position = $this->input->post('position');
        $time_daily = $this->input->post('time_daily');
        $time_weekly = $this->input->post('time_weekly');
        $time_monthly = $this->input->post('time_monthly');
        foreach($position as $key => $position1){
            $this->db->select('*');
            $this->db->from($this->table['advertising_digital_detail']);
            $this->db->where('id', $id_detail[$key]);
            $query = $this->db->get();
            
            if ($query->num_rows() == 0) {
                $print_detail = array(
                    'id_advertising_digital' => $id,
                    'created'              => time(),
                    'position'             => $position1,
                    'time_daily'           => $time_daily[$key],
                    'time_weekly'          => $time_weekly[$key],
                    'time_monthly'         => $time_monthly[$key],
                    'status'               => 1
                  );
                $this->db->insert($this->table['advertising_digital_detail'], $print_detail);
            } else {
                $print_detail = array(
                    'id_advertising_digital' => $id,
                    'created'              => time(),
                    'position'             => $position1,
                    'time_daily'           => $time_daily[$key],
                    'time_weekly'          => $time_weekly[$key],
                    'time_monthly'         => $time_monthly[$key],
                    'status'               => 1
                  );
                  $this->db->where('id', $id_detail[$key]);
                  $this->db->update($this->table['advertising_digital_detail'], $print_detail);
            }
        }
    }
    
    public function updateProject($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['project'], $data);
    }
    
    public function updateNewsEvent($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['news_event'], $data);
    }
    
    public function updateServices($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['services'], $data);
    }
    
    public function updateProfile($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['profile'], $data);
    }
    
    public function updateContact($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['contact'], $data);
    }

    /**
     * Update photo
     * @param unknown_type $data
     * @param unknown_type $id
     */
    public function updatePhoto($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['project_gallery'], $data);
    }
    
    public function updatePhotoNewsEvent($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['news_event_gallery'], $data);
    }

    /**
     * Update gallery photo
     * @param type $data
     * @param type $id
     */
    public function updateGalleryPhoto($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['album'], $data);
    }

    /**
     * Update pengisi acara
     * @param type $data
     * @param type $id
     */
    public function updatePengisiAcara($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['article'], $data);
    }

    /**
     * Update article
     * @param type $data
     * @param type $id
     */
    public function updateEvent($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['event'], $data);
    }

    /**
     * Update kanal
     * @param type $data
     * @param type $id
     */
    public function updateChannel($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['channel'], $data);
    }

    /**
     * Update user
     * @param type $data
     * @param type $id
     */
    public function updateUser($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['user'], $data);
    }

    /**
     * Check password
     * @param type $password
     * @return boolean
     */
    public function checkPassword($password) {
        $id = $this->session->userdata('user_id');
        $q  = $this->db->get_where($this->table['user'], array('id' => $id, 'password' => sha1(md5($password))));
        if ($q->num_rows == 1) {
            return true;
        }

        return false;
    }

    /**
     * delete article. change status 1 to 0
     * @param type $data
     * @param type $id
     */
    public function deleteArticle($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['article'], $data);
    }
    
    public function deleteRatePrintDetail($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['advertising_print_detail'], $data);
    }
    
    public function deleteRateDigitalDetail($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['advertising_digital_detail'], $data);
    }
    
    public function deleteMedia($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['media'], $data);
    }
    
    public function deleteProject($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['project'], $data);
    }
    
    public function deleteNewsEvent($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['news_event'], $data);
    }
    
    public function deleteServices($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['services'], $data);
    }

    /**
     * delete pengisi acara from table article & channel=5. change status 1 to 0
     * @param type $data
     * @param type $id
     */
    public function deletePengisiAcara($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['article'], $data);
    }

    /**
     * delete album. change status 1 to 0
     * @param type $data
     * @param type $id
     */
    public function deleteGalleryAlbum($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['album'], $data);
    }

    /**
     * delete photo. change status 1 to 0
     * @param type $data
     * @param type $id
     */
    public function deleteGalleryPhoto($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['gallery'], $data);
    }

    /**
     * change status 1 to 0
     * @param type $data
     * @param type $id
     * @return boolean
     */
    public function deleteChannel($data, $id) {
        //cek article
        $article = $this->db->get_where($this->table['article'], array('id_channel' => $id));
        if ($article->num_rows() > 0)
            return false;

        $this->db->where('id', $id);
        $this->db->update($this->table['channel'], $data);

        return true;
    }

    /**
     * change status 1 to 0
     * @param type $data
     * @param type $id
     */
    public function deleteUser($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['user'], $data);
    }

    /**
     * change status 1 to 0
     * @param type $data
     * @param type $id
     */
    public function deleteEvent($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['event'], $data);
    }

    /**
     * Active Article. change status 0 to 1
     * @param type $data
     * @param type $id
     */
    public function activeArticle($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['article'], $data);
    }

    /**
     * Active Event. change status 0 to 1
     * @param type $data
     * @param type $id
     */
    public function activeEvent($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['event'], $data);
    }

    /**
     * Active gallery album. change status 0 to 1
     * @param type $data
     * @param type $id
     */
    public function activeGalleryAlbum($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['album'], $data);
    }

    /**
     * Active gallery photo. change status 0 to 1
     * @param type $data
     * @param type $id
     */
    public function activeGalleryPhoto($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['gallery'], $data);
    }

    /**
     * save channel
     * @param type $data
     */
    public function addChannel($data) {
        $this->db->insert($this->table['channel'], $data);
    }

    /**
     * save user
     * @param type $data
     */
    public function addUser($data) {
        $this->db->insert($this->table['user'], $data);
    }

    /**
     * Get row id article
     * @param type $id
     * @return type array
     */
    public function getIdArticle($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['article']);

        return $query->row();
    }
    
    public function getIdMedia($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['media']);

        return $query->row();
    }
    
    public function getIdRatePrint($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['advertising_print']);

        return $query->row();
    }
    
    public function getIdRatePrintDetail($id){
        $this->db->where('id_advertising_print', $id);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table['advertising_print_detail']);

        return $query->result();
    }
    
    public function getIdRateDigital($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['advertising_digital']);

        return $query->row();
    }
    
    public function getIdRateDigitalDetail($id){
        $this->db->where('id_advertising_digital', $id);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table['advertising_digital_detail']);

        return $query->result();
    }
    
    public function getIdProject($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['project']);

        return $query->row();
    }
    
    public function getIdNewsEvent($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['news_event']);

        return $query->row();
    }
    
    public function getIdServices($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['services']);

        return $query->row();
    }
    
    public function getIdProfile($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['profile']);

        return $query->row();
    }
    
    public function getIdContact($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['contact']);

        return $query->row();
    }

    /**
     * Get row id
     * @param type $id
     * @return type array
     */
    public function getIdGalleryAlbum($id) {
        $this->db->select('*');
        $this->db->from($this->table['album']);
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }


    /**
     * Get row id
     * @param type $id
     * @return type array
     */
    public function getIdGalleryPhoto($id) {
        $this->db->select('*');
        $this->db->from($this->table['gallery']);
        $this->db->where('id_album', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * Get row id
     * @param type $id
     * @return type array
     */
    public function getIdGalleryProject($id) {
        $this->db->select('*');
        $this->db->from($this->table['project_gallery']);
        $this->db->where('id_project', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }
    
    public function getIdGalleryNewsEvent($id) {
        $this->db->select('*');
        $this->db->from($this->table['news_event_gallery']);
        $this->db->where('id_news', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * Get row id
     * @param type $id
     * @return type array
     */
    public function getIdPhoto($id) {
        $this->db->select('*');
        $this->db->from($this->table['project_gallery']);
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }
    
    public function getIdPhotoNewsEvent($id) {
        $this->db->select('*');
        $this->db->from($this->table['news_event_gallery']);
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * Get row id article_channel
     * @param type $id
     * @return type array
     */
    public function getIdChannel($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['channel']);

        return $query->row();
    }

    /**
     * Get row id user
     * @param type $id
     * @return type array
     */
    public function getIdUser($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['user']);

        return $query->row();
    }

    /**
     * Get row id
     * @param type $id
     * @return type array
     */
    public function getIdEvent($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['event']);

        return $query->row();
    }

    public function allChannel() {
        $this->db->select('*');
        $this->db->from($this->table['channel']);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function channelByTitle() {
        $this->db->select('id, title');
        $this->db->from($this->table['channel']);
        $query = $this->db->get();

        return $query->result();
    }

    public function parentChannel() {
        $this->db->select('id, title');
        $this->db->from($this->table['channel']);
        $this->db->where('parent_id', 0);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function childChannel($id) {
        $this->db->select('id, title');
        $this->db->from($this->table['channel']);
        $this->db->where('parent_id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * Active channel. change status 0 to 1
     * @param type $data
     * @param type $id
     */
    public function activeChannel($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['channel'], $data);
    }

    /**
     * Active user. change status 0 to 1
     * @param type $data
     * @param type $id
     */
    public function activeUser($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['user'], $data);
    }

    public function deletephoto($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table['project_gallery'], $data);
    }
    
    public function deletephotonewsevent($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table['news_event_gallery'], $data);
    }

    /**
     * search news
     * @param type $term
     * @return type array
     */
    public function search_article($term) {
        $data = array();
        $this->db->select('id, title, filename, created_date, modified_date, status,');
        $this->db->from($this->table['article']);
        $this->db->where('status', 1);
        $this->db->where('id_channel !=', 5);
        $this->db->like('title', $term);
        $this->db->or_like('filename', $term);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        $query->free_result();

        return $data;
    }
    
    public function search_media($term) {
        $data = array();
        $this->db->select('id, title, filename, created_date, modified_date, status,');
        $this->db->from($this->table['media']);
        $this->db->where('status', 1);
        $this->db->where('id_channel !=', 5);
        $this->db->like('title', $term);
        $this->db->or_like('filename', $term);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        $query->free_result();

        return $data;
    }
    
    public function search_rateprint($term) {
        $data = array();
        $this->db->select('id, title, filename, created_date, modified_date, status,');
        $this->db->from($this->table['advertising_print']);
        $this->db->where('status', 1);
        $this->db->like('title', $term);
        $this->db->or_like('filename', $term);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        $query->free_result();

        return $data;
    }
    
    public function search_ratedigital($term) {
        $data = array();
        $this->db->select('id, title, filename, created_date, modified_date, status,');
        $this->db->from($this->table['advertising_digital']);
        $this->db->where('status', 1);
        $this->db->like('title', $term);
        $this->db->or_like('filename', $term);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        $query->free_result();

        return $data;
    }
    
    public function search_project($term) {
        $data = array();
        $this->db->select('id, title, filename, created_date, modified_date, status,');
        $this->db->from($this->table['project']);
        $this->db->where('status', 1);
        $this->db->where('id_channel !=', 5);
        $this->db->like('title', $term);
        $this->db->or_like('filename', $term);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        $query->free_result();

        return $data;
    }
    
    public function search_news_event($term){
        $data = array();
        $this->db->select('id, title, filename, created_date, modified_date, status,');
        $this->db->from($this->table['news_event']);
        $this->db->where('status', 1);
        $this->db->where('id_channel !=', 5);
        $this->db->like('title', $term);
        $this->db->or_like('filename', $term);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        $query->free_result();

        return $data;
    }
    
    public function search_services($term) {
        $data = array();
        $this->db->select('id, title, filename, created_date, modified_date, status,');
        $this->db->from($this->table['services']);
        $this->db->where('status', 1);
        $this->db->where('id_channel !=', 5);
        $this->db->like('title', $term);
        $this->db->or_like('filename', $term);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        $query->free_result();

        return $data;
    }

    /**
     * search pengisi acara from article. id_channel=5
     * @param type $term
     * @return type array
     */
    public function search_pa($term) {
        $data = array();
        $this->db->select('id, title, filename, created_date, modified_date, status,');
        $this->db->from($this->table['article']);
        $this->db->where('status', 1);
        $this->db->where('id_channel', 5);
        $this->db->like('title', $term);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        $query->free_result();

        return $data;
    }

    /**
     * search pengisi acara from article. id_channel=5
     * @param type $term
     * @return type array
     */
    public function search_event($term) {
        $data = array();
        $this->db->select('id, name, detail, created_date, modified_date, modified_by, status');
        $this->db->from($this->table['event']);
        $this->db->where('status', 1);
        $this->db->like('name', $term);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        $query->free_result();

        return $data;
    }

    /**
     * search album
     * @param type $term
     * @return type array
     */
    public function search_album($term) {
        $data = array();
        $this->db->select('id, title, body, meta_keywords, meta_description, created_date, status');
        $this->db->from($this->table['album']);
        $this->db->where('status', 1);
        $this->db->like('title', $term);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        $query->free_result();

        return $data;
    }

    public function checkUsernameExist($name, $id = false) {
        $this->db->select('id');
        $this->db->from($this->table['user']);
        $this->db->where('name', $name);
        $this->db->where('status', 1);

        if ($id)
            $this->db->where('id !=', $id);

        return $this->db->get();
    }

    public function checkEmailExist($email, $id = false) {
        $this->db->select('id');
        $this->db->from($this->table['user']);
        $this->db->where('email', $email);
        $this->db->where('status', 1);

        if ($id)
            $this->db->where('id !=', $id);

        return $this->db->get();
    }
}