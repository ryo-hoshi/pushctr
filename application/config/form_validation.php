<?php

$config = array(
  'login' => array(  // Login用
        array(
            'field' => 'user_id',
            'label' => 'ユーザID',
            'rules' => 'required|alpha_numeric',
        ),
         array(
            'field' => 'password',
            'label' => 'パスワード',
            'rules' => 'required|alpha_numeric|callback__check_user_info',
        ),
      ),
  'push' => array(  // PUSH通知用
        array(
            'field' => 'title',
            'label' => 'タイトル',
            'rules' => 'required|max_length[30]',
        ),
        array(
            'field' => 'text',
            'label' => '本文',
            'rules' => 'required|max_length[200]',
        ),
        array(
            'field' => 'send_time',
            'label' => '送信日時',
            'rules' => 'callback__check_send_time',
        ),
        array(
            'field' => 'send_target',
            'label' => '送信対象',
            'rules' => 'required|max_length[100]',
        ),
        array(
            'field' => 'note',
            'label' => '備考',
            'rules' => 'max_length[200]',
        ),
      ),
);
