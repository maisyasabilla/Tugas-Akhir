<?php namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Config\Config;

class Pages extends Model
{

    public function data_array(){
        $this->load->helper('array');
        $title = '';
        $header   = 1;
        $content   = '';
        $subtitle   = '';
        $ha = '';

        $array = array(
            'title' => $title,
            'header' => $header,
            'content' => $content,
            'subtitle' => $subtitle,
            'ha' => $ha
        );
    }
}
