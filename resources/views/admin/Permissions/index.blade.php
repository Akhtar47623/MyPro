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
                        <h2>Permissions</h2>
                        <button class="btn btn-success"><a href="{{ route('permissions.create') }}" class="text-white">Add New Permission</a></button>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Permissions</th>
                                <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('permissions.edit', $permission->id) }}" class="mx-1" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-edit" style="font-size: 18px;"></i>
                                            </a>
                                            <form id="delete-form-{{ $permission->id }}" action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $permission->id }})" style="border: none; background: none; padding: 0; color: red; font-size: 18px;" data-toggle="tooltip" title="Delete">
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
