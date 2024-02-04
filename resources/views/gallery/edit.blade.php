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

            <form method="POST" action="{{ route('Galleries.update', $editGalleries->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Existing Images Section -->
                <div class="mb-2">
                    <h2>Existing Images:</h2>
                    @foreach(explode('|', $editGalleries->picture) as $gallery)
                        <div class="image-container">
                            <img src="{{ asset($gallery) }}" alt="Existing Image">
                            <!-- Input for editing existing images -->
                            <input type="file" class="form-control" name="edit_picture[]" accept="picture/*">
                            <!-- Button to remove existing images -->
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmRemoveImage(this, this.parentElement)">Remove Image</button>
                        </div>
                    @endforeach
                </div>

                <!-- Upload New Images Section -->
                <div class="mb-2">
                    <div class="form-group">
                        <label for="new_picture">Upload new images here <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="new_picture[]" multiple>
                        @error('new_picture')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Description Section -->
                <div class="mb-2">
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="description" value="{{ $editGalleries->description }}">
                        @error('description')
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
