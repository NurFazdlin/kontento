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
                <a href="{{ route('feedbacks.index') }}" class="btn btn-sm btn-danger">Back</a>
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

            <form method="POST" action="{{ route('feedbacks.update', $editfeedback->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="name" value="{{ $editfeedback->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="staffservice">Staff Services<span class="text-danger">*</span></label>
                        <select id="staffservice" name="staffservice" class="form-control" required>
                            <option value="excellent" {{ $editfeedback->staffservice == 'excellent' ? 'selected' : '' }}> Excellent </option>
                            <option value="good" {{ $editfeedback->staffservice == 'good' ? 'selected' : '' }}> Good </option>
                            <option value="fair" {{ $editfeedback->staffservice == 'fair' ? 'selected' : '' }}> Fair </option>
                            <option value="poor" {{ $editfeedback->staffservice == 'poor' ? 'selected' : '' }}> Poor </option>
                        </select>
                        @error('staffservice')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="cleanliness">Staff Services<span class="text-danger">*</span></label>
                        <select id="cleanliness" name="cleanliness" class="form-control" required>
                            <option value="excellent" {{ $editfeedback->cleanliness == 'excellent' ? 'selected' : '' }}> Excellent </option>
                            <option value="good" {{ $editfeedback->cleanliness == 'good' ? 'selected' : '' }}> Good </option>
                            <option value="fair" {{ $editfeedback->cleanliness == 'fair' ? 'selected' : '' }}> Fair </option>
                            <option value="poor" {{ $editfeedback->cleanliness == 'poor' ? 'selected' : '' }}> Poor </option>
                        </select>
                        @error('cleanliness')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="housekeeping">Staff Services<span class="text-danger">*</span></label>
                        <select id="housekeeping" name="housekeeping" class="form-control" required>
                            <option value="excellent" {{ $editfeedback->housekeeping == 'excellent' ? 'selected' : '' }}> Excellent </option>
                            <option value="good" {{ $editfeedback->housekeeping == 'good' ? 'selected' : '' }}> Good </option>
                            <option value="fair" {{ $editfeedback->housekeeping == 'fair' ? 'selected' : '' }}> Fair </option>
                            <option value="poor" {{ $editfeedback->housekeeping == 'poor' ? 'selected' : '' }}> Poor </option>
                        </select>
                        @error('housekeeping')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="cafefood">Staff Services<span class="text-danger">*</span></label>
                        <select id="cafefood" name="cafefood" class="form-control" required>
                            <option value="excellent" {{ $editfeedback->cafefood == 'excellent' ? 'selected' : '' }}> Excellent </option>
                            <option value="good" {{ $editfeedback->cafefood == 'good' ? 'selected' : '' }}> Good </option>
                            <option value="fair" {{ $editfeedback->cafefood == 'fair' ? 'selected' : '' }}> Fair </option>
                            <option value="poor" {{ $editfeedback->cafefood == 'poor' ? 'selected' : '' }}> Poor </option>
                        </select>
                        @error('cafefood')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="amenities">Staff Services<span class="text-danger">*</span></label>
                        <select id="amenities" name="amenities" class="form-control" required>
                            <option value="excellent" {{ $editfeedback->amenities == 'excellent' ? 'selected' : '' }}> Excellent </option>
                            <option value="good" {{ $editfeedback->amenities == 'good' ? 'selected' : '' }}> Good </option>
                            <option value="fair" {{ $editfeedback->amenities == 'fair' ? 'selected' : '' }}> Fair </option>
                            <option value="poor" {{ $editfeedback->amenities == 'poor' ? 'selected' : '' }}> Poor </option>
                        </select>
                        @error('amenities')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="overallhomestayrating">Staff Services<span class="text-danger">*</span></label>
                        <select id="overallhomestayrating" name="overallhomestayrating" class="form-control" required>
                            <option value="excellent" {{ $editfeedback->amenities == 'excellent' ? 'selected' : '' }}> Excellent </option>
                            <option value="good" {{ $editfeedback->amenities == 'good' ? 'selected' : '' }}> Good </option>
                            <option value="fair" {{ $editfeedback->amenities == 'fair' ? 'selected' : '' }}> Fair </option>
                            <option value="poor" {{ $editfeedback->amenities == 'poor' ? 'selected' : '' }}> Poor </option>
                        </select>
                        @error('overallhomestayrating')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="othercomments">Other Comments <span class="text-danger"></span></label>
                        <textarea class="form-control" name="othercomments">{{ $editfeedback->othercomments }}</textarea>
                        @error('othercomments')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <script type="text/javascript" src="js/datepicker.js"></script>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection