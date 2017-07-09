<?php
 class Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }
    
     public function index()
     {
//        $this->load->model('push_model');
//        $data['result'] = $this->push_model->get_last_ten_entries();
        
//        $this->load->library('Utility');
//        $val = json_safe_encode($data);
//        $data['url'] = $this->config->item('base_url');
         
        $this->load->view('view_menu');
     }
 }
