@extends('auth.layouts.head')
@section('title')
    <title>
      Update Post - Admin Dashboard
    </title>
@endsection
@include("admin.header")
@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card text-dark bg-light mb-3  mt-3 ">
                        <div class="card-header">Update Post</div>
                        <div class="card-body">
                            @if (Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                        @if (Session::has('Fail'))
                        <p class="alert alert-danger">{{ Session::get('Fail') }}</p>
                    @endif
                        <form method="POST" action="{{ route('post.update',[$post->id]) }}" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="mb-3 mt-3">
                                <label for="Name">Name:</label>
                                <input type="text" class="form-control" id="Name" value="{{$post->name}}" placeholder="Enter Post Name" name="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control" id="image" name="image" value="{{$post->image}}">
                                @error('image')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                                @if(!empty($post->image))
                                <img src="{{asset('front/images/posts/'.$post->image)}}" class="img img-responsive" width="100" />
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" placeholder="Enter Description" name="description">{{$post->description}}</textarea>
                                @error('description')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>

                        </form>
                        </div>                        

                    </div>
                </div>
            </div>
        </div>
    @endsection
