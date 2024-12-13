@extends('layouts.admin.app')
@section('title', 'Edit Blog Post')
@section('content')
@include('sweetalert::alert')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_content">
                    <form class="" action="{{ route('roles.update', $role->id) }}" method="post" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PATCH') <!-- For PATCH request -->
                        <div class="row mt-4">
                            <div class="col">
                                <label for="name" class="form-label">Role</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}" required="required" placeholder="Author Name" class="form-control">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="permissions" class="form-label">Permissions</label>
                            <div>
                                @foreach($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                            class="form-check-input"
                                            {{ in_array($permission->id, old('permissions', $rolePermissions)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="permissions[]">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
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
@endsection
