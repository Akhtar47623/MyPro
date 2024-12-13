@extends('layouts.admin.app')
@section('title', 'Edit Blog Post')
@section('content')
@include('sweetalert::alert')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_content">
                    <h2>Update Permission</h2>
                    <form class="" action="{{ route('permissions.update', $permission->id) }}" method="post" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PATCH') <!-- For PATCH request -->
                        <div class="row mt-4">
                            <div class="col">
                                <label for="name" class="form-label">Permission</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $permission->name) }}" required="required" placeholder="Permission" class="form-control">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col d-flex justify-content-end">
                                <a href="{{ route('permissions.index') }}" class="btn btn-info">Back</a>
                                <input type="submit" value="Update" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
