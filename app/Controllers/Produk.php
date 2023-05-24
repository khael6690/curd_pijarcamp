<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

define('_TITLE', 'Produk');

class Produk extends BaseController
{

    private $_m_produk;
    public function __construct()
    {
        $this->_m_produk = new ProdukModel();
    }

    public function index()
    {
        $data = $this->_m_produk->findAll();
        $produk = [
            'title' => _TITLE,
            'produk' => $data
        ];
        return view('index', $produk);
    }

    public function tambah()
    {

        if ($this->request->isAJAX()) {
            if ($this->_m_produk->save(
                [
                    'nama_produk' => $this->request->getVar('nama_produk'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'harga' => $this->request->getVar('harga'),
                    'jumlah' => $this->request->getVar('jumlah')
                ]
            )) {
                $msg = [
                    'success' =>  'Data berhasil ditambahkan!'
                ];

                return $this->response->setJSON($msg);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit($id)
    {
        $data = $this->_m_produk->find($id);
        $tampil = [
            'title' => _TITLE,
            'data' => $data
        ];
        return view('edit', $tampil);
    }

    public function update($id)
    {
        if ($this->_m_produk->update(
            $id,
            [
                'nama_produk' => $this->request->getVar('nama_produk'),
                'keterangan' => $this->request->getVar('keterangan'),
                'harga' => $this->request->getVar('harga'),
                'jumlah' => $this->request->getVar('jumlah')
            ]
        )) {
            return redirect()->to('/');
        }
    }

    public function delete($id)
    {
        if ($this->_m_produk->delete($id)) {
            return redirect()->to('/');
        }
    }
}
