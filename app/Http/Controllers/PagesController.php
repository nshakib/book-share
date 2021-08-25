<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-20 20:57:27
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-25 23:42:11
 */

namespace App\Http\Controllers;

use App\Models\Category;

class PagesController extends Controller
{
    public function index()
    {
        
        return view('frontend.pages.index');
    }
}
