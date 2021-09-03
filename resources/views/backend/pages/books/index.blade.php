<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-30 10:28:13
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-09-03 10:40:25
 */


?>
@extends('backend.layouts.master')

@section('admin-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Books</h1>
        <a href="{{ route('admin.books.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus-circle fa-sm text-white-50" ></i> Add Book</a>

    </div>
    @include('backend.layouts.partials.message')


    <div class="row">
        <div class="col-md-12">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Book List</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Category</th>
                                <th>Publisher</th>
                                <th>Statistic</th>
                                <th>Status</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book->title }}</td>
                                <td><a href="{{ route('books.show',$book->slug) }}" target="_blank">{{ route('books.show',$book->slug) }}</a></td>
                                <td>
                                    {{ $book->category->name }}
                                </td>
                                <td>
                                    {{ $book->publisher->name }}
                                </td>
                                <td>
                                    @if ($book->is_approved)
                                        <span class="badge badge-success">
                                            <i class="fa fa-check"></i>Approved
                                        </span>
                                        @else
                                        <span class="badge badge-danger">
                                            <i class="fa fa-times"></i>Not Approved
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <i class="fa fa-eye" aria-hidden="true"></i> {{ $book->total_view}}
                                    <br>
                                    <i class="fa fa-search" aria-hidden="true"></i> {{ $book->total_search}}
                                </td>
                                <td>
                                    <a href="#editModal{{ $book->id }}" class="btn btn-success" data-toggle="modal"><i class="fa fa-edit" ></i></a>
                                    <a href="#deleteModal{{ $book->id }}" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash" ></i></a>
                                </td>
                            </tr>

                              {{-- Delete Modal --}}
                              <div class="modal fade" id="deleteModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    {{-- <div class="modal-body">
                                      <form action="{{ route('admin.books.delete',$book->id) }}" method="post">
                                        @csrf
                                        <div>
                                            {{ $book->name }} will be deleted !!
                                        </div>
                                        <div class="mt-5">
                                            <button type="submit" class="btn btn-primary">Ok, Confirm</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </form>

                                    </div> --}}
                                  </div>
                                </div>
                              </div>
                              {{-- Delete Modal --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
