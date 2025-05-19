<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $bookModel = new BookModel();
        $categoryModel = new CategoryModel();

        $books = $bookModel
            ->select('books.*, categories.name as category_name')
            ->join('categories', 'categories.id = books.category_id', 'left')
            ->findAll();

        $categories = $categoryModel->findAll();

        $totalBooks = count($books);
        $totalCategories = count($categories);

        return view('dashboard/index', [
            'books' => $books,
            'categories' => $categories,
            'totalBooks' => $totalBooks,
            'totalCategories' => $totalCategories
        ]);
    }
}
