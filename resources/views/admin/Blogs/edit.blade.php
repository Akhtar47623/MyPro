@extends('layouts.admin.app')
@section('title', 'Edit Blog Post')
@section('content')
@include('sweetalert::alert')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <h2>Edit Post</h2>
                    <div class="x_title">
                    </div>
                    <div class="x_content">
                        <form class="" action="{{ route('blogs.update', $blog->id) }}" method="post" novalidate enctype="multipart/form-data">
                            @csrf
                            @method('PATCH') <!-- For PATCH request -->
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="auther" class="form-label">Author</label>
                                    <input type="text" id="auther" name="auther" value="{{ old('auther', $blog->auther) }}" required="required" placeholder="Author Name" class="form-control">
                                    @error('auther')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-control text-end" id="category" name="category_id" required>
                                        <option value="" disabled>Select category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title" value="{{ old('title', $blog->title) }}" required="required" placeholder="Blog Title" class="form-control">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="content">Content</label>
                                    <textarea id="content" name="content" required="required" rows="5" placeholder="Write Content here ...." class="form-control">{{ old('content', $blog->content) }}</textarea>
                                    @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="image">Image</label>
                                    @if($blog->path)
                                        <div class="mt-2">
                                            <!-- Display the existing image -->
                                            <img src="{{ asset('storage/' . $blog->path) }}" alt="Blog Image" width="150" class="img-thumbnail">
                                        </div>
                                    @endif
                                    <input type="file" id="image" name="image" accept="image/*" class="form-control">
                                    <small class="text-muted">Leave empty if you don't want to update the image</small>


                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col d-flex justify-content-end">
                                    <a href="{{ route('blogs.index') }}" class="btn btn-info">Back</a>
                                    <input type="submit" value="Update" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
