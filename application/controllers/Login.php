<?php
class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // ヘルパー呼び出し
        $this->load->helper('form');
        $this->load->helper('url');

        // ライブラリ呼び出し
        $this->load->library('form_validation');
        $this->load->library('session');
    }
        
     public function index()
     {
        // falseで初期化
        $_SESSION['valid_user'] = false;
         
        // エラーメッセージ
        $this->form_validation->set_message('required', '%sが入力されていません。');
        $this->form_validation->set_message('alpha_numeric', '%sは半角英数のみで入力してください');
        $this->form_validation->set_message('_check_user_info', 'ユーザIDと%sが一致しません。');
        
        // 外部ファイルで設定したバリデーションチェック
        if ($this->form_validation->run('login') == false) {
            // 初回読み込み、またはエラー時のview呼び出し
            $this->load->view('view_login');

            // バリデーション通過時
        } else {

            // セッションにデータを追加
            $_SESSION['valid_user'] = true;

//            $this->load->helper(array('form', 'url'));
            redirect(base_url()."menu");
            
//            redirect(base_url()."menu");
//            echo(base_url()."menu");
        }
        

     }
     
     /**
      * ユーザIDとパスワードの相関チェック
      * 
      * @param $password
      * @return boolean
      */
     public function _check_user_info ($password) {

         $userid = $this->input->post('user_id');
         
         // ユーザIDまたはパスワード未入力時は必須チェック側でエラーとする
         if (empty($userid) || empty($password)) {
             return true;
         }

         // ユーザIDをもとにパスワードを取得
         $this->load->model('login_model');
         $result = $this->login_model->get_user_pass($userid);

         $pass = null;
         foreach($result as $row) {
             $pass = $row->pass;
         }
         // パスワードを取得できない場合は即時エラー
         if ($pass === null) {
             return false;
         }

         // 入力されたパスワードをハッシュ化
         $this->load->helper('password');
         $hashed_pass = get_hashed_password($password);
         
         if ($pass === $hashed_pass) {
             return true;
         } else {
             return false;
         }
     }
 }