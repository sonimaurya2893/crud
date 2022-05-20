@extends('auth.layouts.head')
@section('title')
    <title>
      Add New Post - Admin Dashboard
    </title>
@endsection
@include("admin.header")
@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card text-dark bg-light mb-3  mt-3 ">
                        <div class="card-header">Add Post</div>
                        <div class="card-body">
                            @if (Session::has('message'))
                            <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="mb-3 mt-3">
                                <label for="Name">Name:</label>
                                <input type="text" class="form-control" id="Name" placeholder="Enter Post Name" name="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" placeholder="Enter Description" name="description"></textarea>
                                @error('description')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                        </div>                        

                    </div>
                </div>
            </div>
        </div>
    @endsection
