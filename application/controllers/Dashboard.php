<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->logged_in();
        $this->load->model('users_model');
    
    }

    private function logged_in() {
        if(! $this->session->userdata('authenticated')) {
            redirect('users/login');
        }
    }
    
    public function index()
    {
        $data['title'] = "Dashboard";
        
        $user_id = $this->session->userdata('id');
        $data['user'] = $this->users_model->get_user($user_id);
        
        $this->load->view('header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('footer', $data);
    }
}
?>