<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        
        if (!$this->ion_auth->logged_in()) redirect('auth/login');
    }
}