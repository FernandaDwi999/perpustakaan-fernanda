<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index()
    {
        $model = new CategoryModel();
        $data['categories'] = $model->findAll();
        return view('category/index', $data);
    }

    public function create()
    {
        return view('category/create');
    }

    public function store()
    {
        $model = new CategoryModel();
        $model->save(['name' => $this->request->getPost('name')]);

        // Set Flashdata untuk menunjukkan pesan sukses
        session()->setFlashdata('success', 'Kategori berhasil ditambahkan.');
        return redirect()->to('/categories');
    }

    public function edit($id)
    {
        $model = new CategoryModel();
        $data['category'] = $model->find($id);
        return view('category/edit', $data);
    }

    public function update($id)
    {
        $model = new CategoryModel();
        $model->update($id, ['name' => $this->request->getPost('name')]);

        // Set Flashdata untuk menunjukkan pesan sukses
        session()->setFlashdata('success', 'Kategori berhasil diperbarui.');
        return redirect()->to('/categories');
    }

    public function delete($id)
    {
        $model = new CategoryModel();
        $model->delete($id);

        // Set Flashdata untuk menunjukkan pesan sukses
        session()->setFlashdata('success', 'Kategori berhasil dihapus.');
        return redirect()->to('/categories');
    }
}
