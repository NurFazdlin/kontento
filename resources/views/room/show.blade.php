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

            <div class="mb-2">
                <div class="form-group">
                    <p>Room Number: {{ $editroom->roomnumber }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Type of Homestay: {{ $editroom->typeofhomestay }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Room Type: {{ $editroom->roomtype }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Occupancy: {{ $editroom->occupancy }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Description: {{ $editroom->description }}</p>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <p>Price: RM {{ $editroom->price }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection