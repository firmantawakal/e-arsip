<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuratMasuk extends CI_Controller {

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

		$this->load->model('m_suratMasuk');
		$this->load->model('m_bagian');
		$this->load->model('m_jenis');
	}
	
	public function index(){
		$level = $this->session->userdata('level');
		if ( $level == 'admin' || $level == 'kapolsek') {
			$data['suratMasuk'] = $this->m_suratMasuk->get_all();
		}else{
			$bagian = $this->session->userdata('id_bagian');
			$data['suratMasuk'] = $this->m_suratMasuk->get_all_bagian($bagian);
		}
		$data['bagian'] = $this->m_bagian->get_all();
		$this->template->load('template','suratMasuk/v_suratMasuk_list', $data);
	}

	public function create()
	{
		
		$data = array(
				'title' => 'Tambah Surat Masuk',
				'action' => site_url('suratmasuk/create_action'),
				'id_suratmasuk' => '',
				'tgl_suratmasuk' => '',
				'no_suratmasuk' => '',
				'instansi_pengirim' => '',
				'nama_pengirim' => '',
				'isi_singkat' => '',
				'id_jenis' => '',
				'file' => ''
		);
		
		$data['bagian'] = $this->m_bagian->get_all();
		$data['jenis'] = $this->m_jenis->get_all();

		 $this->template->load('template','suratMasuk/v_suratMasuk_form',$data);
	}

	public function create_action()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|pdf|jpeg';
		$config['max_size']             = 10000;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('f_scanFile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', 'upload-error');

			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			// $data['nama_berkas'] = $this->upload->data("file_name");
			// $data['keterangan_berkas'] = $this->input->post('keterangan_berkas');
			// $data['tipe_berkas'] = $this->upload->data('file_ext');
			// $data['ukuran_berkas'] = $this->upload->data('file_size');

			$tgl = $this->string_->date_to_db($this->input->post('f_tgl_suratmasuk',TRUE));

			$data = array(
				'tgl_disuratmasuk' 	 => $tgl,
				'tgl_suratmasuk' 	 => date('Y-m-d'),
				'no_suratmasuk'  	 => $this->input->post('f_no_suratmasuk',TRUE),
				'instansi_pengirim'	 => $this->input->post('f_instansi_pengirim',TRUE),
				'isi_singkat' 		 => $this->input->post('f_isi_singkat',TRUE),
				'id_jenis' 			 => $this->input->post('f_jenis',TRUE),
				'file_suratmasuk' 	 => $this->upload->data("file_name")
			);

			$db_debug = $this->db->db_debug; //save setting
			$this->db->db_debug = FALSE; //disable debugging for queries

			$this->m_suratMasuk->insert($data);
			$error = $this->db->error();

			if ($error['code'] == 0) {
				$this->session->set_flashdata('message', 'save-success');
				redirect(site_url('suratmasuk'));
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
	}

	public function disposisi_action()
	{
		$data = array(
			'tgl_disposisi' => date('Y-m-d'),
			'id_suratmasuk' => $this->input->post('f_id_suratmasuk',TRUE),
			'id_bagian'     => $this->input->post('f_bagian',TRUE),
			'perintah'      => $this->input->post('f_perintah',TRUE)
		);

		$data_update = array(
			'status_disposisi' => 1
		);

		// print_r($data);die;

		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries

		$this->m_suratMasuk->insert_disposisi($data);
		$this->m_suratMasuk->update_disposisi($this->input->post('f_id_suratmasuk',TRUE), $data_update);
		
		$error = $this->db->error();

		if ($error['code'] == 0) {
			$this->session->set_flashdata('message', 'save-success');
			redirect(site_url('suratmasuk'));
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

	public function tindaklanjut($id)
    {
        $row = $this->m_suratMasuk->get_disposisi_id($id);
	
        if ($row) {
			$data = array(
				'tindakan' => 1
			);
			
			$db_debug = $this->db->db_debug; //save setting
			$this->db->db_debug = FALSE; //disable debugging for queries

			$this->m_suratMasuk->update_disposisi($id, $data);
			$error = $this->db->error();

			if ($error['code'] == 0) {
				$this->session->set_flashdata('message', 'success-tindaklanjut');
				redirect(site_url('suratmasuk'));
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
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('suratmasuk'));
        }
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
        $row = $this->m_suratMasuk->get_by_id($id);

        if ($row) {
			$path = './uploads/'.$row->file;
			unlink($path);
            $this->m_suratMasuk->delete($id);
            $this->session->set_flashdata('message', 'save-success');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
			$this->session->set_flashdata('message', 'not-found');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}
}
?>