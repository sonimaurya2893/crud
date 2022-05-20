@extends('auth.layouts.head')
@section('title')
    <title>
       Admin Dashboard
    </title>
@endsection
@include("admin.header")
@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card text-dark bg-light mb-3  mt-3 ">
                        <div class="card-header">
                           <a href="{{route('post.form')}}">Add New Post</a> 
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                               <tr>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Post</th>
                                   <th>Description</th>
                                   <th>Image</th>
                                   <th>Action</th>
                               </tr>
                                   @foreach($posts as $post)
                                   <tr>
                                       <td>{{$post->user->name}}</td>
                                       <td>{{$post->user->email}}</td>
                                       <td>{{$post->name}}</td>
                                       <td>{{$post->description}}</td>
                                       <td><img src="{{asset('front/images/posts/'.$post->image)}}" class="img img-responsive" width="100" /></td>
                                       <td><a class="btn btn-sm btn-success" href="{{route('post.edit',[$post->id])}}">Edit</a> |
                                        <a class="btn btn-sm btn-danger" href="{{route('post.delete',[$post->id])}}"> Delete</a> | 
                                        <a class="btn btn-sm btn-info" href="{{route('post.view',[$post->id])}}">View</a>
                                    </td>
                                    </tr>
                                   @endforeach
                              </table>
                              {{$posts->links()}}
                        </div>                        

                    </div>
                </div>
            </div>
        </div>
    @endsection
