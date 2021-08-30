<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-27 09:12:11
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-28 22:23:56
 */


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $total_books = count(Book::all());
        $total_authors = count(Author::all());
        $total_publishers = count(Publisher::all());
        $total_categories = count(Category::all());
        return view('backend.pages.index', compact('total_books','total_authors','total_publishers','total_categories'));
    }
}
