@extends('layouts.admin.app')
@section('title', 'Blog Details')

@section('content')
@include('sweetalert::alert')

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title d-flex justify-content-between align-items-center">
                    <h2>Blog Details</h2>
                    <a href="{{ route('blogs.index') }}" class="btn btn-info">Back to Blogs</a>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>{{ $blog->title }}</h3>
                            <p><strong>Author:</strong> {{ $blog->auther ?? "N/A" }}</p>
                            <p><strong>Content:</strong> {!! nl2br(e($blog->content)) !!}</p>
                            <p><strong>Category:</strong> {{ $blog->category->name ?? 'N/A' }}</p>
                            @if($blog->path)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $blog->path) }}" alt="Blog Image" style="width:300px; height:200px;">
                            </div>
                            @else
                            <p><strong>Image:</strong> N/A</p>
                            @endif
                        </div>
                    </div>

                    <!-- Blog Actions -->
                    <div class="mt-4">
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                        <!-- Delete Form with SweetAlert -->
                        <form id="delete-form-{{ $blog->id }}" action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete({{ $blog->id }})" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
