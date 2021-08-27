<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-27 09:12:11
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-27 09:53:42
 */


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('backend.pages.index');
    }
}
