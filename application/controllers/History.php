<?php
 class History extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
    }
    
     public function index()
     {
         // ログイン状態でない場合はログイン画面にリダイレクト
        if (empty($_SESSION['valid_user']) || $_SESSION['valid_user'] === false) {
            redirect(base_url()."login");
        }
        //$config = $this->config->item('config');
         //$this->load->model('push_model', '', $config);
        $this->load->model('push_model');
         $data['result'] = $this->push_model->get_push_history();
        
         $this->load->view('view_history', $data);
         //$this->load->view('view_menu', $data2);
     }
 }
