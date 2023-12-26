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
                <a href="{{ route('booking.index') }}" class="btn btn-sm btn-danger">Back</a>
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

            <form method="POST" action="{{ route('booking.store') }}">
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
                        <label for="typeofhomestay">Type of Homestay <span class="text-danger">*</span></label>
                        <select id="typeofhomestay" name="typeofhomestay" class="form-control" required>
                            <option value="kontena" {{ old('typeofhomestay') == 'kontena' ? 'selected' : '' }}> HomestaykontenaMelaka </option>
                            <option value="villaredan" {{ old('typeofhomestay') == 'villaredan' ? 'selected' : '' }}> Villa Redan Homestay </option>
                            <option value="glamping" {{ old('typeofhomestay') == 'glamping' ? 'selected' : '' }}> Melaka Private Glamping </option>
                        </select>
                        @error('typeofhomestay')
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
                        <label for="bookingdate">Booking Date<span class="text-danger">*</span></label>
                        <input type="number" required class="form-control" name="icnumber" value="{{ old('icnumber') }}">
                        @error('bookingdate')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="email">Phone Number <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="checkin">Check-In Date <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" id="checkin" name="checkin" value="{{ old('checkin') }}">
                        @error('checkin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="checkout">Check-Out Date <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" id="checkout" name="checkout" value="{{ old('checkout') }}">
                        @error('checkout')
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