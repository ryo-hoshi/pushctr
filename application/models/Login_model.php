<?php
class Login_model extends CI_Model {
        
        private $salt = "16e701e4193de3e2e59fd";
        
        
    public function __construct()
    {
            parent::__construct();
            $this->load->database();
            $this->load->model('log_model');
    }

    /**
     * 指定したユーザIDのパスワードを取得
     * 
     * @param $userid ユーザID
     * @return パスワード
     */
    public function get_user_pass($userid)
    {
        $this->db->select('pass');
        //$this->db->from('user');
        
        $query = $this->db->get_where('user', array('id' => $userid));
        
        return $query->result();
    }
}
    