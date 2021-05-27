<?php

class M_login extends CI_Model{

	function cek_login($username,$password){
    $this->db->where('username', $username);
    $this->db->where('password', $password);
		return $this->db->get('user');
  }

	function cek_username_reg($username){
    $this->db->where('username', $username);
		return $this->db->get('user');
  }

	function cek_email_reg($email){
    $this->db->where('email', $email);
		return $this->db->get('company');
  }

  function get_by_id($id)
  {
      $this->db->where('username', $id);
      return $this->db->get('user')->row();
  }

  function validate_reset_id($id)
  {
      $this->db->where('reset_id', $id);
      return $this->db->get('company');
  }

  function get_by_reset_id($id)
  {
      $this->db->where('reset_id', $id);
      $this->db->where('user.level', 'admin');
      $this->db->join('user', 'company.id_company = user.id_company');
      return $this->db->get('company')->row();
  }

	// reset data
    function reset($id, $data)
    {
        $this->db->where('email', $id);
        $this->db->update('company', $data);
    }
}

?>
