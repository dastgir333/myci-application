<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('users_model');
	}
    private function logged_in() {
        if(! $this->session->userdata('authenticated')) {
            redirect('users/login');
        }

    }

	    public function signup()

	{
		$data['title'] = "signup";
		$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[password]');
		$this->form_validation->set_error_delimiters('<div class="error">','</div');
		if($this->form_validation->run()== false){

			$this->load->view('header',$data);
		$this->load->view('users/signup',$data);
		$this->load->view('footer',$data);


		}
		else{

		$userdata = array(
          
         'first_name'=> $this->input->post('first_name',TRUE),
         'last_name'=> $this->input->post('last_name',TRUE),
         'email'=> $this->input->post('email',TRUE),
         'password'=> md5($this->input->post('password',TRUE)),

         'created_at'=>date('y-m-d H:i:s',time()),

		);
		$this->users_model->save($userdata);
		$this->session->set_flashdata('message','Registration successfully.');
		redirect('users/login');

		}
		
	}


public function login()

{
    if($this->session->userdata('authenticated')){
        redirect('dashboard/index');
    }

$data['title'] = "Login";

		
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');
		
		$this->form_validation->set_error_delimiters('<div class="error">','</div');
		if($this->form_validation->run()== false){

	    $this->load->view('header',$data);
		$this->load->view('users/login',$data);
		$this->load->view('footer',$data);


}
else{
	$email = $this->security->xss_clean($this->input->post('email'));
	$password = $this->security->xss_clean($this->input->post('password'));
	$user = $this->users_model->login($email,$password);
	if($user){
		$userdata = array(
			'id' => $user->id,
			'first_name' => $user->first_name,
			'last_name' => $user->last_name,
			'authenticated' => TRUE,
		);
		$this->session->set_userdata($userdata);
		redirect('dashboard/index');
	}
	else{
		$this->session->set_flashdata('message', 'invalid email or password');
		redirect('users/login');
	}
}

}
 public function logout()

 {

 	$this->session->sess_destroy();
 	redirect('users/login');
 }

 public function upload()

 {
   $this->logged_in();
$data['title'] = "File Upload";
        
        $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 500;
               
                $this->load->library('upload', $config);
                $data['error'] = "";

                if ( ! $this->upload->do_upload('userfile'))
                {      if(isset($_FILES['userfile'])){
                        $data['error'] = $this->upload->display_errors();
                          }
                        $this->load->view('header',$data);
                      $this->load->view('users/upload',$data);
                       $this->load->view('footer',$data);

                }


                else
                {       $user_id = $this->session->userdata('id');
                       $user = $this->users_model->get_user($user_id);
                       if($user->profile_photo && file_exists('uploads/'.$user->profile_photo)){
                        unlink('uploads/'.$user->profile_photo);

                       }
                        $uploaddata = $this->upload->data();
                        $filename = $uploaddata['file_name'];
                        $userdata = array(
                            'profile_photo'=>$filename

                        );
                        $this->users_model->update($user_id,$userdata);
                        $this->session->set_flashdata('message','upload successfully.');
                        redirect('dashboard/index');
                       
                }


 }
public function changePassword()
    {
        $this->logged_in();

        $data['title'] = 'Change Password';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('oldpass', 'old password', 'callback_password_check');
        $this->form_validation->set_rules('newpass', 'new password', 'required');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == false) {
            $this->load->view('header', $data);
            $this->load->view('users/change_password', $data);
            $this->load->view('footer', $data);
        }
        else {

            $id = $this->session->userdata('id');

            $newpass = $this->input->post('newpass');

            $this->users_model->update_user($id, array('password' => md5($newpass)));

            redirect('users/logout');

}

}
 public function password_check($oldpass)
    {
        $id = $this->session->userdata('id');
        $user = $this->users_model->get_user($id);

        if($user->password !== md5($oldpass)) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    }
}


