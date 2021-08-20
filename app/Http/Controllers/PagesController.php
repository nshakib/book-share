<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-20 20:57:27
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-20 21:06:35
 */

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
