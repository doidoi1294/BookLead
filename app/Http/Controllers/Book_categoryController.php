<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book_category;

class Book_categoryController extends Controller
{
    public function index(Book_category $book_category)
    {
        return view('book_categories.index')->with(['books' => $book_category->getByCategory()]);
    }
}
