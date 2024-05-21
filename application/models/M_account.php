<?php


defined('BASEPATH') or exit('No direct script access allowed');


class M_Account extends CI_Model
{

    public function view($email){
		return $this->db->where('email', $email)
                        ->get('users')->result();
	}

    // Fungsi untuk melakukan proses upload file
	public function upload(){	
        $config['upload_path'] = 'upload/excel';
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file_upload')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

    function daftar($upload)
    {
        // $this->db->insert('users', $data);

        if($upload['result'] == "success"){
            $data_user = array(
                'nama'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'username'=>$this->input->post('username'),
                'password'=>md5($this->input->post('password')),
                'nama_file' => $upload['file']['file_name'],
                'ukuran_file' => $upload['file']['file_size'],
                'tipe_file' => $upload['file']['file_type']
    
            );
        } else {
            $data_user = array(
                'email'=>$this->input->post('email'),
                'username'=>$this->input->post('username'),
                'password'=>md5($this->input->post('password')),
                'nama'=>$this->input->post('name')
            );
        }
            $this->db->insert('users', $data_user);
        }
    


    //Start: method tambahan untuk reset code  
    public function getUserInfo($id)
    {
        $q = $this->db->get_where('users', array('id_user' => $id), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $id . ')');
            return false;
        }
    }

   

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('users', array('email' => $email), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    public function insertToken($user_id)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token' => $token,
            'user_id' => $user_id,
            'created' => $date
        );
        $query = $this->db->insert_string('tokens', $string);
        $this->db->query($query);
        return $token . $user_id;
    }

    public function isTokenValid($token)
    {
        $tkn = substr($token, 0, 30);
        $uid = substr($token, 30);

        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn,
            'tokens.user_id' => $uid
        ), 1);

        if ($this->db->affected_rows() > 0) {
            $row = $q->row();

            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                return false;
            }

            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
        } else {
            return false;
        }
    }

    public function updatePassword($post)
    {
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('users', array('password' => $post['password']));
        return true;
    }
    //End: method tambahan untuk reset code  
}