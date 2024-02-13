@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <div class="mt-5">
                      @if ($errors->any())
                        <div class="col-12">
                          @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                          @endforeach
                        </div>
                      @endif

                      @if (session()->has('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                      @endif

                      @if (session()->has('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                      @endif
                    </div>

                    <form action="{{ route('register.post') }}" class="ms-auto me-auto mt-auto" style="width: 500px">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name">
                          </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password ">
                        </div>
                        <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
