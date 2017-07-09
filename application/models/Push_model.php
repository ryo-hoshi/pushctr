<?php
class Push_model extends CI_Model {
        
        // Firebaseから割り当てられたAPI KEY
        private $api_key  = "AAAA-WoT9-M:APA91bFNNvHrIO5mZ8tlXBGI46OTk972S-iefpt479Ev8EM2-GCBThQTJk1NcQ3qFO2U9HZ4jGyC0Zq8KkSTUxegyIsOPo6iwdPlNheL4_2tlLzqlmGR90uqy7xS4mZxnv-hjXyUvphZ";
        private $base_url = "https://fcm.googleapis.com/fcm/send";
        
        
    public function __construct()
    {
            parent::__construct();
            $this->load->database();
            $this->load->model('log_model');
    }

    public function firebase_push() {
        
         //log_message('info', 'firebase_push start');
        $this->log_model->log_message(log_model::INFO, 'firebase_push start');
         
         // 入力情報を存在チェック
         if (isset($_SESSION['input_val']['title']) && isset($_SESSION['input_val']['text'])) {

            // toの指定：アプリ／トピック名端末に割り振られたトークンIDを指定する
            $data = array(
                 "to"           => "/topics/circle_news"
                //"to"           => "com.rainysky.r_m_unit.mydearladyalarm"
                ,"priority"     => "high"
                ,"notification" => array(
                                         "title" => $_SESSION['input_val']['title']//"テスト送信タイトル"
                                        ,"body"  => $_SESSION['input_val']['text']//"テスト送信本文"
                )
            );
            $header = array(
                 "Content-Type:application/json"
                ,"Authorization:key=".$this->api_key
            );
            $context = stream_context_create(array(
                "http" => array(
                     'method' => 'POST'
                    ,'header' => implode("\r\n",$header)
                    ,'content'=> json_encode($data)
                )
            ));

            try {
                // 通知送信
                file_get_contents($this->base_url, false, $context);

            } catch (Exception $e) {
                echo $e;
            }
             
         } else {
            echo 'form入力値取得失敗';
         }
        
         log_message('info', 'firebase_push end');
    }

    public function get_send_target() {
    //    $query = $this->db->get('push_hist', 10);
        // PUSH履歴を送信対象と結合して取得
        $this->db->select('send_target, send_target_name');
        $this->db->from('send_target_mst');
        $this->db->order_by("id", "asc"); 
        
        $query = $this->db->get();
        
        return $query->result();
    }

    public function get_push_history()
    {
    //    $query = $this->db->get('push_hist', 10);
        // PUSH履歴を送信対象と結合して取得
        $this->db->select('title, text, send_time, send_target_name, note');
        $this->db->from('push_hist');
        $this->db->join('send_target_mst', 'send_target_mst.send_target  = push_hist.send_target ');
        $this->db->order_by("push_hist.id", "asc"); 

        
        $query = $this->db->get();
        
        return $query->result();
    }

    
    public function insert_push_history()
    {
        // PUSH通知履歴をINSERT
        $data = array(
            'title' => $_SESSION['input_val']['title'],
            'text' => $_SESSION['input_val']['text'],
            'send_time' => $_SESSION['input_val']['send_time_type'] == 'time' ? $_SESSION['input_val']['send_time'] : date('Y-m-d H:i:s', time()),
            'send_target' => $_SESSION['input_val']['send_target'],
            'note' => $_SESSION['input_val']['note']
         );

        // print_r($data);
        
        try {
             $this->db->insert('push_hist', $data);

        } catch (Exception $e) {
            echo $e;
        }
  
    }
    
//    public function insert_entry()
//    {
//            $this->id    = $this->input->post('id');
//            $this->label  = $this->input->post('label');
//            $this->text     = $this->input->post('text');
//            $this->push_date = $this->input->post('push_date');
//
//            $this->db->insert('push', $this);
//    }
//
//    public function update_entry()
//    {
//            $this->id    = $this->input->post('id');
//            $this->label  = $this->input->post('label');
//            $this->text     = $this->input->post('text');
//            $this->push_date = $this->input->post('push_date');
//
//            $this->db->update('push', $this, array('id' => $this->input->post('id')));
//    }

}
    