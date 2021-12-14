<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Karyawan extends CI_Controller {

    use REST_Controller { REST_Controller::__construct as private __resTraitConstruct; }

    public function __construct()
    {
        parent::__construct();
        $this->__resTraitConstruct();
        $this->load->model('Karyawan_model','karyawan');
    }

    public function index_get()
    {   
        //cek apakah di method get ada isinya
        $id = $this->get('id');
        if ($id === null){
            $karyawan = $this->karyawan->getKaryawan();
        } else {
            $karyawan = $this->karyawan->getKaryawan($id);
        }

        //kalo mahsiswa ada isinya
        if ($karyawan) {
            $this->response([
                'status' => true,
                'data' => $karyawan
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id tidak ditemukan'
            ], 404);
        }
    }

    public function index_delete(){
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'id tidak boleh kosong'
            ], 400);
        } else {
            if ($this->karyawan->deleteKaryawan($id) > 0) {
                //ok
                $this->response([
                    'status' => true,
                    'data' => $id,
                    'message' => 'telah terhapus..'
                ], 200);
            } else {
                //id not found
                $this->response([
                    'status' => false,
                    'message' => 'id tidak ditemukan'
                ], 404);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'kode' => $this->post('kode'),
            'nama' => $this->post('nama'),
            'telp' => $this->post('telp'),
            'bagian' => $this->post('bagian')
        ];

        if ($this->Karyawan->createKaryawan($data)>0){
            $this->response([
                'status' => true,
                'message' => 'Karyawan baru berhasil di tambahkan.'
            ],201);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan data baru.'
            ], 404);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'kode' => $this->put('kode'),
            'nama' => $this->put('nama'),
            'telp' => $this->put('telp'),
            'bagian' => $this->put('bagian')
        ];

        if ($this->karyawan->updateKaryawan($data, $id)>0){
            $this->response([
                'status' => true,
                'message' => 'Data berhasil diperbaharui.'
            ],200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal memperbarui data.'
            ], 404);
        }
    }

}