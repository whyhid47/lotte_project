<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
      $this->load->model('admin');
	}

	public function index()
	{
      //echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);
      if ($this->input->post('submit') == 'Submit')
      {
         $user = $this->input->post('username', TRUE);
         $pass = $this->input->post('password', TRUE);

         $cek = $this->admin->get_where('t_admin', array('username' => $user));

         if ($cek->num_rows() > 0) {
            $data = $cek->row();

            if (password_verify($pass, $data->password))
            {
               $datauser = array (
						'admin' => $data->id_admin,
                  'user' => $data->fullname,
                  'level' => $data->level,
                  'login' => TRUE
               );

               $this->session->set_userdata($datauser);

               redirect('administrator');

            } else {

               $this->session->set_flashdata('alert', "Password yang anda masukkan salah..");

            }

         } else {
            $this->session->set_flashdata('alert', "Username Ditolak");
         }

      }

      if ($this->session->userdata('login') == TRUE)
      {
         redirect('administrator');
      }
      $this->load->view('admin/login_form');
	}

   public function logout()
   {
      $this->session->sess_destroy();

      redirect('login');
   }
}
