<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$this->load->model('User_model', 'user');

		$data['user'] = $this->user->getUserById();

		$this->load->view('template/header', $data);
		$this->load->view('profil/index', $data);
		$this->load->view('template/footer');
	}

	public function edit()
	{
		$data['user'] = $this->db->get_where('msuser', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('profil/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			//Cek gambar yang ingin diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['upload_path']          = './assets/img/profile/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']        = '2048';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					//hapus foto lama
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . './assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}


			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('msuser');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Edit success!</div>');
			redirect('Profil');
		}
	}
}
