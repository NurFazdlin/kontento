@extends('layouts.dashboard')

@section('content')

<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

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

            <form method="POST" action="{{ route('Galleries.update', $editgallery->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <div class="form-group">
                        @if(session('success'))
                            <p style="color:green">{{ session('success') }}</p>
                        @endif

                        <input type="file" required class="form-control" name="picture" value="{{ asset($post->postPictures) }}" accept="picture/*" multiple>
                        <button type="submit">Upload Images</button>

                        @if(session('postPictures'))
                            <h2>Uploaded Images:</h2>
                            @foreach(session('postPictures') as $postPicture)
                                <img src="{{ asset($postPicture) }}" alt="Uploaded Image">
                            @endforeach
                        @endif

                        @error('picture')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="description" value="{{ $post->description }}">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection