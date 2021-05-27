<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tiket extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('status')<>'login') {
			$this->session->set_flashdata('message', '
			<div class="alert alert-danger" id="success-alert">
				<p>Silahkan Login terlebih dahulu</p>
			</div>');
				 redirect(site_url('login'));
			 }
		$this->load->model('m_tiket');
		$this->load->model('m_kategori');
	}
	
	public function index(){
		$id_comp = $this->session->userdata('id_company');
		$data['tiket'] = $this->m_tiket->get_all($id_comp);
		$this->template->load('template','tiket/v_tiket_list', $data);
	}

	public function create()
	{
		$id_comp = $this->session->userdata('id_company');
		$kat = $this->m_kategori->get_all($id_comp);
		$data = array(
				'title' => 'Tambah Tiket',
				'action' => site_url('tiket/create_action'),
				'nama_tiket' => '',
				'harga_tiket' => '',
				'jenis' => '',
				'kategori' => $kat,
				'id_tiket' => ''
		);
		 $this->template->load('template','tiket/v_tiket_form',$data);
	}

	public function create_action()
	{

		$data = array(
				'nama_tiket' => $this->input->post('f_nama_tiket',TRUE),
				'harga_tiket' => $this->input->post('f_harga_tiket',TRUE),
				'jenis' => $this->input->post('f_jenis',TRUE),
				'id_kategori' => $this->input->post('f_kategori',TRUE),
				'id_company' => $this->session->userdata('id_company')
		);
		
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries

		$this->m_tiket->insert($data);
		$error = $this->db->error();

		
		if ($error['code'] == 0) {
			$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissable" id="success-alert">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><strong>Sukses</strong></h4>
					<p>Data berhasil ditambah!</p>
			</div>');
			$this->session->set_flashdata('alert', "add-success");
			redirect(site_url('tiket'));
		}
		elseif ($error['code'] == 1062) {
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissable" id="success-alert">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><strong>Error</strong></h4>
						<p>Data Gagal Disimpan. ID sudah ada!</p>
				</div>');
				redirect($_SERVER['HTTP_REFERER']);
		}
		else {
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissable" id="success-alert">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><strong>Error</strong></h4>
						<p>Data Gagal Disimpan. '.$error['message'].'</p>
				</div>');
				redirect($_SERVER['HTTP_REFERER']);
		}
		$this->db->db_debug = $db_debug; //set it back
	}

	public function update($id)
    {
		$id_comp = $this->session->userdata('id_company');
		$kat = $this->m_kategori->get_all($id_comp);
        $row = $this->m_tiket->get_by_id($id);
	
        if ($row) {
			$data = array(
				'title' => 'Edit tiket',
				'action' => site_url('tiket/update_action'),
				'id_tiket' => $row->id_tiket,
				'nama_tiket' => $row->nama_tiket,
				'jenis' => $row->jenis,
				'kategori' => $kat,
				'id_kategori' => $row->id_kategori,
				'harga_tiket' => $row->harga_tiket
			);
            $this->template->load('template','tiket/v_tiket_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('tiket'));
        }
    }

    public function update_action()
    {
		$id_tiket = $this->input->post('f_id_tiket',TRUE);

		$data = array(
				'nama_tiket' => $this->input->post('f_nama_tiket',TRUE),
				'harga_tiket' => $this->input->post('f_harga_tiket',TRUE),
				'jenis' => $this->input->post('f_jenis',TRUE),
				'id_kategori' => $this->input->post('f_kategori',TRUE),
				'id_company' => $this->session->userdata('id_company')
		);
		
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries

		$this->m_tiket->update($id_tiket, $data);
		$error = $this->db->error();

		if ($error['code'] == 0) {
			$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissable" id="success-alert">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><strong>Sukses</strong></h4>
					Data Berhasil Diubah!
			</div>');
			redirect(site_url('tiket'));
		}
		elseif ($error['code'] == 1062) {
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissable" id="success-alert">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><strong>Error</strong></h4>
						<p>Data Gagal Disimpan. tiketname sudah ada!</p>
				</div>');
				redirect($_SERVER['HTTP_REFERER']);
		}
		else {
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissable" id="success-alert">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><strong>Error</strong></h4>
						<p>Data Gagal Disimpan. '.$error['message'].'</p>
				</div>');
				redirect($_SERVER['HTTP_REFERER']);
		}
		$this->db->db_debug = $db_debug; //set it back
    }

    public function delete($id)
    {
        $row = $this->m_tiket->get_by_id($id);

        if ($row) {
            $this->m_tiket->delete($id);
            $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>    <i class="icon fa fa-check"></i> Sukses!</h4>Data Berhasil Dihapus
                </div>');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
			$this->session->set_flashdata('message', 'Record Not Found');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
?>