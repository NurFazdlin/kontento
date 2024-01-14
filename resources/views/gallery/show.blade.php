@extends('layouts.dashboard')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-danger">Back</a>
            </div>
        </div>

        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="mb-2">
                <div class="form-group">
                    <p>Uploaded Images: {{ $post->picture }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Description: {{ $post->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection