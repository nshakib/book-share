<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-30 10:28:13
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-09-03 11:14:39
 */


?>
@extends('backend.layouts.master')

@section('admin-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Book</h1>
    </div>
    @include('backend.layouts.partials.message')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.books.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Book Title</label>
                        <br>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Book Title">
                    </div>

                    <div class="col-md-6">
                        <label for="name">Book URL Text</label>
                        <br>
                        <input type="text" name="slug" class="form-control" id="slug" placeholder="Book URL">
                    </div>


                    <div class="col-md-6">
                        <label for="link">Book Category</label>
                        <br>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="link">Book Author</label>
                        <br>
                        <select name="author_id" id="author_id" class="form-control">
                            <option value="">Select Author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="link">Book Publisher</label>
                        <br>
                        <select name="publisher_id" id="publisher_id" class="form-control">
                            <option value="">Select Publisher</option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="link">Book Publication Year</label>
                        <br>
                        <select name="publishe_year" id="publish_year" class="form-control">
                            <option value="">Select Year</option>
                            @for ($year = date('Y'); $year>=1900 ; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>

                            @endfor
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="description">Book Details</label>
                        <br>
                        <textarea name="description" class="form-control" id="description" cols="30"
                        rows="5" placeholder="Book Details"></textarea>
                    </div>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </form>
        </div>
    </div>

@endsection
