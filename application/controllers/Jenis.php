<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis extends CI_Controller {

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

		$this->load->model('m_jenis');
	}
	
	public function index(){
		$data['jenis'] = $this->m_jenis->get_all();
		$this->template->load('template','jenis/v_jenis_list', $data);
	}

	public function create()
	{
		$data = array(
				'title' => 'Tambah Jenis',
				'action' => site_url('jenis/create_action'),
				'id_jenis' => '',
				'nama_jenis' => ''
		);
		 $this->template->load('template','jenis/v_jenis_form',$data);
	}

	public function create_action()
	{
		$data = array(
				'nama_jenis' => $this->input->post('f_nama_jenis',TRUE)
		);
		
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries

		$this->m_jenis->insert($data);
		$error = $this->db->error();

		if ($error['code'] == 0) {
			$this->session->set_flashdata('message', 'save-success');
			redirect(site_url('jenis'));
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
        $row = $this->m_jenis->get_by_id($id);
	
        if ($row) {
			$data = array(
				'title' => 'Edit Jenis',
				'action' => site_url('jenis/update_action'),
				'id_jenis' => $row->id_jenis,
				'nama_jenis' => $row->nama_jenis
			);
            $this->template->load('template','jenis/v_jenis_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('jenis'));
        }
    }

    public function update_action()
    {
		$id_jenis = $this->input->post('f_id_jenis',TRUE);

		$data = array(
			'nama_jenis' => $this->input->post('f_nama_jenis',TRUE),
		);
		
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries

		$this->m_jenis->update($id_jenis, $data);
		$error = $this->db->error();

		if ($error['code'] == 0) {
			$this->session->set_flashdata('message', 'save-success');
			redirect(site_url('jenis'));
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
        $row = $this->m_jenis->get_by_id($id);

        if ($row) {
            $this->m_jenis->delete($id);
            $this->session->set_flashdata('message', 'save-success');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
			$this->session->set_flashdata('message', 'not-found');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}
}
?>