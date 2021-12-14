<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends CI_Controller {

    use REST_Controller { REST_Controller::__construct as private __resTraitConstruct; }

    public function __construct()
    {
        parent::__construct();
        $this->__resTraitConstruct();
        $this->load->model('Mahasiswa_model','mahasiswa');
    }

    public function index_get()
    {   
        //cek apakah di method get ada isinya
        $id = $this->get('id');
        if ($id === null){
            $mahasiswa = $this->mahasiswa->getMahasiswa();
        } else {
            $mahasiswa = $this->mahasiswa->getMahasiswa($id);
        }

        //kalo mahsiswa ada isinya
        if ($mahasiswa) {
            $this->response([
                'status' => true,
                'data' => $mahasiswa
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
            if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
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
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if ($this->mahasiswa->createMahasiswa($data)>0){
            $this->response([
                'status' => true,
                'message' => 'Mahasiswa baru berhasil di tambahkan.'
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
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if ($this->mahasiswa->updateMahasiswa($data, $id)>0){
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