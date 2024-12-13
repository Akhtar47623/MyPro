@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title d-flex justify-content-between align-items-center">
                <h2>Categories</h2>
                <button class="btn btn-success"><a href="{{route('categories.create')}}" class="text-white">Add New Category</a></button>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Category</th>
                    <th>Created At</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
