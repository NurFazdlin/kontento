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

            <form method="POST" action="{{ route('rooms.update', $editroom->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <div class="form-group">
                        <label for="roomnumber">Room Number <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="roomnumber" value="{{ $editroom->roomnumber }}">
                        @error('roomnumber')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="typeofhomestay">Type of Homestay <span class="text-danger">*</span></label>
                        <select id="typeofhomestay" name="typeofhomestay" class="form-control" required>
                            <option value="kontena" {{ $editroom->typeofhomestay == 'kontena' ? 'selected' : '' }}> Male </option>
                            <option value="villaredan" {{ $editroom->typeofhomestay == 'villaredan' ? 'selected' : '' }}> Female </option>                            <option value="female" {{ $editroom->typeofhomestay == 'female' ? 'selected' : '' }}> Female </option>
                            <option value="glamping" {{ $editroom->typeofhomestay == 'glamping' ? 'selected' : '' }}> Female </option>
                        </select>
                        @error('typeofhomestay')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="occupancy">Occupancy <span class="text-danger">*</span></label>
                        <input type="number" required class="form-control" name="occupancy" value="{{ $editroom->occupancy }}">
                        @error('occupancy')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="description">Address <span class="text-danger"></span></label>
                        <textarea class="form-control" name="description">{{ $editroom->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="price">Price <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="price" value="{{ $editroom->price }}">
                        @error('price')
                            <span class="text-danger">RM {{ $message }}</span>
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