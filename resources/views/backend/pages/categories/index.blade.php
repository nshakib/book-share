<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-30 10:28:13
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-30 17:49:56
 */


?>
@extends('backend.layouts.master')

@section('admin-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Category</h1>
        <a href="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"><i
            class="fas fa-plus-circle fa-sm text-white-50" ></i> Add Category</a>

    </div>
    @include('backend.layouts.partials.message')

    {{-- add modal --}}
  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Category Name</label>
                    <br>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Category Name">
                </div>
                <div class="col-md-6">
                    <label for="link">Category URL Text</label>
                    <br>
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Category Slug, e.g, c-programing">
                </div>
                <div class="col-md-6">
                    <label for="parent_id">Parent Category</label>
                    <br>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($parent_categories as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="description">Category Details</label>
                    <br>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="5" placeholder="categories Details"></textarea>
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
                    <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Parent Category</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td><a href="{{ route('categories.show',$category->slug) }}" target="_blank">{{ route('categories.show',$category->slug) }}</a></td>
                                <td>
                                    @if(!is_null($category->parent_category($category->parent_id)))
                                        {{ $category->parent_category($category->parent_id)->name }}
                                    @else
                                    ..
                                    @endif
                                </td>
                                <td>
                                    <a href="#editModal{{ $category->id }}" class="btn btn-success" data-toggle="modal"><i class="fa fa-edit" ></i>Edit</a>
                                    <a href="#deleteModal{{ $category->id }}" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash" ></i>Delete</a>
                                </td>
                            </tr>

                            {{-- update --}}
                            <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.categories.update',$category->id) }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="name">Category Name</label>
                                                    <br>
                                                    <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="link">Category URL Text</label>
                                                    <br>
                                                    <input type="text" name="slug" class="form-control" id="slug" value="{{ $category->slug }}"">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="parent_id">Parent Category</label>
                                                    <br>
                                                    <select name="parent_id" id="parent_id" class="form-control">
                                                        <option value="">Select Category</option>
                                                        @foreach ($parent_categories as $parent)
                                                            <option value="{{ $parent->id }}"
                                                                {{ $category->parent_id == $parent->id ? 'selected' : '' }}>
                                                                {{ $parent->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <label for="description">Category Details</label>
                                                    <br>
                                                    <textarea name="description" class="form-control" id="description" cols="30" rows="5" >{{ $category->description }}</textarea>
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
                              <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{ route('admin.categories.delete',$category->id) }}" method="post">
                                        @csrf
                                        <div>
                                            {{ $category->name }} will be deleted !!
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
