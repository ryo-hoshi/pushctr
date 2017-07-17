<?php
 class Menu extends CI_Controller {

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

        //$view_param = $_SESSION['valid_user']; 
 //       $this->load->view('view_menu', $view_param);
        $this->load->view('view_menu');
     }
 }
