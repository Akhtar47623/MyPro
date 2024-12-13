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
                        <h2>Create Permission</h2>
                        <a href="{{ route('permissions.index') }}" class="btn btn-info">Back to Permissions</a>
                    </div>
                    <div class="x_content">
                        <form class="" action="{{route('permissions.store')}}" method="post" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-4">
                               <div class="col">
                                    <label for="image">Role</label>
                                    <input type="text" name="name" placeholder="Permission Name" class="form-control">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
