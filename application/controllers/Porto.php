<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Porto extends CI_Controller {

    
    public function index()
    {
        $data = array(
            'title' => 'Portofolio',
            'isi' => 'v_porto',
     );
     $this->load->view('layout/v_wrapper_porto', $data, FALSE);
     
    }

  

}

/* End of file Controllername.php */
