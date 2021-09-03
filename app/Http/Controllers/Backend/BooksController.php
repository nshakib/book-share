<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-30 10:14:53
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-09-03 11:16:43
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use App\Models\BookAuthor;
use App\Models\Publisher;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('backend.pages.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('backend.pages.books.create', compact('categories','publishers','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'slug' => 'nullable|unique:books',
            'description' => 'nullable|min:5',
        ]);

        $book = new Book();

        $book->title = $request->title;
        if(empty($request->slug))
        {
            $book->slug =str_slug($request->title);
        }else{
            $book->slug = $request->slug;
        }

        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->publish_year = $request->publish_year;
        $book->description = $request->description;
        $book->is_approved = 1;
        $book->save();


        //book author
        $book_author = new BookAuthor();

        $book_author->book_id = $book->id;
        $book_author->author_id = $request->author_id;
        $book_author->save();

        session()->flash('success', 'Book has been Added !!');
        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $request->validate([
            'name' => 'required|max:50',
            'slug' => 'nullable|unique:book,slug'.$book->id,
            'description' => 'nullable|min:5',
        ]);



        $book->name = $request->name;
        if(empty($request->slug))
        {
            $book->slug =str_slug($request->slug);
        }else{
            $book->slug = $request->slug;
        }
        $book->parent_id = $request->parent_id;
        $book->description = $request->description;
        $book->save();

        session()->flash('success', 'book has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete all child Book

        $book = Book::find($id);
        $book->delete();

        session()->flash('success', 'book has been deleted !!');
        return back();
    }
}
