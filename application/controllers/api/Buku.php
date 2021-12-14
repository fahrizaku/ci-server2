<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Buku extends CI_Controller {

    use REST_Controller { REST_Controller::__construct as private __resTraitConstruct; }

    public function __construct()
    {
        parent::__construct();
        $this->__resTraitConstruct();
        $this->load->model('Buku_model','buku');
    }

    public function index_get()
    {   
        //cek apakah di method get ada isinya
        $id = $this->get('id');
        if ($id === null){
            $buku = $this->buku->getBuku();
        } else {
            $buku = $this->buku->getBuku($id);
        }

        //kalo mahsiswa ada isinya
        if ($buku) {
            $this->response([
                'status' => true,
                'data' => $buku
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
            if ($this->buku->deleteBuku($id) > 0) {
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
            'tahun' => $this->post('tahun'),
            'judul' => $this->post('judul'),
            'pengarang' => $this->post('pengarang'),
            'deskripsi' => $this->post('deskripsi')
        ];

        if ($this->buku->createBuku($data)>0){
            $this->response([
                'status' => true,
                'message' => 'Buku baru berhasil di tambahkan.'
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
            'tahun' => $this->put('tahun'),
            'judul' => $this->put('judul'),
            'pengarang' => $this->put('pengarang'),
            'deskripsi' => $this->put('deskripsi')
        ];

        if ($this->buku->updateBuku($data, $id)>0){
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