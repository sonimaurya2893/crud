@extends('auth.layouts.head')
@section('title')
    <title>
        Login - Admin Dashboard
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

                            @if (Session::has('message'))
                                <p class="alert alert-danger">{{ Session::get('message') }}</p>
                            @endif
                            <form method="POST" action="{{ route('login.store') }}">
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email"
                                        name="email">

                                </div>
                                <div class="mb-3">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                        name="password">
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember"> Remember me
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                                <p class="sign-up">Don't have an Account?<a href="{{ route('signup.view') }}"> Sign
                                        Up</a></p>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
