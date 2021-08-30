<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-28 19:56:56
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-28 22:01:52
 */



/**
 * @publisher: Md Nazmus Shakib
 * @Date:   2021-08-27 09:14:46
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-28 19:59:26
 */
?>
@extends('backend.layouts.master')

@section('admin-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Publishers</h1>
        <a href="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"><i
            class="fas fa-plus-circle fa-sm text-white-50" ></i> Add Publishers</a>

    </div>
    @include('backend.layouts.partials.message')

    {{-- add modal --}}
  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Publisher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.publishers.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="name">publishers Name</label>
                    <br>
                    <input type="text" name="name" class="form-control" id="name" placeholder="publishers Name">
                </div>
                <div class="col-md-6">
                    <label for="link">publishers Link</label>
                    <br>
                    <input type="text" name="link" class="form-control" id="link" placeholder="publishers Link">
                </div>
                <div class="col-md-6">
                    <label for="address">publishers Address</label>
                    <br>
                    <input type="text" name="address" class="form-control" id="address" placeholder="publishers Address">
                </div>
                <div class="col-md-6">
                    <label for="name">publishers Outlet</label>
                    <br>
                    <input type="text" name="outlet" class="form-control" id="outlest" placeholder="publishers Outlet">
                </div>
                <div class="col-12">
                    <label for="description">publishers Details</label>
                    <br>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="5" placeholder="publishers Details"></textarea>
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
                    <h6 class="m-0 font-weight-bold text-primary">publishers List</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Address</th>
                                <th>Outlet</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publishers as $publisher)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $publisher->name }}</td>
                                <td>{{ $publisher->link }}</a></td>
                                <td>{{ $publisher->address }}</td>
                                <td>{{ $publisher->outlet }}</td>
                                <td>
                                    <a href="#editModal{{ $publisher->id }}" class="btn btn-success" data-toggle="modal"><i class="fa fa-edit" ></i>Edit</a>
                                    <a href="#deleteModal{{ $publisher->id }}" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash" ></i>Delete</a>
                                </td>
                            </tr>

                            {{-- update --}}
                            <div class="modal fade" id="editModal{{ $publisher->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit publisher</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{ route('admin.publisher.update',$publisher->id) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name">publishers Name</label>
                                                <br>
                                                <input type="text" name="name" class="form-control" id="name" value="{{ $publisher->name }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="link">publishers Link</label>
                                                <br>
                                                <input type="text" name="link" class="form-control" id="link" value="{{ $publisher->link }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="address">publishers Address</label>
                                                <br>
                                                <input type="text" name="address" class="form-control" id="address" value="{{ $publisher->address }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="name">publishers Outlet</label>
                                                <br>
                                                <input type="text" name="outlet" class="form-control" id="outlest" value="{{ $publisher->outlet }}">
                                            </div>
                                            <div class="col-12">
                                                <label for="description">publishers Details</label>
                                                <br>
                                                <textarea name="description" class="form-control" id="description" cols="30" rows="5" >{{ $publisher->description }}</textarea>
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
                              <div class="modal fade" id="deleteModal{{ $publisher->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{ route('admin.publisher.delete',$publisher->id) }}" method="post">
                                        @csrf
                                        <div>
                                            {{ $publisher->name }} will be deleted !!
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
