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

            <form method="POST" action="{{ route('feedbacks.store') }}">
                @csrf

                <div class="mb-2">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="roomnumber">Room Number <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="roomnumber" value="{{ old('roomnumber') }}">
                        @error('roomnumber')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="date">Date <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" id="date" name="date" value="{{ old('checkin') }}">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="staffservice">Staff Service <span class="text-danger">*</span></label>
                        <select id="staffservice" name="staffservice" class="form-control" required>
                            <option value="excellent" {{ old('staffservice') == 'excellent' ? 'selected' : '' }}> Excellent </option>
                            <option value="good" {{ old('staffservice') == 'good' ? 'selected' : '' }}> Good </option>
                            <option value="fair" {{ old('staffservice') == 'fair' ? 'selected' : '' }}> Fair </option>
                            <option value="poor" {{ old('staffservice') == 'poor' ? 'selected' : '' }}> Poor </option>
                        </select>
                        @error('staffservice')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="cleanliness">Cleanliness <span class="text-danger">*</span></label>
                        <select id="cleanliness" name="cleanliness" class="form-control" required>
                            <option value="excellent" {{ old('cleanliness') == 'excellent' ? 'selected' : '' }}> Excellent </option>
                            <option value="good" {{ old('cleanliness') == 'good' ? 'selected' : '' }}> Good </option>
                            <option value="fair" {{ old('cleanliness') == 'fair' ? 'selected' : '' }}> Fair </option>
                            <option value="poor" {{ old('cleanliness') == 'poor' ? 'selected' : '' }}> Poor </option>
                        </select>
                        @error('cleanliness')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="housekeeping">Housekeeping <span class="text-danger">*</span></label>
                        <select id="housekeeping" name="housekeeping" class="form-control" required>
                            <option value="excellent" {{ old('housekeeping') == 'excellent' ? 'selected' : '' }}> Excellent </option>
                            <option value="good" {{ old('housekeeping') == 'good' ? 'selected' : '' }}> Good </option>
                            <option value="fair" {{ old('housekeeping') == 'fair' ? 'selected' : '' }}> Fair </option>
                            <option value="poor" {{ old('housekeeping') == 'poor' ? 'selected' : '' }}> Poor </option>
                        </select>
                        @error('housekeeping')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="cafefood">Cafe Food <span class="text-danger">*</span></label>
                        <select id="cafefood" name="cafefood" class="form-control" required>
                            <option value="excellent" {{ old('cafefood') == 'excellent' ? 'selected' : '' }}> Excellent </option>
                            <option value="good" {{ old('cafefood') == 'good' ? 'selected' : '' }}> Good </option>
                            <option value="fair" {{ old('cafefood') == 'fair' ? 'selected' : '' }}> Fair </option>
                            <option value="poor" {{ old('cafefood') == 'poor' ? 'selected' : '' }}> Poor </option>
                        </select>
                        @error('cafefood')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="amenities">Amenities <span class="text-danger">*</span></label>
                        <select id="amenities" name="amenities" class="form-control" required>
                            <option value="excellent" {{ old('amenities') == 'excellent' ? 'selected' : '' }}> Excellent </option>
                            <option value="good" {{ old('amenities') == 'good' ? 'selected' : '' }}> Good </option>
                            <option value="fair" {{ old('amenities') == 'fair' ? 'selected' : '' }}> Fair </option>
                            <option value="poor" {{ old('amenities') == 'poor' ? 'selected' : '' }}> Poor </option>
                        </select>
                        @error('amenities')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="overallhomestayrating">Overall Homestay Staying <span class="text-danger">*</span></label>
                        <select id="overallhomestayrating" name="overallhomestayrating" class="form-control" required>
                            <option value="excellent" {{ old('overallhomestayrating') == 'excellent' ? 'selected' : '' }}> Excellent </option>
                            <option value="good" {{ old('overallhomestayrating') == 'good' ? 'selected' : '' }}> Good </option>
                            <option value="fair" {{ old('overallhomestayrating') == 'fair' ? 'selected' : '' }}> Fair </option>
                            <option value="poor" {{ old('overallhomestayrating') == 'poor' ? 'selected' : '' }}> Poor </option>
                        </select>
                        @error('overallhomestayrating')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="othercomments">Other Comments <span class="text-danger"></span></label>
                        <input type="text" required class="form-control" name="othercomments">{{ old('othercomments') }}
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