
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model{

	public function save($userdata)

	{

      $this->db->insert('users', $userdata);
      return $this->db->insert_id();
	}

	public function login($email,$password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', md5( $password));
		$this->db->where('active', 1);
		$query = $this->db->get('users');
		if($query->num_rows() == 1){
			return $query->row();
		}


		return false;
	}

    public function get_user($id)

    {
        $this->db->where( 'id',$id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function update($user_id,$userdata)

    {
        $this->db->where('id',$user_id);
        $this->db->update('users',$userdata);
    }
    public function update_user($id, $userdata)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $userdata);
    }
}