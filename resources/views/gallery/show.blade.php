@extends('layouts.dashboard')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('Galleries.index') }}" class="btn btn-sm btn-danger">Back</a>
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

            @if($editGalleries)
                @foreach(explode('|', $editGalleries->picture) as $gallery)
                    <div>
                        <img src="{{ asset($gallery) }}" alt="Gallery Image">
                    </div>
                @endforeach
                <div>
                    <p>Description: {{ $editGalleries->description }}</p>
                </div>
            @else
                <p>No galleries found.</p>
            @endif
        </div>
    </div>
</div>
@endsection