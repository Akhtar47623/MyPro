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
                        <h2>Blogs</h2>
                        <button class="btn btn-success"><a href="{{route('blogs.create')}}" class="text-white">Add New Blog</a></button>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Auther</th>
                                <th>Image</th>
                                <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $key=>$blog)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>{{$blog->content}}</td>
                                    <td>{{$blog->auther??"N/A"}}</td>
                                    <td>
                                        @if($blog->path != null)
                                        <img src="{{asset('storage/' .$blog->path)}}" width="50" height="30" />
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('blogs.show',$blog->id)}}" class="mx-1" data-toggle="tooltip" title="View">
                                            <i class="fa fa-eye text-info" style="font-size: 18px;"></i>
                                        </a>
                                        <a href="{{ route('blogs.edit', $blog->id) }}" class="mx-1" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-edit" style="font-size: 18px;"></i>
                                        </a>
                                        <form id="delete-form-{{ $blog->id }}" action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $blog->id }})" style="border: none; background: none; padding: 0; color: red; font-size: 18px;" data-toggle="tooltip" title="Delete">
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
