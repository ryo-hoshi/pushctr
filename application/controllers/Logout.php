<?php
class Logout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // ヘルパー呼び出し
        $this->load->helper('url');

        // ライブラリ呼び出し
        $this->load->library('session');
    }
        
     public function index()
     {
        // falseで初期化
        $_SESSION['valid_user'] = false;
    
        redirect(base_url()."login");

     }     
 }