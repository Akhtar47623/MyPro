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
                        <h2>Create Role</h2>
                        <a href="{{ route('roles.index') }}" class="btn btn-info">Back to Roles</a>
                    </div>
                    <div class="x_content">
                        <form class="" action="{{route('roles.store')}}" method="post" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-4">
                               <div class="col">
                                    <label for="image">Role</label>
                                    <input type="text" name="name" placeholder="Role Name" class="form-control">
                                    @error('image')
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
                                                class="form-check-input">
                                            <label class="form-check-label" for="permissions[]">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col d-flex justify-content-start">
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
