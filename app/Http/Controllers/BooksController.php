<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-25 23:59:08
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-26 00:05:44
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function show()
    {
        return view('frontend.pages.books.show');
    }
}
