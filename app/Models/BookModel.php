<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'author', 'category_id', 'published_year', 'pages', 'synopsis'];
    protected $useTimestamps = true;
}
