<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('status')<>'login') {
			$this->session->set_flashdata('message', '
			<div class="alert alert-danger" id="success-alert">
				<p>Silahkan Login terlebih dahulu</p>
			</div>');
				 redirect(site_url('login'));
		}

		// if ($this->session->userdata('level') != 'admin') {
		// 	redirect($_SERVER['HTTP_REFERER']);
		// }

		$this->load->model('m_user');
		$this->load->model('m_bagian');
	}
	
	public function index(){
		$data['user'] = $this->m_user->get_all();
		$this->template->load('template','user/v_user_list', $data);
	}

	public function create()
	{
		$data = array(
				'title' => 'Tambah User',
				'action' => site_url('user/create_action'),
				'username' => '',
				'username_hid' => '',
				'nama_user' => '',
				'id_bagian' => '',
				'level' => ''
		);
		$data['bagian'] = $this->m_bagian->get_all();
		$this->template->load('template','user/v_user_form',$data);
	}

	public function create_action()
	{
		$id = $this->input->post('f_username',TRUE);
		$row = $this->m_user->get_by_id($id);
        if ($row) {
			$this->session->set_flashdata('message', 'error-username');
				redirect($_SERVER['HTTP_REFERER']);
		};
			
        $password = $this->input->post('f_password');

		$data = array(
				'username' => $this->input->post('f_username',TRUE),
				'password' => md5($password),
				'nama_user' => $this->input->post('f_nama_user',TRUE),
				'id_bagian' => $this->input->post('f_bagian',TRUE),
				'level' => 'bagian'
		);
		
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries
		$this->m_user->insert($data);
		$error = $this->db->error();

		if ($error['code'] == 0) {
			$this->session->set_flashdata('message', 'save-success');
			redirect(site_url('user'));
		}
		else {
				$this->session->set_flashdata('message', 'save-failed');
				redirect($_SERVER['HTTP_REFERER']);
		}
		$this->db->db_debug = $db_debug; //set it back
	}

	public function update($id)
    {
        $row = $this->m_user->get_by_id($id);
	
        if ($row) {
			$data = array(
				'title' => 'Edit User',
				'action' => site_url('user/update_action'),
				'username_hid' => $row->username,
				'username' => $row->username,
				'nama_user' => $row->nama_user,
				'id_bagian' => $row->id_bagian
			);
			$data['bagian'] = $this->m_bagian->get_all();
			$this->template->load('template','user/v_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('user'));
        }
    }

    public function update_action()
    {
		$username = $this->input->post('f_username_hid',TRUE);
        $password = $this->input->post('f_password');

		$data = array(
			'username' => $this->input->post('f_username',TRUE),
			'password' => md5($password),
			'nama_user' => $this->input->post('f_nama_user',TRUE),
			'id_bagian' => $this->input->post('f_bagian',TRUE)
		);
		
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries

		$this->m_user->update($username, $data);
		$error = $this->db->error();

		if ($error['code'] == 0) {
			$this->session->set_flashdata('message', 'save-success');
			redirect(site_url('user'));
		}
		else {
				$this->session->set_flashdata('message', 'save-failed');
				redirect($_SERVER['HTTP_REFERER']);
		}
		$this->db->db_debug = $db_debug; //set it back
    }

    public function delete($id)
    {
        $row = $this->m_user->get_by_id($id);

        if ($row) {
            $this->m_user->delete($id);
			$this->session->set_flashdata('message', 'save-success');

            redirect($_SERVER['HTTP_REFERER']);
        } else {
			$this->session->set_flashdata('message', 'Record Not Found');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}
}
?>