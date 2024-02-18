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

            

            <form method="POST" action="{{ route('Galleries.update', $Galleries->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-2">
                    <div class="form-group">
                        <p>Cover:</p>
                        <form action="{{ route('Galleries.update', $Galleries->id) }}" method="post">
                        <button class="btn text-danger">X</button>
                        @csrf
                        @method('delete')
                        </form>
                        <img src="/cover/{{ $Galleries->cover }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                    </div>
                </div>
    
                <div class="mb-2">
                    <div class="image-container">
                        @if (count($Galleries->pictures)>0)
                        <p>Images:</p>
                        @foreach ($Galleries->pictures as $img)
                        <form action="{{ route('Galleries.update', $Galleries->id) }}" method="post">
                            <button class="btn text-danger">X</button>
                            @csrf
                            @method('delete')
                            </form>
                        <img src="/pictures/{{ $img->picture }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="mb-2">
                    <div class="form-group">
                        <label for="typeofhomestay">Type of Homestay</label>
                        <select id="typeofhomestay" name="typeofhomestay" class="form-control" value="{{ $Galleries->typeofhomestay }}">
                            <option value="kontena" {{ $Galleries->typeofhomestay == 'kontena' ? 'selected' : '' }}> HomestaykontenaMelaka </option>
                            <option value="villaredan" {{ $Galleries->typeofhomestay == 'villaredan' ? 'selected' : '' }}> Villa Redan Homestay </option>
                            <option value="glamping" {{ $Galleries->typeofhomestay == 'glamping' ? 'selected' : '' }}> Melaka Private Glamping </option>
                        </select>
                        @error('typeofhomestay')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" value="{{ $Galleries->description }}">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="cover">Upload your cover here</label>
                        <input type="file" class="form-control" name="cover" value="{{ $Galleries->cover }}">
                        @error('cover')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="picture">Upload your images here</label>
                        <input type="file" class="form-control" name="pictures[]" multiple value="{{ $Galleries->picture }}">
                        @error('picture')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript Confirmation for Removing Image -->
<script>
    function confirmRemoveImage(button, imageContainer) {
        if (confirm("Are you sure you want to remove this image?")) {
            // Find the parent container of the image to remove it from the view
            var container = button.closest('.image-container');
            container.remove();

            // You may also want to update the form or send an AJAX request to handle removal
            // For simplicity, let's assume you have a hidden input to keep track of removed images
            var removedImageInput = document.createElement('input');
            removedImageInput.type = 'hidden';
            removedImageInput.name = 'removed_images[]';
            removedImageInput.value = container.querySelector('img').src;
            document.querySelector('form').appendChild(removedImageInput);
        }
    }
</script>

@endsection
