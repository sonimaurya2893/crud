@extends('auth.layouts.head')
@section('title')
    <title>
        Signup - Admin 
    </title>
@endsection
@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card text-dark bg-light mb-3  mt-3 ">
                        <div class="card-header">Signup Form</div>
                        <div class="card-body">

                            <form method="POST" action="{{ route('signup.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label for="Name">Name:</label>
                                    <input type="text" class="form-control" id="Name" placeholder="Enter Name" name="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email"
                                        name="email">
                                    @error('email')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                        name="password">
                                    @error('password')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="image">Profile Image:</label>
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

                                <button type="submit" class="btn btn-primary">Signup</button>
                                <p class="sign-up">Already Registered?<a href="{{ route('login.view') }}"> Login
                                        Here</a></p>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
