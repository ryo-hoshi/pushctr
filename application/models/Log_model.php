<?php
class Log_model extends CI_Model {

    const ERROR = 'error';
    const DEBUG = 'debug';
    const INFO = 'info';
        
        
    public function __construct()
    {
            parent::__construct();
    }

    public function log_message($level, $message) {
        log_message($level, $message);
    }

}

    