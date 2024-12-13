@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('content')
@include('sweetalert::alert')

<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title d-flex justify-content-between align-items-center">
                        <h2>Create User</h2>
                        <a href="{{ route('users.index') }}" class="btn btn-info">Back to Users</a>
                    </div>
                    <div class="x_content">
                        <form class="" action="{{ route('users.store') }}" method="post" novalidate enctype="multipart/form-data">
                            @csrf

                            <!-- First Row: Name and Email -->
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" placeholder="User Name" class="form-control" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" placeholder="User Email" class="form-control" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Second Row: Password and Confirm Password -->
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required>
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row mt-4">
                                <div class="col d-flex justify-content-start">
                                    <input type="submit" value="Add User" class="btn btn-success">
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
