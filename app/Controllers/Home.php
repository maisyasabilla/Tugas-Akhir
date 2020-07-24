<?php namespace App\Controllers;

class Home extends BaseController
{
    public function __construct() {
        $session = session();
    }

    public function index()
    { 
        if(isset($_SESSION['username'])){
            return redirect()->to(base_url('/perjalanan_dinas/dashboard'));
        } else{
            echo view ('login');
        }
    }

    //--------------------------------------------------------------------

}
