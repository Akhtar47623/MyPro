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
                        <form class="" action="{{route('categories.store')}}" method="post" novalidate>
                            @csrf
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="name" class="form-label">Blog Category</label>
                                    <input type="text" id="name" name="name" required="required" placeholder="Blog Category" class="form-control">
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
