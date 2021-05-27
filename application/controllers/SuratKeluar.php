<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuratKeluar extends CI_Controller {

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

		$this->load->model('m_suratKeluar');
		$this->load->model('m_bagian');
		$this->load->model('m_jenis');
	}
	
	public function index(){
		$level = $this->session->userdata('level');
		if ( $level == 'admin' || $level == 'kapolsek') {
			$data['suratKeluar'] = $this->m_suratKeluar->get_all();
		}else{
			$bagian = $this->session->userdata('id_bagian');
			$data['suratKeluar'] = $this->m_suratKeluar->get_all_bagian($bagian);
		}
		$this->template->load('template','suratKeluar/v_suratKeluar_list', $data);
	}

	public function create()
	{
		
		$data = array(
				'title' => 'Tambah Surat Keluar',
				'action' => site_url('suratkeluar/create_action'),
				'id_suratkeluar' => '',
				'tgl_suratkeluar' => '',
				'no_suratkeluar' => '',
				'id_bagian' => '',
				'alamat_suratkeluar' => '',
				'isi_singkat' => '',
				'id_jenis' => '',
				'file' => ''
		);
		
		$data['bagian'] = $this->m_bagian->get_all();
		$data['jenis'] = $this->m_jenis->get_all();

		 $this->template->load('template','suratKeluar/v_suratKeluar_form',$data);
	}

	public function create_action()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|pdf|jpeg';
		$config['max_size']             = 10000;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		// echo 'oke';die;
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

			$tgl = $this->string_->date_to_db($this->input->post('f_tgl_suratkeluar',TRUE));
			
			$data = array(
				'tgl_suratkeluar' 	 => $tgl,
				'no_suratkeluar'  	 => $this->input->post('f_no_suratkeluar',TRUE),
				'id_bagian' 	  	 => $this->input->post('f_bagian',TRUE),
				'alamat_suratkeluar' => $this->input->post('f_alamat_suratkeluar',TRUE),
				'isi_singkat' 		 => $this->input->post('f_isi_singkat',TRUE),
				'id_jenis' 			 => $this->input->post('f_jenis',TRUE),
				'file' 				 => $this->upload->data("file_name")
			);

			// print_r($data);die;

			$db_debug = $this->db->db_debug; //save setting
			$this->db->db_debug = FALSE; //disable debugging for queries

			$this->m_suratKeluar->insert($data);
			$error = $this->db->error();

			if ($error['code'] == 0) {
				$this->session->set_flashdata('message', 'save-success');
				redirect(site_url('suratkeluar'));
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
        $row = $this->m_suratKeluar->get_by_id($id);

        if ($row) {
			$path = './uploads/'.$row->file;
			unlink($path);
            $this->m_suratKeluar->delete($id);
            $this->session->set_flashdata('message', 'save-success');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
			$this->session->set_flashdata('message', 'not-found');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}
}
?>