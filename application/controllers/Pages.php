
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

public function view($page = 'home'){
if(! file_exists(APPPATH.'views/pages/'.$page.'.php')){

	show_404();
}

   $data['title']= ucfirst($page);

   $this->session->set_userdata('email','dastgir333@gmail.com');
   $this->load->view('header', $data);

  $this->load->view('pages/'.$page, $data);

  $this->load->view('footer', $data);

}


}
