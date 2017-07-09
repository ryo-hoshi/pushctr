<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Utility {
    
    public function json_safe_encode($data){
        return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    }
 }
