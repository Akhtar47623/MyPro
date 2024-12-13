@extends('layouts.admin.app')

@section('title', 'Edit User')

@section('content')
@include('sweetalert::alert')

<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_content">
                    <div class="x_title d-flex justify-content-between align-items-center">
                        <h2>Edit User</h2>
                        <a href="{{ route('users.index') }}" class="btn btn-info">Back to Users</a>
                    </div>
                    <form class="" action="{{ route('users.update', $user->id) }}" method="post" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row mt-4">
                            <div class="col">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required="required" placeholder="User Name" class="form-control">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required="required" placeholder="User Email" class="form-control">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-4">
                            <!-- Role Selection -->
                            <div class="col">
                                <label for="roles" class="form-label">Roles</label>
                                <div class="form-group">
                                    @foreach($roles as $role)
                                        <div class="form-check">
                                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="form-check-input"
                                            @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                            <label class="form-check-label">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('roles')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col d-flex justify-content-end">
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
