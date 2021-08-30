<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-27 09:14:46
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-28 12:49:45
 */
?>
@extends('backend.layouts.master')

@section('admin-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Authors</h1>
        <a href="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"><i
            class="fas fa-plus-circle fa-sm text-white-50" ></i> Add Author</a>

    </div>
    @include('backend.layouts.partials.message')

    {{-- add modal --}}
  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.authors.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <label for="name">Author Name</label>
                    <br>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Author Name">
                </div>
                <div class="col-12">
                    <label for="description">Author Details</label>
                    <br>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="5" placeholder="Author Details"></textarea>
                </div>
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>


    <div class="row">
        <div class="col-md-12">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Author List</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->link }}</td>
                                <td>
                                    <a href="#editModal{{ $author->id }}" class="btn btn-success" data-toggle="modal"><i class="fa fa-edit" ></i>Edit</a>
                                    <a href="#deleteModal{{ $author->id }}" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash" ></i>Delete</a>
                                </td>
                            </tr>

                            <div class="modal fade" id="editModal{{ $author->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit Author</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{ route('admin.authors.update',$author->id) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="name">Author Name</label>
                                                <br>
                                                <input type="text" name="name" class="form-control" id="name" value="{{ $author->name }}">
                                            </div>
                                            <div class="col-12">
                                                <label for="description">Author Details</label>
                                                <br>
                                                <textarea name="description"  class="form-control" id="description" cols="30" rows="5" >{{ $author->description }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </form>

                                    </div>
                                  </div>
                                </div>
                              </div>

                              {{-- Delete Modal --}}
                              <div class="modal fade" id="deleteModal{{ $author->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{ route('admin.authors.delete',$author->id) }}" method="post">
                                        @csrf
                                        <div>
                                            {{ $author->name }} will be deleted !!
                                        </div>
                                        <div class="mt-5">
                                            <button type="submit" class="btn btn-primary">Ok, Confirm</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </form>

                                    </div>
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
