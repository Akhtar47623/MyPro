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
                        <form action="{{ route('config.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                   @foreach ($configs as $config )
                                <div class="mb-3 col-6">
                                    <label for="email" class="form-label">{{$config->key}}</label>
                                    <input type="text" placeholder="{{$config->key}}" name="{{$config->key}}" id="email" class="form-control" value="{{ old('email', $config->value ?? '') }}" required>
                                </div>
                                @endforeach
                               </div>
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
