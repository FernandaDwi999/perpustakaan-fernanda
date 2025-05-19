<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;

class BookController extends BaseController
{
    public function index()
    {
        $bookModel = new BookModel();

        // Menampilkan data buku beserta kategori
        $data['books'] = $bookModel
            ->select('books.*, categories.name as category_name')
            ->join('categories', 'categories.id = books.category_id', 'left')
            ->findAll();

        // Menampilkan view dengan data buku
        return view('book/index', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();

        // Menampilkan view untuk membuat buku baru
        return view('book/create', $data);
    }

    public function store()
    {
        $bookModel = new BookModel();

        // Menyimpan data buku baru
        $bookModel->save([
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'category_id' => $this->request->getPost('category_id'),
            'published_year' => $this->request->getPost('published_year'),
            'pages' => $this->request->getPost('pages'),
            'synopsis' => $this->request->getPost('synopsis')
        ]);

        // Menambahkan flashdata sukses
        session()->setFlashdata('success', 'Buku berhasil ditambahkan.');

        // Redirect ke halaman daftar buku
        return redirect()->to('/books');
    }

    public function edit($id)
    {
        $bookModel = new BookModel();
        $categoryModel = new CategoryModel();

        // Mengambil data buku berdasarkan ID
        $data['book'] = $bookModel->find($id);
        $data['categories'] = $categoryModel->findAll();

        // Menampilkan view untuk mengedit buku
        return view('book/edit', $data);
    }

    public function update($id)
    {
        $bookModel = new BookModel();

        // Memperbarui data buku berdasarkan ID
        $bookModel->update($id, [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'category_id' => $this->request->getPost('category_id'),
            'published_year' => $this->request->getPost('published_year'),
            'pages' => $this->request->getPost('pages'),
            'synopsis' => $this->request->getPost('synopsis')
        ]);

        // Menambahkan flashdata sukses
        session()->setFlashdata('success', 'Buku berhasil diperbarui.');

        // Redirect ke halaman daftar buku
        return redirect()->to('/books');
    }

    public function delete($id)
    {
        $bookModel = new BookModel();

        // Menghapus buku berdasarkan ID
        $bookModel->delete($id);

        // Menambahkan flashdata sukses
        session()->setFlashdata('success', 'Buku berhasil dihapus.');

        // Redirect ke halaman daftar buku
        return redirect()->to('/books');
    }
}
