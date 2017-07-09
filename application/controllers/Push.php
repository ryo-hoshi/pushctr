<?php
class Push extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
         // ヘルパー呼び出し
         $this->load->helper('form');
         $this->load->helper('url');
        
         // ライブラリ呼び出し
         $this->load->library('form_validation');
         // ブラウザで戻った時の有効期限切れ対応
         session_cache_limiter('none');
         $this->load->library('session');

    }
        
     public function index()
     {
         // 送信対象取得
         $this->load->model('push_model');
         $result = $this->push_model->get_send_target();

         $sendTargets = array();
         foreach($result as $row) {
             $sendTargets = $sendTargets + array($row->send_target => $row->send_target_name);
         }

         // エラーメッセージ
         $this->form_validation->set_message('required', '%sが入力されていません。');
         $this->form_validation->set_message('_check_send_time', '%sが入力されていません。');
         
         // 外部ファイルで設定したバリデーションチェック
         if ($this->form_validation->run('push') == false) {
             // 初回読み込み、またはエラー時のview呼び出し
             // セッションに値があれば画面に渡す
             if (isset($_SESSION['input_val'])) {
                 $view_param = $_SESSION['input_val'];
                 $view_param['sendTargets'] = $sendTargets;
                 //print_r($view_param);
                 $this->load->view('view_push_input', $view_param);
             } else {
                 $view_param = array('sendTargets' => $sendTargets);
                 //print_r($view_param);
                 $this->load->view('view_push_input', $view_param);
             }
             
             // バリデーション通過時
         } else {
             $forms = array(
                 'title' => $this->input->post('title'),
                 'text' => $this->input->post('text'),
                 'send_time_type' => $this->input->post('send_time_type'),
                 'send_time' => $this->input->post('send_time'),
                 //'send_target_type' => $this->input->post('send_target_type'),
                 'send_target' => $this->input->post('send_target'),
                 'note' => $this->input->post('note'),
                 'sendTargets' => $sendTargets,
             );
             

             // セッションにデータを追加
             $_SESSION['input_val'] = $forms;
             
             $this->load->view('view_push_confirm', $forms);
         }
     }
     
     public function send(){
        
             $this->load->model('push_model');
             $this->push_model->firebase_push();
             
            // 通知内容をDBに保存
            $this->push_model->insert_push_history();

            // 入力情報のセッションを削除
            unset($_SESSION['input_val']);
            
            $this->load->view('view_push_comp');
     }
     
     public function _check_send_time ($send_time) {
         $sendTimeType = $this->input->post('send_time_type');
         // 時間指定タイプかつ指定が未入力の場合
         if ("time" == $sendTimeType && empty($send_time)) {
            return false;
         } else {
            return true;   
         }
     }
     
      
 }