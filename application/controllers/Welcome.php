<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// if ($this->session->userdata('status')<>'login') {
		// 	$this->session->set_flashdata('message', '
		// 	<div class="alert alert-danger" id="success-alert">
		// 		<p>Silahkan Login terlebih dahulu</p>
		// 	</div>');
		// 		 redirect(site_url('login'));
		// }

		// if ($this->session->userdata('level') != 'superadmin') {
		// 	redirect($_SERVER['HTTP_REFERER']);
		// }
	}

	public function index()
	{
		$this->load->view('index2');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>