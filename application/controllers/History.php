<?php
 class History extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }
    
     public function index()
     {
                 
        //$config = $this->config->item('config');
         //$this->load->model('push_model', '', $config);
        $this->load->model('push_model');
         $data['result'] = $this->push_model->get_push_history();
        
         $this->load->view('view_history', $data);
         //$this->load->view('view_menu', $data2);
     }
 }
