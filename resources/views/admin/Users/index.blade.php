@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('content')
@include('sweetalert::alert')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title d-flex justify-content-between align-items-center">
                        <h2>Users</h2>
                        <button class="btn btn-success"><a href="{{ route('users.create') }}" class="text-white">Add New User</a></button>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key=> $user)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <span class="badge badge-info">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('users.edit', $user->id) }}" class="mx-1" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-edit" style="font-size: 18px;"></i>
                                        </a>
                                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $user->id }})" style="border: none; background: none; padding: 0; color: red; font-size: 18px;" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection
