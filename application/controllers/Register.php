<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

   function __construct(){
       parent::__construct();
       $this->load->library(array('form_validation'));
       $this->load->helper(array('url','form'));
       $this->load->model('m_account'); //call model
   }

   public function index() {

       $this->form_validation->set_rules('name', 'NAME','required');
       $this->form_validation->set_rules('username', 'USERNAME','required');
       $this->form_validation->set_rules('email','EMAIL','trim|required|min_length[1]|max_length[255]|is_unique[users.email]');
       $this->form_validation->set_rules('password','PASSWORD','required');
       $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]');
       if($this->form_validation->run() == FALSE) {
           $this->load->view('account/v_register');
           $this->session->set_flashdata('sukses', 'Update password gagal.');
       }else{
        
		   $upload = $this->m_account->upload();
           $this->m_account->daftar($upload);

        //    $pesan['message'] =    "Pendaftaran berhasil";
           $this->session->set_flashdata('sukses', 'Pendaftaran berhasil. Silakan login.');

           $this->load->view('account/v_login');
       }
   }
}