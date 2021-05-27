<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bagian extends CI_Controller {

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

		$this->load->model('m_bagian');
	}
	
	public function index(){
		$data['bagian'] = $this->m_bagian->get_all();
		$this->template->load('template','bagian/v_bagian_list', $data);
	}

	public function create()
	{
		$data = array(
				'title' => 'Tambah bagian',
				'action' => site_url('bagian/create_action'),
				'id_bagian' => '',
				'nama_bagian' => ''
		);
		 $this->template->load('template','bagian/v_bagian_form',$data);
	}

	public function create_action()
	{
		$data = array(
				'nama_bagian' => $this->input->post('f_nama_bagian',TRUE)
		);
		
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries

		$this->m_bagian->insert($data);
		$error = $this->db->error();

		if ($error['code'] == 0) {
			$this->session->set_flashdata('message', 'save-success');
			redirect(site_url('bagian'));
		}
		elseif ($error['code'] == 1062) {
				$this->session->set_flashdata('message', 'save-failed');
				redirect($_SERVER['HTTP_REFERER']);
		}
		else {
				$this->session->set_flashdata('message', 'save-failed');
				redirect($_SERVER['HTTP_REFERER']);
		}
		$this->db->db_debug = $db_debug; //set it back
	}

	public function update($id)
    {
        $row = $this->m_bagian->get_by_id($id);
	
        if ($row) {
			$data = array(
				'title' => 'Edit bagian',
				'action' => site_url('bagian/update_action'),
				'id_bagian' => $row->id_bagian,
				'nama_bagian' => $row->nama_bagian
			);
            $this->template->load('template','bagian/v_bagian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('bagian'));
        }
    }

    public function update_action()
    {
		$id_bagian = $this->input->post('f_id_bagian',TRUE);

		$data = array(
			'nama_bagian' => $this->input->post('f_nama_bagian',TRUE),
		);
		
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries

		$this->m_bagian->update($id_bagian, $data);
		$error = $this->db->error();

		if ($error['code'] == 0) {
			$this->session->set_flashdata('message', 'save-success');
			redirect(site_url('bagian'));
		}
		elseif ($error['code'] == 1062) {
				$this->session->set_flashdata('message', 'save-failed');
				redirect($_SERVER['HTTP_REFERER']);
		}
		else {
				$this->session->set_flashdata('message', 'save-failed');
				redirect($_SERVER['HTTP_REFERER']);
		}
		$this->db->db_debug = $db_debug; //set it back
    }

    public function delete($id)
    {
        $row = $this->m_bagian->get_by_id($id);

        if ($row) {
            $this->m_bagian->delete($id);
            $this->session->set_flashdata('message', 'save-success');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
			$this->session->set_flashdata('message', 'not-found');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}
}
?>