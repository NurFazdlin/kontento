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

            <form method="POST" action="{{ route('Galleries.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-2">
                    <div class="form-group">
                        <label for="typeofhomestay">Type of Homestay <span class="text-danger">*</span></label>
                        <select id="typeofhomestay" name="typeofhomestay" class="form-control" required>
                            <option value="kontena"> HomestaykontenaMelaka </option>
                            <option value="villaredan"> Villa Redan Homestay </option>
                            <option value="glamping"> Melaka Private Glamping </option>
                        </select>
                        @error('typeofhomestay')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="description">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="cover">Upload your cover here <span class="text-danger">*</span></label>
                        <input type="file" required class="form-control" name="cover">
                        @error('cover')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="picture">Upload your images here <span class="text-danger">*</span></label>
                        <input type="file" required class="form-control" name="pictures[]" multiple>
                        @error('picture')
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