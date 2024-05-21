<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_account');
        $this->simple_login->cek_login();
    }

    //Load Halaman dashboard
    public function index()
    {

        $email = $this->session->userdata('email');
        $data = $this->session->userdata('file_upload');
        $this->load->view('account/v_dashboard', $data);
    }

    public function upload()
    {
        // $this->load->view('account/v_dashboard', "debug1");
        //echo "debug1";
        // Load plugin PHPExcel nya
        //$user_id = $this->session->userdata('idadmin');

        date_default_timezone_set("Asia/Bangkok");
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $this->load->library('upload');

        $config['upload_path'] = 'upload/excel';
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '20000';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('userfile')) {

            //echo "<pre>";
            //die(print_r("DEBUG 1", TRUE));
            echo '<pre>'.$this->session->flashdata('DEBUG 1');
            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
        } else {


            //echo '<pre>'.$this->session->flashdata('DEBUG 2');

            $data_upload = $this->upload->data();

            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('upload/excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            //$objWorksheet = $objPHPExcel->getSheetByName('transaksi'); 
            $sheet = $loadexcel->getSheetByName('transaksi');

            echo "<pre>";
            die(print_r("DEBUG 2", TRUE));

            $data = array();

            $numrow = 1;
            foreach ($sheet as $row) {
                if ($numrow > 1) {
                    array_push($data, array(
                        'id_trx' => $row['A'],
                        'No_invoice' => $row['B'],
                        'total_berat' => $row['C'],
                        'ongkos_kirim' => $row['D'],
                        'total_harga' => $row['E'],
                        'kode_user' => $row['F'],
                        'id_user' => $row['G'],
                        'alamat_penerima' => $row['H'],
                        'tgl_kirim' => date('Y-m-d H:i:s'),
                        'id_ekspedisi' => $row['J'],
                        'jenis_pengiriman' => $row['K'],
                        'tgl_trx' => date('Y-m-d H:i:s')

                    ));

                    array_push($data_finance, array(
                        'id_trx' => $id_trx,
                        'No_invoice' => $noinvoice,
                        'total_berat' => $row['C'],
                        'ongkos_kirim' => $row['D'],
                        'total_harga' => $row['E'],
                        'kode_user' => $row['F'],
                        'id_user' => $row['G'],
                        'alamat_penerima' => $row['H'],
                        'tgl_kirim' => date('Y-m-d H:i:s'),
                        'id_ekspedisi' => $row['J'],
                        'jenis_pengiriman' => $row['K'],
                        'tgl_trx' => date('Y-m-d H:i:s')
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('dashboard', $data);
            //delete file from server
            unlink(realpath('upload/excel/' . $data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
        }

        redirect('dashboard');
    }
}
