<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_pemesanan');
	}
	
	public function index()
	{
		$this->load->view('login');
	}
	function login(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run()!=false){
				$where = array(
					'username' => $username,
					'password' => md5($password)
				);
		$data = $this->m_pemesanan->edit_data($where,'user');
		$d = $this->m_pemesanan->edit_data($where,'user')->row();

		$cek = $data->num_rows();
				if($cek > 0){
					$session = array(
						'id'=> $d->admin_id,
						'nama' => $d->admin_nama,
						'status' => 'login'
					);

					$this->session->set_userdata($session);
					redirect(base_url().'dashboard');
			}else{
					redirect(base_url().'welcome?pesan=gagal');
			}
			}else{
				$this->load->view('login');
			}

	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'welcome?pesan=logout');
	}	

}
