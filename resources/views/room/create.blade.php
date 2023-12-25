@extends('layouts.dashboard')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a href="{{ route('rooms.index') }}" class="btn btn-sm btn-danger">Back</a>
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

            <form method="POST" action="{{ route('rooms.store') }}">
                @csrf

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
                        <label for="roomtype">Type of Room <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="roomtype" value="{{ old('roomtype') }}">
                        @error('roomtype')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="occupancy">Occupancy <span class="text-danger">*</span></label>
                        <input type="number" required class="form-control" name="occupancy" value="{{ old('occupancy') }}">
                        @error('occupancy')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger"></span></label>
                        <input type="text" required class="form-control" name="description">{{ old('description') }}
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="price">Price<span class="text-danger">*</span></label>
                        <input type="number" required class="form-control" name="price" value="{{ old('price') }}">
                        @error('price')
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