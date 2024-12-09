@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <h2>Create a Post</h2>

                    <div class="x_title">
                    </div>
                    <div class="x_content">
                        <form class="" action="{{route('blogs.store')}}" method="post" novalidate>
                            @csrf
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="auther" class="form-label">Auther</label>
                                    <input type="text" id="auther" name="auther" required="required" placeholder="Auther Name" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-control text-end" id="category" name="category_id" required>
                                        <option value="" disabled selected>Select category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title" required="required" placeholder="Blog Title" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="content">Content</label>
                                    <textarea id="content" name="content" required="required" rows="5" placeholder="Write Content here ...." class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mt-4">
                               <div class="col">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image" accept="image/*" required="required" class="form-control">
                               </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col d-flex justify-content-end">
                                    <input type="submit" value="Back" class="btn btn-info">
                                    <input type="submit" value="Add" class="btn btn-success">
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
