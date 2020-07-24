<?php namespace App\Controllers;

use App\Models\Page;
use CodeIgniter\Controller;
use \Mpdf\Mpdf;

class Report extends Controller
{

    public function witeForm() {

        $mpdf = new Mpdf(['mode' => 'utf-8']);
        $mpdf->WriteHTML(view('report'));
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));

    } 
}

?>